<?php


namespace App\Service\PostPage;


use App\Model\Post;

/**
 * Interface for retrieving post data by its identifier.
 *
 * @author Anton Degoda <dehoda@ukr.net>
 */

interface PostServiceInterface
{
    public function getPost(int $id): Post;
}