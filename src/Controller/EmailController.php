<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\EmailService;
use Symfony\Component\HttpFoundation\Request;

class EmailController extends AbstractController
{
    #[Route('/send-email', name: 'send_email_form')]
public function sendEmailForm(Request $request, EmailService $emailService): Response
{
    if ($request->isMethod('POST')) {
        $from = $request->request->get('from');
        //$to = $request->request->get('to');
        $subject = $request->request->get('subject');
        $body = $request->request->get('body');
        $to = 'amal.as6060@gmail.com';

        $emailService->sendEmail($from, $to, $subject, $body);

        // Optionally, redirect after sending the email
        return $this->redirectToRoute('app_post_index'); // Replace with your route
    }

    return $this->render('email/send_email.html.twig');
}
}