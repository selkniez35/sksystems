<?php

namespace App\Blog;

final class Article
{
    public function __construct(
        public readonly string $slug,
        public readonly string $title,
        public readonly string $excerpt,
        public readonly string $metaDescription,
        public readonly string $category,
        public readonly \DateTimeImmutable $publishedAt,
        public readonly int $readingTimeMinutes,
        public readonly string $contentTemplate,
    ) {
    }
}
