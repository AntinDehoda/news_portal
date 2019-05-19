<?php


namespace App\Repository\Post;


use App\Entity\Post;

interface PostRepositoryInterface
{
    public function findById(int $id): ?Post;

}