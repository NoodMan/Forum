<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(name="unique_article_details", columns={"n_isbn"})})
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
    */
    private int $id;
    /**
     * @ORM\Column(length="100")
     */
    private string $title;

    /**
     * @ORM\Column(length="512")
    */
    private string $summary;

    /**
     * @ORM\Column(type="integer")
    */
    private int $n_isbn;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="author", referencedColumnName="id", nullable=true, onDelete="SET NULL")
    */
    private User $author;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="editor", referencedColumnName="id", nullable=true, onDelete="SET NULL")
    */
    private User $editor;




    public function __construct(string $title, string $summary, int $n_isbn, User $author, User $editor )
    {
        $this->title = $title;
        $this->summary = $summary;
        $this->n_isbn = $n_isbn;
        $this->author = $author;
        $this->editor = $editor;
       
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
     * Get the value of title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of summary
     *
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * Set the value of summary
     *
     * @param string $summary
     *
     * @return self
     */
    public function setSummary(string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get the value of n_isbn
     *
     * @return int
     */
    public function getNIsbn(): int
    {
        return $this->n_isbn;
    }

    /**
     * Set the value of n_isbn
     *
     * @param int $n_isbn
     *
     * @return self
     */
    public function setNIsbn(int $n_isbn): self
    {
        $this->n_isbn = $n_isbn;

        return $this;
    }

    /**
     * Get the value of author
     *
     * @return User
     */
    public function getAuthor(): User
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @param User $author
     *
     * @return self
     */
    public function setAuthor(User $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of editor
     *
     * @return User
     */
    public function getEditor(): User
    {
        return $this->editor;
    }

    /**
     * Set the value of editor
     *
     * @param User $editor
     *
     * @return self
     */
    public function setEditor(User $editor): self
    {
        $this->editor = $editor;

        return $this;
    }

    public function addNote(Note $note) : self
    {
        if(!$this->notes->contains($note)){
            $this->notes[] = $note;
        }

        return $this;
    }

    public function removeNote(Note $note) : self
    {
        if($this->notes->contains($note)){
            $this->notes->remove($note);
        }
        
        return $this;
    }

}
