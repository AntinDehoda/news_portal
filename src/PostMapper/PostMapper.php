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
use App\Model\Category;
use App\Model\Post as PostModel;

class PostMapper
{
    public static function entityToModel(Post $entity): PostModel
    {
        $model =  new PostModel(
            $entity->getId(),
            new Category($entity->getCategory()->getTitle()),
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
