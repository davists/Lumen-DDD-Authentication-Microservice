<?php
/**
 * Created by PhpStorm.
 * User: davi
 * Date: 7/17/17
 * Time: 7:17 PM
 */
namespace Infrastructure\Services\Email;
use Illuminate\Support\Facades\Mail;

class Mailgun{

    private $fromEmail = '';
    private $fromName = '';

    private $parameters = [];

    public function __construct()
    {
        $this->setFromEmail();
        $this->setFromName();
    }

    public function setFromEmail()
    {
        $this->parameters['fromEmail'] = $this->fromEmail;
    }

    public function setFromName()
    {
        $this->parameters['fromName'] = $this->fromName;
    }

    public function setToEmail($toEmail)
    {
        $this->parameters['toEmail'] = $toEmail;
    }

    public function setSubject($subject)
    {
        $this->parameters['subject'] = $subject;
    }

    public function setHtml($html)
    {
        $this->parameters['html'] = $html;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function send()
    {
        $parameters = $this->parameters;

        return Mail::send($this->parameters['template'], $this->parameters['data'], function ($message) use($parameters) {
            $message->subject($parameters['subject']);
            $message->from($parameters['fromEmail'], $parameters['fromName']);
            $message->to($parameters['toEmail']);
        });
    }

    //set email types
    public function setWelcomeMessage($messageParams)
    {
        $this->setSubject('');
        $this->parameters['data'] = $messageParams;
        $this->parameters['template'] = 'email.welcome';
    }

    //common message
    public function setCommonMessage($subject,$message)
    {
        $this->setSubject($subject);
        $this->parameters['data'] = ['message'=>$message];
        $this->parameters['template'] = 'email.common';
    }

}