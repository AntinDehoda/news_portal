<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Service\PostPage\PostServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Controller to display post data in the single-post page
 *
 * @param PostServiceInterface $postService
 * @param int $id
 *
 * @return Response
 *
 *
 * @author Anton Degoda <dehoda@ukr.net>
 */
class PostController extends AbstractController
{
    public function index(PostServiceInterface $postService, int $id): Response
    {
        $post = $postService->findById($id);
        if (null == $post) {
            //throw $this->createNotFoundException('There is no post with id='.$id);
            $post = $postService->getPost($id);
        }

        return $this->render('post/index.html.twig', [
            'post' => $post,
        ]);
    }
}
