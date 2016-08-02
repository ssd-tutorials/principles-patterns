<?php

namespace App\Book;

use App\Filesystem\Filesystem;
use App\Notification\Notification;
use SSD\DotEnv\DotEnv;
use Illuminate\Http\Request;

use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Book
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $content;

    /**
     * Book constructor.
     *
     * @param Request $request
     * @param Filesystem $filesystem
     */
    public function __construct(
        Request $request,
        Filesystem $filesystem
    )
    {
        $this->request = $request;
        $this->filesystem = $filesystem;
    }

    /**
     * Get / set title.
     *
     * @param null|mixed $title
     * @return string
     */
    public function title($title = null)
    {
        if (is_null($title)) {
            return $this->title;
        }

        return $this->title = $title;
    }

    /**
     * Get / set content.
     *
     * @param null|mixed $content
     * @return string
     */
    public function content($content = null)
    {
        if (is_null($content)) {
            return $this->content;
        }

        return $this->content = $content;
    }

    /**
     * Get file name.
     *
     * @return string
     */
    public function fileName()
    {
        return '/books/' . str_replace(' ', '-', $this->title) . '.txt';
    }

    /**
     * Get file url.
     *
     * @return string
     */
    public function fileUrl()
    {
        return $this->request->root() . $this->filesystem->relativePath($this->fileName());
    }

    /**
     * Get book content.
     *
     * @return string
     */
    public function fileContent()
    {
        return implode(PHP_EOL, [$this->title, $this->content]);
    }

    /**
     * Save book to a file.
     *
     * @return int
     */
    public function saveToFile()
    {
        return $this->filesystem->save(
            $this->fileName(),
            $this->fileContent()
        );
    }

    /**
     * Send notification.
     *
     * @param Notification $notification
     * @param string|array $sender
     * @param string|array $recipient
     * @return int
     */
    public function sendNotification(Notification $notification, $sender, $recipient)
    {
        $notification->subject($this->notificationSubject());
        $notification->body($this->notificationBody());
        $notification->sender($sender);
        $notification->recipient($recipient);

        return $notification->send();
    }

    /**
     * Get notification body.
     *
     * @return string
     */
    public function notificationBody()
    {
        return "Here's the link to the new book: " . $this->fileUrl();
    }

    /**
     * Get notification subject.
     *
     * @return string
     */
    public function notificationSubject()
    {
        return "New book worth checking";
    }
}