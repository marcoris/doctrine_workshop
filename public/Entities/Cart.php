<?php


namespace App\Entities;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="cart")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Cart
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue
     */
    private int $id;

    /**
     * @var DateTime
     * @ORM\Column (name="created_at", type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     */
    private DateTime $createdAt;

    /**
     * @var DateTime
     * @ORM\Column (name="updated_at", type="datetime", columnDefinition="DATETIME ON UPDATE CURRENT_TIMESTAMP")
     */
    private DateTime $updatedAt;

    /**
     * @var Collection
     * @ORM\ManyToMany (targetEntity="Product", inversedBy="carts", cascade={"all"})
     * @ORM\JoinTable (name="product_cart",
     *     joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="cart_id", referencedColumnName="id")})
     */
    private Collection $products;

    /**
     * @var bool
     */
    private bool $preUpdateHandled = false;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime $updatedAt
     */
    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getProducts(): ArrayCollection|Collection
    {
        return $this->products;
    }

    /**
     * @param Product $product
     */
    public function addProduct(Product $product): void
    {
        $this->products->add($product);
    }

    /**
     * @param Product $product
     * @return void
     */
    public function removeProduct(Product $product): void
    {
        $this->products->remove($product);
    }

    /**
     * @ORM\PrePersist
     */
    public function doOnPrePersist()
    {
        foreach ($this->products as $product) {
            $product->setStock($product->getStock() - 1);
        }
    }

    /**
     * @ORM\PreUpdate
     * @param LifecycleEventArgs $args
     */
    public function doOnPreUpdate(LifecycleEventArgs $args)
    {
        if(!$this->preUpdateHandled) {
            $this->preUpdateHandled = true;
            $em = $args->getEntityManager();
            $workUnit = $em->getUnitOfWork(); //Only use this method in lifecycle events
            $scheduledCollectionUpdates = $workUnit->getScheduledCollectionUpdates();
            foreach ($scheduledCollectionUpdates as $scheduledUpdate) {
                $deleteDiff = $scheduledUpdate->getDeleteDiff();
                foreach ($deleteDiff as $deletable) {
                    if ($deletable instanceof Product) {
                        $deletable->setStock($deletable->getStock() + 1);
                        $em->persist($deletable);
                        $em->flush();
                    }
                }
            }
        }

        $this->preUpdateHandled = false;
    }
}