<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Mappers;

use App\Entity\Category;
use App\Model\Category as CategoryModel;

class CategoryMapper
{
    public static function entityToModel(Category $entity): CategoryModel
    {
        $model =  new CategoryModel(
            $entity->getId(),
            $entity->getTitle(),
            $entity->getSlug()
        );

        return $model;
    }
}
