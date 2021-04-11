<?php

namespace App\Modules\Email\Controllers;

use App\Contracts\EmailRepositoryInterface;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    private $emails;
    public function __construct(EmailRepositoryInterface $emails)
    {
        $this->emails = $emails;
    }

    public function showUpdateEmail($id)
    {
        $checkEmail = $this->emails->fetchById($id);
        if ($checkEmail) {
            return view('Email::showUpdateEmail', ['email' => $checkEmail]);

        }
    }
}
