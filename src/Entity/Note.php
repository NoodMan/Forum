<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Note
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
    */
    private int $id;

    /**
     * @ORM\Column(length="512")
    */
    private string $comment;

    /**
     * @ORM\Column(type="integer")
    */
    private int $note;

    /**
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumn(name="article", referencedColumnName="id", onDelete="CASCADE")
    */
    private Article $article;

    public function __construct(string $comment, int $note, Article $article)
    {
        $this->comment = $comment;
        $this->note = $note;
        $this->article = $article;
    }

    /**
     * Get the value of comment
     *
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @param string $comment
     *
     * @return self
     */
    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of note
     *
     * @return int
     */
    public function getNote(): int
    {
        return $this->note;
    }

    /**
     * Set the value of note
     *
     * @param int $note
     *
     * @return self
     */
    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get the value of article
     *
     * @return Article
     */
    public function getArticle(): Article
    {
        return $this->article;
    }

    /**
     * Set the value of article
     *
     * @param Article $article
     *
     * @return self
     */
    public function setArticle(Article $article): self
    {
        $this->article = $article;

        return $this;
    }
}