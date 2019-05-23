<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repository\Category;

use App\Entity\Category;

interface CategoryRepositoryInterface
{
    public function getCategory(string $slug): ?Category;
}
