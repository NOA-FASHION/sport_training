<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Mailer\MailerInterface;

use Symfony\Component\Mime\Email;

use Symfony\Component\Routing\Annotation\Route;

class SendEmailController extends AbstractController
{
    #[Route('/send/email', name: 'app_send_email')]

    public function index(MailerInterface $mailer)

    {

        

        $email = (new Email())
        ->from('michel.almont@gmail.com')
        ->to('michel.almont972@gmail.com')
        //->cc('cc@example.com')
        //->bcc('bcc@example.com')
        //->replyTo('fabien@example.com')
        //->priority(Email::PRIORITY_HIGH)
        ->subject('Compte partenaire sport-traing créer')
        ->text('Votre lien de connexiont')
        ->html('<p>login et mot de passe</p>');

        


        $mailer->send($email);


        return $this->render('mails/contact.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}
