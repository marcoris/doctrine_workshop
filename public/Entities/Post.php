<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinTable;

/**
 * @Table (name="post")
 * @Entity
 */
class Post
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
    private $title;

    /**
     * @var string
     * @Column(type="text")
     */
    private $text;

    /**
     * @var \DateTime
     * @Column(name="created_at", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt;

    /**
     * @var Collection
     *
     * @ManyToMany (targetEntity="Category", inversedBy="posts", cascade={"all"})
     * @JoinTable (name="post_category",
     *     joinColumns={@JoinColumn(name="post_id", referencedColumnName="id")},
     *     inverseJoinColumns={@JoinColumn(name="category_id", referencedColumnName="id")}
     *     )
     */
    private $categories;

    /**
     * @var Collection
     *
     * @OneToMany (targetEntity="Comment", mappedBy="posts", cascade={"all"})
     */
    private $comments;

    /**
     * @var Collection
     *
     * @ManyToOne (targetEntity="Author")
     */
    private $author;

    /**
     * @var Collection
     *
     * @ManyToMany (targetEntity="Tag", inversedBy="posts", cascade={"all"})
     * @JoinTable (name="post_tag",
     *     joinColumns={@JoinColumn(name="post_id", referencedColumnName="id")},
     *     inverseJoinColumns={@JoinColumn(name="tag_id", referencedColumnName="id")}
     *     )
     */
    private $tags;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return Collection
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @param int $length
     * @param string $sign
     * @return string
     */
    public function getTextExcerpt(int $length = 200, string $sign = "...")
    {
        if (strlen($this->text) < $length) {
            return $this->text;
        }

        return substr($this->text, 0, $length) . $sign;
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

    public function __construct()
    {
        $this->tags = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    /**
     * @return Collection
     */
    public function getCategories(): ArrayCollection|Collection
    {
        return $this->categories;
    }

    /**
     * @param Collection $categories
     */
    public function setCategories(ArrayCollection|Collection $categories): void
    {
        $this->categories = $categories;
    }

    /**
     * @return Tag[]
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param Tag $tag
     * @return void
     */
    public function addTag(Tag $tag)
    {
        $this->tags->add($tag);
    }
    /**
     * @return Comment[]
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param Comment $comment
     * @return void
     */
    public function addComment(Comment $comment)
    {
        $this->comments->add($comment);
    }
}