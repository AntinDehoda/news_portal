<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\CategoryPage;

use App\Mappers\CategoryMapper;
use App\Model\Category;
use App\Repository\Category\CategoryRepositoryInterface;

class CategoryService implements CategoryServiceInterface
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategoryBySlug(string $slug): ?Category
    {
        $entity = $this->categoryRepository->getCategory($slug);
        $model = CategoryMapper::entityToModel($entity);

        return $model;
    }
}
