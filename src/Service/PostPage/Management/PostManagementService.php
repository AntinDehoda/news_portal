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
use App\Mappers\PostMapper;
use App\Repository\Post\PostRepositoryInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PostManagementService implements PostManagementServiceInterface
{
    private $postRepository;
    private $uploaderHelper;


    public function __construct(PostRepositoryInterface $postRepository, UploaderHelper $uploaderHelper)
    {
        $this->postRepository = $postRepository;
        $this->uploaderHelper = $uploaderHelper;
    }

    public function create(PostCreateDto $dto, UploadedFile $uploadedFile): void
    {
        if ($uploadedFile) {
            $dto->image = $this->uploaderHelper->setPostImage($uploadedFile);
        }
        $post = PostMapper::dtoToEntity($dto);
        $post->publish();
        $this->postRepository->save($post);
    }
    public function update(PostCreateDto $dto, UploadedFile $uploadedFile, int $id): void
    {
        if ($uploadedFile) {
            $dto->image = $this->uploaderHelper->setPostImage($uploadedFile);
        }
        $post = $this->postRepository->findById($id);
        $post = PostMapper::updateEntity($dto, $post);
        $post->publish();
        $this->postRepository->update();
    }
    public function getPost(int $id): PostCreateDto
    {
        $post = $this->postRepository->findById($id);
        $dto = PostMapper::entityToDto($post);

        return $dto;
    }
}
