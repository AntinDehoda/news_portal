<?php


namespace App\Controller;


use App\Service\PostPage\PostServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Controller to display post data in the single-post page
 *
 * @Route("/post/{id}")
 *
 * @author Anton Degoda <dehoda@ukr.net>
 */

class PostController extends AbstractController
{

    public function index(PostServiceInterface $postService, int $id): Response
    {
        $post = $postService->getPost($id);

        return $this->render('post/index.html.twig', [
            'post' => $post,
        ]);
    }
}