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
            'projects' => $this->getProjects(),
            'recommendations' => $recommendations->all(),
        ]);
    }

    /**
     * @return array<int, array{name: string, client: string, description: string, tags: string[], url: string|null, image: string|null}>
     */
    private function getProjects(): array
    {
        return [
            [
                'name' => 'Nour Dicko Academy',
                'client' => 'Plateforme e-learning',
                'description' => 'Plateforme e-learning complète développée de A à Z : espace élève (cours, replays, documents), espace enseignant, back-office d\'administration et billetterie d\'abonnements sécurisée via Stripe. Architecture Symfony 8, gestion fine des rôles, notifications e-mail automatisées, déploiement conteneurisé avec Docker.',
                'tags' => ['PHP 8.4', 'Symfony 8', 'Doctrine ORM', 'MySQL/MariaDB', 'Stripe API', 'Docker'],
                'url' => 'https://nourdickoacademy.com',
                'image' => 'images/projects/nda-accueil.jpg',
            ],
            [
                'name' => 'MA Boxe Guingamp',
                'client' => 'Club sportif',
                'description' => 'Un club sans site web gérait ses adhésions au papier. Développement d\'une plateforme complète : présentation du club, planning des cours, inscription et paiement de la cotisation en ligne. Le bureau ne ressaisit plus rien.',
                'tags' => ['Symfony', 'PHP', 'MySQL', 'Paiement en ligne'],
                'url' => 'https://maboxe.fr',
                'image' => 'images/projects/maboxe-accueil.jpg',
            ],
            [
                'name' => 'Fédération Française de Fitness',
                'client' => 'Fédération sportive nationale',
                'description' => 'Contribution au site web national de la fédération : conception et réalisation de pages sous WordPress.',
                'tags' => ['WordPress', 'HTML/CSS', 'PHP'],
                'url' => null,
                'image' => null,
            ],
        ];
    }
}
