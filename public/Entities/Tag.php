<?php

namespace App\Entities;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Table (name="tag")
 * @Entity
 */
class Tag
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
     * @var Collection
     *
     * @ManyToMany (targetEntity="Post", mappedBy="tags")
     */
    private Collection $posts;

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
}