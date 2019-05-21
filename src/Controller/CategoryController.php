<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Service\CategoryPage\CategoryServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends AbstractController
{
    public function index(CategoryServiceInterface $categoryService, string $slug): Response
    {
        $category;
        $posts = $categoryService->getPosts($id);


        if (null == $posts) {
            throw $this->createNotFoundException('There is no post in category with id=' . $id);
        }

        return $this->render('category/index.html.twig', [
            'posts' => $posts,
        ]);
    }
}
