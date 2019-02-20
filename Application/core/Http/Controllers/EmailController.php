<?php
namespace Application\Core\Http\Controllers;

use Application\Core\Services\EmailService;
use Illuminate\Http\Request;

class EmailController
{
    public $emailService;

    public function __construct()
    {
        $this->emailService = new EmailService();
    }

    public function siteContact(Request $request)
    {
        $post = $request->all();
        return $this->emailService->siteContact($post);
    }
}