<?php

namespace App\Controller;

use App\Entity\Project;
use App\Entity\ProjectStatus;
use App\Form\ProjectProposalType;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

final class ProjectController extends AbstractController
{
    private const string ADMIN_EMAIL = 'samy.elkniez@sksystems.fr';

    #[Route('/projets', name: 'app_project_index', methods: ['GET'])]
    public function index(ProjectRepository $projects): Response
    {
        return $this->render('project/index.html.twig', [
            'projects' => $projects->findPublished(),
        ]);
    }

    #[Route('/projets/proposer', name: 'app_project_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, TransportInterface $mailerTransport): Response
    {
        $project = new Project();
        $form = $this->createForm(ProjectProposalType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($project);
            $entityManager->flush();

            $approveUrl = $this->generateUrl('app_project_moderate_approve', [
                'id' => $project->getId(),
                'token' => $project->getModerationToken(),
            ], UrlGeneratorInterface::ABSOLUTE_URL);

            $rejectUrl = $this->generateUrl('app_project_moderate_reject', [
                'id' => $project->getId(),
                'token' => $project->getModerationToken(),
            ], UrlGeneratorInterface::ABSOLUTE_URL);

            $email = (new Email())
                ->from(self::ADMIN_EMAIL)
                ->replyTo($project->getContactEmail())
                ->to(self::ADMIN_EMAIL)
                ->subject('[Site SK Systems] Nouvelle proposition de projet : ' . $project->getTitle())
                ->text(sprintf(
                    "%s (%s) a proposé un projet :\n\nTitre : %s\nBudget : %s\n\n%s\n\n---\nApprouver et publier : %s\nRejeter : %s",
                    $project->getCompanyName(),
                    $project->getContactEmail(),
                    $project->getTitle(),
                    $project->getBudget() ?? 'non précisé',
                    $project->getDescription(),
                    $approveUrl,
                    $rejectUrl,
                ));

            $mailerTransport->send($email);

            $this->addFlash('project_success', 'Merci, votre projet a bien été envoyé ! Il sera publié sur cette page dès validation.');

            return $this->redirectToRoute('app_project_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('project/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/projets/moderer/{id<\d+>}/{token<[a-f0-9]{64}>}/approuver', name: 'app_project_moderate_approve', methods: ['GET'])]
    public function moderateApprove(int $id, string $token, ProjectRepository $projects, EntityManagerInterface $entityManager): Response
    {
        $project = $projects->findOneByModerationToken($id, $token);

        if (!$project) {
            throw $this->createNotFoundException();
        }

        $outcome = 'already_done';

        if (ProjectStatus::Pending === $project->getStatus()) {
            $project->publish();
            $entityManager->flush();
            $outcome = 'approved';
        }

        return $this->render('project/moderate_result.html.twig', [
            'project' => $project,
            'outcome' => $outcome,
        ]);
    }

    #[Route('/projets/moderer/{id<\d+>}/{token<[a-f0-9]{64}>}/rejeter', name: 'app_project_moderate_reject', methods: ['GET'])]
    public function moderateReject(int $id, string $token, ProjectRepository $projects, EntityManagerInterface $entityManager): Response
    {
        $project = $projects->findOneByModerationToken($id, $token);

        if (!$project) {
            throw $this->createNotFoundException();
        }

        $outcome = 'already_done';

        if (ProjectStatus::Pending === $project->getStatus()) {
            $project->reject();
            $entityManager->flush();
            $outcome = 'rejected';
        }

        return $this->render('project/moderate_result.html.twig', [
            'project' => $project,
            'outcome' => $outcome,
        ]);
    }
}
