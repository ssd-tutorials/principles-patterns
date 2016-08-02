<?php

namespace App\Notification;

abstract class Notification
{
    /**
     * @var string
     */
    protected $subject;

    /**
     * @var string
     */
    protected $body;

    /**
     * @var string|array
     */
    protected $sender;

    /**
     * @var string|array
     */
    protected $recipient;


    /**
     * Get / set subject.
     *
     * @param null|string $subject
     * @return null|string
     */
    public function subject($subject = null)
    {
        if (is_null($subject)) {
            return $this->subject;
        }

        return $this->subject = $subject;
    }

    /**
     * Get / set body.
     *
     * @param null|string $body
     * @return null|string
     */
    public function body($body = null)
    {
        if (is_null($body)) {
            return $this->body;
        }

        return $this->body = $body;
    }

    /**
     * Get / set sender.
     *
     * @param null|string|array $sender
     * @return array|null|string
     */
    public function sender($sender = null)
    {
        if (is_null($sender)) {
            return $this->sender;
        }

        return $this->sender = $sender;
    }

    /**
     * Get / set recipient.
     *
     * @param null|string|array $recipient
     * @return array|null|string
     */
    public function recipient($recipient = null)
    {
        if (is_null($recipient)) {
            return $this->recipient;
        }

        return $this->recipient = $recipient;
    }

    /**
     * Send notification
     *
     * @return int|bool
     */
    abstract public function send();
}


















