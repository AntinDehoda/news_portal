<?php


namespace App\Service\CategoryPage;


use App\Collection\PostCollection;

interface CategoryServiceInterface
{
    public function findById(int $id): ?PostCollection;
}