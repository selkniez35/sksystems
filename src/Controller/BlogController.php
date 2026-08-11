<?php

namespace App\Controller;

use App\Blog\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BlogController extends AbstractController
{
    public function __construct(
        private readonly ArticleRepository $articles,
    ) {
    }

    #[Route('/blog', name: 'app_blog_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'articles' => $this->articles->findAll(),
        ]);
    }

    #[Route('/blog/{slug}', name: 'app_blog_show', methods: ['GET'])]
    public function show(string $slug): Response
    {
        $article = $this->articles->findBySlug($slug);

        if (null === $article) {
            throw $this->createNotFoundException('Article introuvable.');
        }

        $others = array_filter(
            $this->articles->findAll(),
            static fn ($a) => $a->slug !== $slug,
        );

        return $this->render('blog/show.html.twig', [
            'article' => $article,
            'relatedArticles' => \array_slice($others, 0, 2),
        ]);
    }
}
