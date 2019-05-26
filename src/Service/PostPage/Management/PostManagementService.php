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

class PostManagementService implements PostManagementServiceInterface
{
    private $postRepository;
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function create(PostCreateDto $dto): void
    {
        $post = PostMapper::dtoToEntity($dto);
        $post->publish();
        $this->postRepository->save($post);
    }
    public function update(PostCreateDto $dto, int $id): void
    {
        $post = $this->postRepository->findById($id);
        $post = PostMapper::updateEntity($dto, $post);
        $post->publish();
        $this->postRepository->update();
    }
    public function createPostDtoById(int $id): PostCreateDto
    {
        $post = $this->postRepository->findById($id);
        $dto = PostMapper::entityToDto($post);

        return $dto;
    }
}
