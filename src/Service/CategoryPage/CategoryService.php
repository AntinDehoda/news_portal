<?php


namespace App\Service\CategoryPage;


use App\Collection\PostCollection;
use App\PostMapper\PostMapper;
use App\Repository\Category\CategoryRepositoryInterface;

class CategoryService implements CategoryServiceInterface
{

    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function findById(int $id): ?PostCollection
    {

        $entities = $this->categoryRepository->findById($id);
        if (null == $entities) {
            return null;
        }
        $posts = new PostCollection();
        foreach ($entities as $entity) {
            $posts->addPost(PostMapper::entityToModel($entity));
        }
        return $posts;
    }
}