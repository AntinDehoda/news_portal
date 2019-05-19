<?php


namespace App\PostMapper;


use App\Entity\Post;
use App\Model\Category;
use App\Model\Post as PostModel;

class PostMapper
{
    public static function entityToModel (Post $entity): PostModel
    {
        $model =  new PostModel(
          $entity->getId(),
          new Category('TODO Category title'),
            $entity->getTitle()
        );
        $model
            ->setImage($entity->getImage())
            ->setShortDescription($entity->getShortDescription())
            ->setPublicationDate($entity->getPublicationDate())
            ->setPostBody($entity->getPostbody());
        return $model;

    }
}