<?php


namespace App\Controller;


use App\Service\CategoryPage\CategoryServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends AbstractController
{
    public function index(CategoryServiceInterface $categoryService, int $id): Response
    {
        $posts = $categoryService->findById($id);
        if (null == $posts) {
            throw $this->createNotFoundException('There is no post in category with id='.$id);
        }

        return $this->render('category/index.html.twig', [
            'posts' => $posts,
        ]);
    }

}