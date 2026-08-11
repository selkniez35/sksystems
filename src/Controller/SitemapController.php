<?php

namespace App\Controller;

use App\Blog\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SitemapController extends AbstractController
{
    public function __construct(
        private readonly ArticleRepository $articles,
    ) {
    }

    #[Route('/sitemap.xml', name: 'app_sitemap', methods: ['GET'])]
    public function index(): Response
    {
        $response = $this->render('sitemap.xml.twig', [
            'articles' => $this->articles->findAll(),
        ]);

        $response->headers->set('Content-Type', 'application/xml');

        return $response;
    }
}
