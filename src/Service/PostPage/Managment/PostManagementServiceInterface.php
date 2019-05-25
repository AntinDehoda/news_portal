<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\PostPage\Managment;

use App\Form\Dto\PostCreateDto;

interface PostManagementServiceInterface
{
    public function create(PostCreateDto $dto);
}
