<?php

namespace App\Controller;

use App\Service\RecommendationProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RealisationController extends AbstractController
{
    #[Route('/realisations', name: 'app_realisations', methods: ['GET'])]
    public function index(RecommendationProvider $recommendations): Response
    {
        return $this->render('realisation/index.html.twig', [
            // Aucun projet pour l'instant : ils seront ajoutés plus tard depuis une
            // future interface d'administration (aucune n'existe encore pour ce
            // catalogue de réalisations). La grille et les filtres gèrent déjà le
            // cas où ce tableau contient des projets, avec le format attendu par
            // partials/_realisations_grid.html.twig : category, image, description, url.
            'projects' => [],
            'recommendations' => $recommendations->all(),
        ]);
    }
}
