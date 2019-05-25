<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\PostMapper;

use App\Entity\Post;
use App\Form\Dto\PostCreateDto;
use App\Model\Category;
use App\Model\Post as PostModel;

class PostMapper
{
    public static function entityToModel(Post $entity): PostModel
    {
        $model =  new PostModel(
            $entity->getId(),
            new Category(
                $entity->getCategory()->getId(),
                $entity->getCategory()->getTitle(),
                $entity->getCategory()->getSlug()
            ),
            $entity->getTitle()
        );
        $model
            ->setImage($entity->getImage())
            ->setShortDescription($entity->getShortDescription())
            ->setPublicationDate($entity->getPublicationDate())
            ->setPostBody($entity->getPostbody());

        return $model;
    }
    public static function dtoToEntity(PostCreateDto $dto): Post
    {
        $entity = new Post($dto->title);
        $entity
            ->setPostbody($dto->postBody)
            ->setShortDescription($dto->shortDescription)
            ->setCategory($dto->category)
            ->setImage($dto->image);

        return $entity;
    }
    public static function updateEntity(PostCreateDto $dto, Post $entity): Post
    {
        $entity
            ->setTitle($dto->title)
            ->setPostBody($dto->postBody)
            ->setShortDescription($dto->shortDescription)
            ->setCategory($dto->category)
            ->setImage($dto->image);

        return $entity;
    }
    public static function entityToDto(Post $post): PostCreateDto
    {
        $dto = new PostCreateDto();
        $dto->title = $post->getTitle();
        $dto->category = $post->getCategory();
        $dto->image = $post->getImage();
        $dto->shortDescription = $post->getShortDescription();
        $dto->postBody = $post->getPostBody();
        $dto->publicationDate = null == $post->getPublicationDate() ? false : true;

        return $dto;
    }
}
