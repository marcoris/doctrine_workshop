<?php

namespace App\Repositories;

use App\Entities\ProductCategory;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository
{
    /**
     * @param float $start
     * @param float $end
     * @return mixed
     */
    public function getProductsForPriceRange(float $start, float $end): mixed
    {
        $qb = $this->createQueryBuilder('p');

        $qb->where($qb->expr()->between('p.price', ':start', ':end'))
        ->setParameter('start', $start, Types::FLOAT)
        ->setParameter('end', $end, Types::FLOAT);

//        var_dump($qb->getQuery()->getSQL());

        return $qb->getQuery()->getResult();
    }

    /**
     * @param ProductCategory $category
     * @return mixed
     */
    public function getAvailableProducts(ProductCategory $category): mixed
    {
        $qb = $this->createQueryBuilder('p');

        $qb->where($qb->expr()->gt('p.stock', 0));
        if ($category) {
            $qb->andWhere($qb->expr()->eq('p.category', ':category'))
                ->setParameter('category', $category);
        }

//        var_dump($qb->getQuery()->getSQL());

        return $qb->getQuery()->getResult();
    }
}