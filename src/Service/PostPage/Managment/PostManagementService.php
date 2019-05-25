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
use App\PostMapper\PostMapper;
use App\Repository\Post\PostRepositoryInterface;

class PostManagementService implements PostManagementServiceInterface
{
    private $postRepository;
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function create(PostCreateDto $dto)
    {
        $post = PostMapper::dtoToEntity($dto);
        $post->publish();
        $this->postRepository->save($post);
    }
}
