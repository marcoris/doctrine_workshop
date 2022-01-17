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
 * @Table (name="message")
 * @Entity
 */
class Message
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
    private $text;

    /**
     * @var \DateTime
     * @Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var Category
     *
     * @ManyToOne (targetEntity="Category", cascade={"all"}, fetch="EAGER")
     */
    private $category;

    /**
     * @var Collection
     *
     * @ManyToMany (targetEntity="Tag", inversedBy="messages", cascade={"all"})
     * @JoinTable (name="message_tag",
     *     joinColumns={@JoinColumn(name="message_id", referencedColumnName="id")},
     *     inverseJoinColumns={@JoinColumn(name="tag_id", referencedColumnName="id")}
     *     )
     */
    private $tags;

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
        $this->createdAt = new \DateTime();
    }

    /**
     * @param Category $category
     * @return Category
     */
    public function setCategory(Category $category) {
        return $this->category;
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
}