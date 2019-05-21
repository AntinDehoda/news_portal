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

interface CategoryServiceInterface
{
    public function getPosts(int $id): ?PostCollection;

    public function getCategory(string $slug): ?Category;
}
