<?php
/**
 * Created by UniverseCode.
 */

namespace App\Helpers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use SendGrid\Mail\From as From;
use SendGrid\Mail\Mail as Mail;
use SendGrid\Mail\To as To;

class EmailHelper
{

    

    public function __construct()
    {
    }

    public function sendEmail($email){
        try {
            $newLink = "http://localhost/test1/";
            $email = $userdata->email;
            $name = 'Dema';
            $from = new from('demo@gmail.com', 'DEMO');
            $tos = [new To(
            $email,
            $name,
            [
            'subject' => 'Forgot Password.',
            'link' => $newLink,
            ])];
            $email = new Mail($from, $tos);
            $email->setTemplateId('id');
            $sendgrid = new \SendGrid('KEY');
            try {
                $response = $sendgrid->send($email);
                $returndata = 'success';
            } catch (Exception $e) {
                $returndata = 'failes';
            }
        } catch (Exception $ex) {
        }
    }

}
