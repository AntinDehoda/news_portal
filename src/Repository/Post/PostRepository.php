<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repository\Post;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Model\Category;

/**
 * @method null|Post find($id, $lockMode = null, $lockVersion = null)
 * @method null|Post findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository implements PostRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function findById(int $id): ?Post
    {
        try {
            return $this->createQueryBuilder('p')
                ->where('p.id = :id')
                ->setParameter('id', $id)
//                ->andWhere('p.publicationDate IS NOT NULL')
                ->innerJoin('p.category', 'c')
                ->addSelect('c')
                ->getQuery()
                ->getOneOrNullResult()
                ;
        } catch (NonUniqueResultException $e) {
            return null;
        }
    }
    public function getPostsByCategory(Category $category): ?array
    {
        try {
            $entity = $this->createQueryBuilder('p')
                ->where('p.category = :id')
                ->setParameter('id', $category->getId())
                ->andWhere('p.publicationDate IS NOT NULL')
                ->getQuery()
                ->getResult();

            return $entity;
        } catch (EntityNotFoundException $e) {
            return null;
        }
    }
    public function save(Post $post): void
    {
        $em = $this->getEntityManager();
        $em->persist($post);
        $em->flush();
    }
    public function update(): void
    {
        $em = $this->getEntityManager();
        $em->flush();
    }
}
