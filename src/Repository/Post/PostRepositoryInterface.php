<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repository\Post;

use App\Model\Category;
use App\Entity\Post;

interface PostRepositoryInterface
{
    public function findById(int $id): ?Post;
    public function getPostsByCategory(Category $category): ?array;
}
