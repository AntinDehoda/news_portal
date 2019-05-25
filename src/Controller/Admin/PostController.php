<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller\Admin;

use App\Model\Post;
use App\Form\PostCreateType;
use App\Service\PostPage\Managment\PostManagementServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

final class PostController extends AbstractController
{
    public function create(Request $request, PostManagementServiceInterface $postManagement)
    {
        $form = $this->createForm(PostCreateType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $postManagement->create($form->getData());

            $this->addFlash('success', 'Post was succesfully created!');

            return $this->redirectToRoute('admin_post_create');
        }

        return $this->render('admin/post/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function edit(Post $post, Request $request, PostManagementServiceInterface $postManagement)
    {
        $form = $this->createForm(PostCreateType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $postManagement->create($form->getData());

            $this->addFlash('success', 'Post was successfully updated!');

            return $this->redirectToRoute('admin_post_edit', [
                'id' => $post->getId(),
            ]);
        }

        return $this->render('admin/post/edit.html.twig', [
            'postEditForm' => $form->createView(),
        ]);
    }
}
