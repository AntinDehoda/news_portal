<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\CategoryPage;

use App\Collection\PostCollection;
use App\Model\Category;
use App\PostMapper\PostMapper;
use App\Repository\Category\CategoryRepositoryInterface;

class CategoryService implements CategoryServiceInterface
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getPosts(int $id): ?PostCollection
    {
        $entities = $this->categoryRepository->getPosts($id);

        if (null == $entities) {
            return null;
        }
        $posts = new PostCollection();

        foreach ($entities as $entity) {
            $posts->addPost(PostMapper::entityToModel($entity));
        }

        return $posts;
    }

    public function getCategory(string $slug): ?Category
    {
        $entity = $this->categoryRepository->getCategory($slug);
    }
}
