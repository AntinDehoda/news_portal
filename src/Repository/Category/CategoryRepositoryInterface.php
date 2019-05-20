<?php


namespace App\Repository\Category;


use App\Collection\PostCollection;

interface CategoryRepositoryInterface
{
    public function findById(int $id): ?array ;
}