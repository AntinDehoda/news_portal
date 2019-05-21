<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\PostPage;

use App\Model\Post;
use App\PostMapper\PostMapper;
use App\Repository\Post\PostRepositoryInterface;

class PostPresentationService implements PostServiceInterface
{
    private $postRepository;
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function findById(int $id): ?Post
    {
        $entity = $this->postRepository->findById($id);

        if (null == $entity) {
            return null;
        }

        $model = PostMapper::entityToModel($entity);

        return $model;
    }
}
