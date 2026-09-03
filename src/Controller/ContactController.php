<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

final class ContactController extends AbstractController
{
    private const string ADMIN_EMAIL = 'samy.elkniez@sksystems.fr';

    #[Route('/contact', name: 'app_contact', methods: ['GET', 'POST'])]
    public function index(Request $request, TransportInterface $mailerTransport): Response
    {
        $contactForm = $this->createForm(ContactType::class);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $data = $contactForm->getData();

            $email = (new Email())
                ->from(self::ADMIN_EMAIL)
                ->replyTo($data['email'])
                ->to(self::ADMIN_EMAIL)
                ->subject('[Site SK Systems] ' . $data['subject'])
                ->text(sprintf(
                    "Nom : %s %s\nEmail : %s\nTéléphone : %s\n\n%s",
                    $data['firstName'] ?? '',
                    $data['name'],
                    $data['email'],
                    $data['phone'] ?: 'non précisé',
                    $data['message'],
                ));

            $mailerTransport->send($email);

            $this->addFlash('contact_success', 'Merci, votre message a bien été envoyé — nous vous répondrons rapidement.');

            return $this->redirectToRoute('app_contact', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contact/index.html.twig', [
            'contactForm' => $contactForm->createView(),
        ]);
    }
}
