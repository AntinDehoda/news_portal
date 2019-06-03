<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\PostPage\Management;

use App\Form\Dto\PostCreateDto;
use Symfony\Component\HttpFoundation\File\UploadedFile;

interface PostManagementServiceInterface
{
    public function create(PostCreateDto $dto, UploadedFile $uploadedFile): void;
    public function update(PostCreateDto $dto, UploadedFile $uploadedFile, int $id): void;
    public function getPost(int $id): PostCreateDto;
}
