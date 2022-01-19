<?php

namespace App\Entities;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Table (name="author")
 * @Entity
 */
class Author
{
    /**
     * @var integer
     * @Id
     * @Column(name="id", type="integer")
     * @GeneratedValue
     */
    private $id;

    /**
     * @var string
     * @Column(type="string", length=140)
     */
    private $authorName;

    /**
     * @var int
     * @Column(type="integer")
     */
    private $authorAge;

    /**
     * @var string
     * @Column(type="string", length=140, nullable=true)
     */
    private $authorEmail;

    /**
     * @var string
     * @Column(type="string", length=140, nullable=true)
     */
    private $authorUrl;

    /**
     * @var string
     * @Column(type="text", nullable=true)
     */
    private $authorBio;

    /**
     * @var Collection
     * @OneToMany (targetEntity="Post", mappedBy="author")
     */
    private $posts;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAuthorName(): string
    {
        return $this->authorName;
    }

    /**
     * @param string $authorName
     */
    public function setAuthorName(string $authorName): void
    {
        $this->authorName = $authorName;
    }

    /**
     * @return int
     */
    public function getAuthorAge(): int
    {
        return $this->authorAge;
    }

    /**
     * @param int $authorAge
     */
    public function setAuthorAge(int $authorAge): void
    {
        $this->authorAge = $authorAge;
    }

    /**
     * @return string
     */
    public function getAuthorEmail(): string
    {
        return $this->authorEmail;
    }

    /**
     * @param string $authorEmail
     */
    public function setAuthorEmail(string $authorEmail): void
    {
        $this->authorEmail = $authorEmail;
    }

    /**
     * @return string
     */
    public function getAuthorUrl(): string
    {
        return $this->authorUrl;
    }

    /**
     * @param string $authorUrl
     */
    public function setAuthorUrl(string $authorUrl): void
    {
        $this->authorUrl = $authorUrl;
    }

    /**
     * @return string|null
     */
    public function getAuthorBio(): ?string
    {
        return $this->authorBio;
    }

    /**
     * @param string $authorBio
     */
    public function setAuthorBio(string $authorBio): void
    {
        $this->authorBio = $authorBio;
    }

    /**
     * @return Collection
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    /**
     * @param Collection $posts
     */
    public function setPosts(Collection $posts): void
    {
        $this->posts = $posts;
    }
}