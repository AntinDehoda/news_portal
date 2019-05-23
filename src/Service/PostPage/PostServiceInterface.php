<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\PostPage;

use App\Collection\PostCollection;
use App\Model\Category;
use App\Model\Post;

/**
 * Interface for retrieving post data by its identifier.
 *
 * @author Anton Degoda <dehoda@ukr.net>
 */
interface PostServiceInterface
{
    public function findById(int $id): ?Post;

    public function getPostsByCategory(Category $category): ?PostCollection;
}
