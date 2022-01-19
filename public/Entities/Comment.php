<?php

namespace App\Entities;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Table (name="comment")
 * @Entity
 */
class Comment
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
     * @Column(type="string", length=255)
     */
    private $comment;

    /**
     * @var int
     * 0 = pending
     * 1 = spam
     * 2 = published
     * @Column(type="integer", options={"default":0})
     */
    private $status = 0;

    /**
     * @var \DateTime
     * @Column(name="created_at", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt;

    /**
     * @var Collection
     *
     * @ManyToOne (targetEntity="Post", inversedBy="comments")
     */
    private $posts;

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
     * @return string|null
     */
    public function getAuthorEmail(): ?string
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
     * @return string|null
     */
    public function getAuthorUrl(): ?string
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
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Collection
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    /**
     * @param Post $post
     * @return void
     */
    public function setPosts(Post $post)
    {
        $post->addComment($this);
        $this->posts = $post;
    }
}