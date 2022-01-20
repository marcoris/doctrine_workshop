<?php

namespace App\Entities;

use DateTime;
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
     * @var int
     * @Id
     * @Column(name="id", type="integer")
     * @GeneratedValue
     */
    private int $id;

    /**
     * @var string
     * @Column(type="string", length=140)
     */
    private string $name;

    /**
     * @var string|null
     * @Column(type="string", length=140, nullable=true)
     */
    private ?string $email;

    /**
     * @var string|null
     * @Column(type="string", length=140, nullable=true)
     */
    private ?string $url;

    /**
     * @var string
     * @Column(type="string", length=255)
     */
    private string $comment;

    /**
     * @var int
     * 0 = pending
     * 1 = spam
     * 2 = published
     * @Column(type="integer", options={"default":0})
     */
    private int $status;

    /**
     * @var DateTime
     * @Column(name="created_at", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private DateTime $createdAt;

    /**
     * @var Post
     *
     * @ManyToOne (targetEntity="Post", inversedBy="comments")
     */
    private Post $posts;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
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
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     */
    public function setCreatedAt(DateTime $createdAt): void
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