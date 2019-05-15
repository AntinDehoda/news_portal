<?php

namespace App\Controller;

use App\Service\HomePage\HomePageServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
/**
 * Controller to display post data in the home-page
 *
 * @Route("/")
 *
 * @author Anton Degoda <dehoda@ukr.net>
 */
final class DefaultController extends AbstractController
{
    public function index(HomePageServiceInterface $homePageService): Response
    {
        $posts = $homePageService->getPosts();
        $topPosts = $homePageService->getTopPosts();
        $headerPost = $homePageService->getMainPost();

        return $this->render('default/index.html.twig', [
            'posts' => $posts,
            'topposts' => $topPosts,
            'mainpost' => $headerPost,
        ]);
    }

}
