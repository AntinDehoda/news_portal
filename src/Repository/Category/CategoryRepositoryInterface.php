<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repository\Category;

use App\Model\Category;

interface CategoryRepositoryInterface
{
    public function getPosts(int $id): ?array ;

    public function getCategory(string $slug): ?Category;
}
