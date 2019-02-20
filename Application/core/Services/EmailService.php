<?php
namespace Application\Core\Services;

use Application\Core\Exceptions\ApplicationException;
use Illuminate\Support\Facades\Mail;
use Infrastructure\Services\Email\Mailgun;

class EmailService
{
    private $emailService;

    public function __construct()
    {
        $this->emailService = new Mailgun();
    }

    public function siteContact($post)
    {
        $subject = $post['subject'];

        Mail::send('email.common', ['messageReceived'=>$this->normalizeMessage($post)], function ($message) use($subject){
            $message->subject($subject);
            $message->from('mail@petdrive.com.br', 'Petdrive');
            $message->to('')->cc('');
        });

        return "Mensagem envida com sucesso!";
    }

    public function normalizeMessage($post)
    {
        $message = '<br>';

        foreach ($post as $key=>$value){
            $message .= $key .' = '.$value.'<br>';
        }

        return $message;
    }

}