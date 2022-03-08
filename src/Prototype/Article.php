<?php


namespace Linnzh\Utils\Prototype;


/**
 * @Prototype
 */
class Article
{
    private string $title;
    private string $content;
    private array $comments = [];
    private \DateTime $createAt;
    private Author $author;

    /**
     * Article constructor.
     * @param string $title
     * @param string $content
     * @param Author $author
     */
    public function __construct(string $title, string $content, Author $author)
    {
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->createAt = new \DateTime();
    }

    /**
     * 深拷贝一份当前属性的对象，按一定逻辑清空或修改某些属性
     */
    public function __clone()
    {
        if (preg_match('/(.*)Copy\s*(\d*)/is', $this->title, $match)) {
            $this->title = $match[1] . 'Copy ' . ((int)$match[2] + 1);
        } else {
            $this->title .= ' Copy';
        }
        $this->author->addArticle($this);
        $this->comments = [];
        $this->createAt = new \DateTime();
    }

    public function __toString()
    {
        return "\n标题：{$this->title}\n内容：{$this->content}\n评论：" . (empty($this->comments) ? '无' : implode("\n", $this->comments));
    }

    public function addComment(string $comment): void
    {
        $this->comments[] = $comment;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return array
     */
    public function getComments(): array
    {
        return $this->comments;
    }

    /**
     * @return \DateTime
     */
    public function getCreateAt(): \DateTime
    {
        return $this->createAt;
    }

    /**
     * @return Author
     */
    public function getAuthor(): Author
    {
        return $this->author;
    }
}
