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

    private const array SUBJECT_LABELS = [
        'devis' => 'Demande de devis',
        'site_web' => 'Site web',
        'application_web' => 'Application web',
        'mvp' => 'MVP',
        'autre' => 'Autre',
    ];

    #[Route('/contact', name: 'app_contact', methods: ['GET', 'POST'])]
    public function index(Request $request, TransportInterface $mailerTransport): Response
    {
        $contactForm = $this->createForm(ContactType::class);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $data = $contactForm->getData();
            $subjectLabel = self::SUBJECT_LABELS[$data['subject']] ?? $data['subject'];

            $email = (new Email())
                ->from(self::ADMIN_EMAIL)
                ->replyTo($data['email'])
                ->to(self::ADMIN_EMAIL)
                ->subject('[Site SK Systems] ' . $subjectLabel)
                ->text(sprintf(
                    "Nom : %s\nEmail : %s\nObjet : %s\n\n%s",
                    $data['name'],
                    $data['email'],
                    $subjectLabel,
                    $data['message'],
                ));

            $mailerTransport->send($email);

            $this->addFlash('contact_success', 'Merci, votre message a bien été envoyé. Je vous réponds sous 24 à 48h.');

            return $this->redirectToRoute('app_contact', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contact/index.html.twig', [
            'contactForm' => $contactForm->createView(),
        ]);
    }
}
