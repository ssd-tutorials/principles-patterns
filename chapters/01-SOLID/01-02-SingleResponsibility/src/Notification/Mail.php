<?php

namespace App\Notification;

use SSD\DotEnv\DotEnv;

use Swift_Message;
use Swift_SmtpTransport;

class Mail extends Notification
{
    /**
     * @var Swift_SmtpTransport
     */
    private $transport;

    /**
     * Mail constructor.
     */
    public function __construct()
    {
        $this->setTransport();
    }

    /**
     * Set transport.
     *
     * @return void
     */
    private function setTransport()
    {
        $this->transport = Swift_SmtpTransport::newInstance(
            DotEnv::get('MAIL_HOST'),
            DotEnv::get('MAIL_PORT')
        );
        $this->transport->setUsername(DotEnv::get('MAIL_USERNAME'));
        $this->transport->setPassword(DotEnv::get('MAIL_PASSWORD'));
    }

    /**
     * Get message.
     *
     * @return Swift_Message
     */
    private function message()
    {
        return Swift_Message::newInstance($this->subject)
                ->setFrom($this->sender)
                ->setTo($this->recipient)
                ->setBody($this->body);
    }

    /**
     * Send notification
     *
     * @return int|bool
     */
    public function send()
    {
        $mailer = \Swift_Mailer::newInstance($this->transport);

        return $mailer->send($this->message());
    }
}