<?php


namespace App\Entities;

use DateTime;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="App\Repositories\ProductRepository")
 */
class Product
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue
     */
    private int $id;

    /**
     * @var string
     * @ORM\Column (type="string", length=140)
     */
    private string $name;

    /** @var ?string
     * @ORM\Column (type="text", nullable=true)
     */
    private ?string $description;

    /** @var double
     * @ORM\Column (type="float")
     */
    private float $price;

    /** @var ?int
     * @ORM\Column (type="integer", nullable=true)
     */
    private ?int $stock;

    /**
     * @var DateTime
     * @ORM\Column (name="created_at", type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     */
    private DateTime $createdAt;

    /**
     * @var DateTime
     * @ORM\Column (name="updated_at", type="datetime", columnDefinition="TIMESTAMP ON UPDATE CURRENT_TIMESTAMP")
     */
    private DateTime $updatedAt;

    /**
     * @var ProductCategory
     *
     * @ORM\ManyToOne (targetEntity="ProductCategory", cascade={"all"}, fetch="EAGER")
     */
    private ProductCategory $category;

    /**
     * @var Collection
     * @ORM\ManyToMany (targetEntity="Cart", mappedBy="products")
     */
    private $carts;

    public function __construct()
    {
        $this->createdAt = new DateTime();
    }

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

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return ProductCategory
     */
    public function getCategory(): ProductCategory
    {
        return $this->category;
    }

    /**
     * @param ProductCategory $category
     */
    public function setCategory(ProductCategory $category): void
    {
        $this->category = $category;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int|null
     */
    public function getStock(): ?int
    {
        return $this->stock;
    }

    /**
     * @param ?int $stock
     */
    public function setStock(?int $stock): void
    {
        $this->stock = $stock;
    }
}