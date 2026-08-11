<?php

namespace App\Blog;

final class ArticleRepository
{
    /**
     * @return Article[] triés du plus récent au plus ancien
     */
    public function findAll(): array
    {
        $articles = $this->getArticles();

        usort($articles, static fn (Article $a, Article $b) => $b->publishedAt <=> $a->publishedAt);

        return $articles;
    }

    public function findBySlug(string $slug): ?Article
    {
        foreach ($this->getArticles() as $article) {
            if ($article->slug === $slug) {
                return $article;
            }
        }

        return null;
    }

    /**
     * @return Article[]
     */
    private function getArticles(): array
    {
        return [
            new Article(
                slug: 'prix-site-web-sur-mesure',
                title: 'Combien coûte un site web sur mesure en 2026 ?',
                excerpt: 'Template, no-code ou développement sur mesure : ce qui fait vraiment varier le prix d\'un site ou d\'une application web, et comment budgéter votre projet sans mauvaise surprise.',
                metaDescription: 'Prix d\'un site web sur mesure en 2026 : les facteurs qui font varier le budget, les fourchettes réalistes et comment éviter les mauvaises surprises. Guide pour PME et associations.',
                category: 'Guide',
                publishedAt: new \DateTimeImmutable('2026-08-05'),
                readingTimeMinutes: 6,
                contentTemplate: 'blog/articles/_prix-site-web-sur-mesure.html.twig',
            ),
            new Article(
                slug: 'freelance-ou-agence-web',
                title: 'Freelance ou agence web : comment choisir pour votre projet ?',
                excerpt: 'Les deux options ont leurs forces. Voici comment trancher selon la taille de votre projet, votre budget et le niveau de suivi dont vous avez besoin.',
                metaDescription: 'Freelance ou agence web : avantages, inconvénients et critères de choix pour votre projet de site ou d\'application. Un guide honnête pour PME, indépendants et associations.',
                category: 'Conseils',
                publishedAt: new \DateTimeImmutable('2026-08-08'),
                readingTimeMinutes: 5,
                contentTemplate: 'blog/articles/_freelance-ou-agence-web.html.twig',
            ),
            new Article(
                slug: 'symfony-application-metier',
                title: 'Symfony pour une application métier sur mesure : pourquoi ce choix a du sens',
                excerpt: 'WordPress, no-code, Symfony... Pourquoi ce framework PHP reste un choix solide dès que votre projet dépasse la simple vitrine.',
                metaDescription: 'Pourquoi choisir Symfony pour développer une application métier ou une plateforme sur mesure : robustesse, maintenabilité et pérennité du code, expliqués simplement.',
                category: 'Technique',
                publishedAt: new \DateTimeImmutable('2026-08-11'),
                readingTimeMinutes: 7,
                contentTemplate: 'blog/articles/_symfony-application-metier.html.twig',
            ),
        ];
    }
}
