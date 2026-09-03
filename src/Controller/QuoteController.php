<?php

namespace App\Controller;

use App\Form\QuoteRequestType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

final class QuoteController extends AbstractController
{
    private const string ADMIN_EMAIL = 'samy.elkniez@sksystems.fr';

    private const array PROJECT_TYPE_LABELS = [
        'site_web' => 'Site web',
        'application_web' => 'Application web',
        'mvp' => 'MVP',
        'autre' => 'Autre',
    ];

    private const array BUDGET_LABELS = [
        'lt_2000' => 'Moins de 2 000 €',
        '2000_5000' => '2 000 € - 5 000 €',
        '5000_10000' => '5 000 € - 10 000 €',
        'gt_10000' => 'Plus de 10 000 €',
        'unknown' => 'Je ne sais pas encore',
    ];

    #[Route('/devis', name: 'app_quote_new', methods: ['POST'])]
    public function new(Request $request, TransportInterface $mailerTransport): Response
    {
        $form = $this->createForm(QuoteRequestType::class);
        $form->handleRequest($request);

        $redirectUrl = $request->headers->get('referer') ?: $this->generateUrl('app_home');

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $email = (new Email())
                ->from(self::ADMIN_EMAIL)
                ->replyTo($data['email'])
                ->to(self::ADMIN_EMAIL)
                ->subject('[Site SK Systems] Demande de devis : ' . (self::PROJECT_TYPE_LABELS[$data['projectType']] ?? $data['projectType']))
                ->text(sprintf(
                    "Nom : %s %s\nEmail : %s\nTéléphone : %s\nType de projet : %s\nBudget estimé : %s\n\n%s",
                    $data['firstName'],
                    $data['lastName'],
                    $data['email'],
                    $data['phone'] ?: 'non précisé',
                    self::PROJECT_TYPE_LABELS[$data['projectType']] ?? $data['projectType'],
                    self::BUDGET_LABELS[$data['budget'] ?? ''] ?? 'non précisé',
                    $data['description'],
                ));

            /** @var UploadedFile|null $attachment */
            $attachment = $form->get('attachment')->getData();

            if ($attachment instanceof UploadedFile) {
                $email->attachFromPath(
                    $attachment->getPathname(),
                    $attachment->getClientOriginalName(),
                    $attachment->getMimeType() ?: 'application/octet-stream',
                );
            }

            $mailerTransport->send($email);

            $this->addFlash('quote_success', 'Merci, votre demande de devis a bien été envoyée — nous vous répondrons sous 24h.');

            return $this->redirect($redirectUrl, Response::HTTP_SEE_OTHER);
        }

        $this->addFlash('quote_error', 'Votre demande n\'a pas pu être envoyée, merci de vérifier les champs et de réessayer.');

        return $this->redirect($redirectUrl, Response::HTTP_SEE_OTHER);
    }
}
