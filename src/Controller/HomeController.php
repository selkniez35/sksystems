<?php

namespace App\Controller;

use App\Service\RecommendationProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(RecommendationProvider $recommendations): Response
    {
        return $this->render('home/index.html.twig', [
            'recommendations' => $recommendations->all(),
        ]);
    }
}
