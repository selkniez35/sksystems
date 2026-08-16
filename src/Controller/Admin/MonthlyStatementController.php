<?php

namespace App\Controller\Admin;

use App\Entity\MonthlyStatement;
use App\Form\MonthlyStatementType;
use App\Repository\MonthlyStatementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
final class MonthlyStatementController extends AbstractController
{
    #[Route('/admin/facturation', name: 'app_admin_statement_index', methods: ['GET'])]
    public function index(MonthlyStatementRepository $statements): Response
    {
        return $this->render('admin/statement/index.html.twig', [
            'statements' => $statements->findAllOrderedByMonth(),
        ]);
    }

    #[Route('/admin/facturation/nouvelle', name: 'app_admin_statement_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $statement = new MonthlyStatement();
        $form = $this->createForm(MonthlyStatementType::class, $statement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($statement);
            $entityManager->flush();

            $this->addFlash('admin_success', 'Saisie enregistrée.');

            return $this->redirectToRoute('app_admin_statement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/statement/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/facturation/{id<\d+>}/modifier', name: 'app_admin_statement_edit', methods: ['GET', 'POST'])]
    public function edit(MonthlyStatement $statement, Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MonthlyStatementType::class, $statement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('admin_success', 'Saisie mise à jour.');

            return $this->redirectToRoute('app_admin_statement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/statement/edit.html.twig', [
            'form' => $form->createView(),
            'statement' => $statement,
        ]);
    }

    #[Route('/admin/facturation/{id<\d+>}/supprimer', name: 'app_admin_statement_delete', methods: ['POST'])]
    public function delete(MonthlyStatement $statement, Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete-statement-' . $statement->getId(), $request->request->get('_token'))) {
            $entityManager->remove($statement);
            $entityManager->flush();

            $this->addFlash('admin_success', 'Saisie supprimée.');
        }

        return $this->redirectToRoute('app_admin_statement_index', [], Response::HTTP_SEE_OTHER);
    }
}
