<?php

namespace Linnzh\Utils\Test\Prototype;

use Linnzh\Utils\Prototype\Article;
use Linnzh\Utils\Prototype\Author;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    public function testExample(): void
    {
        $author = new Author('Linn');
        $article = new Article('文章标题', "内容：{$author->getName()} 发表了她的第一篇文章~", $author);
        $article->addComment("恭喜");
        $article->addComment("恭喜+1");
        echo $article . "\n";

        $copyArticle = clone $article;
        $copyArticle->addComment("又有产出啦");
        echo $copyArticle . "\n";

        $copyArticle = clone $copyArticle;
        echo $copyArticle . "\n";

        $this->assertEquals(true, true);
    }
}
