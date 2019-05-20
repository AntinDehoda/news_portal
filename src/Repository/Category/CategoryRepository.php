<?php

namespace App\Repository\Category;

use App\Collection\PostCollection;
use App\Entity\Category;
use App\Service\CategoryPage\CategoryServiceInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Entity\Post;

/**
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends ServiceEntityRepository implements CategoryRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function findById(int $id): ?array
    {
        try {
            $entity = $this->createQueryBuilder('p')
                ->where('p.category = :id')
                ->setParameter('id', $id)
                ->andWhere('p.publicationDate IS NOT NULL')
                ->addSelect('p')
                ->getQuery()
                ->getResult();
            return $entity;
        } catch (EntityNotFoundException $e) {
            return null;
        }
    }
}
