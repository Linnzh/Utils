<?php

declare(strict_types=1);

namespace Linnzh\Utils\Prototype;

class Author
{
    private string $name;

    /**
     * @var Article[]
     */
    private array $articles = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addArticle(Article $article): void
    {
        $this->articles[] = $article;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Article[]
     */
    public function getArticles(): array
    {
        return $this->articles;
    }
}
