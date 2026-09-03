<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PagesController extends AbstractController
{
    #[Route('/a-propos', name: 'app_about', methods: ['GET'])]
    public function about(): Response
    {
        return $this->render('pages/about.html.twig');
    }

    #[Route('/services', name: 'app_services', methods: ['GET'])]
    public function services(): Response
    {
        return $this->render('pages/services.html.twig');
    }

    #[Route('/technologies', name: 'app_technologies', methods: ['GET'])]
    public function technologies(): Response
    {
        return $this->render('pages/technologies.html.twig');
    }
}
