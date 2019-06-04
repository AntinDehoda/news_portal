<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller\Admin;

use App\Form\PostEditType;
use App\Form\PostCreateType;
use App\Service\PostPage\Management\PostManagementServiceInterface;
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

            $this->addFlash('success', 'Post was successfully created!');

            return $this->redirectToRoute('admin_post_create');
        }

        return $this->render('admin/post/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function edit(Request $request, PostManagementServiceInterface $postManagement, int $id)
    {
        $dto = $postManagement->getPost($id);
        $form = $this->createForm(PostEditType::class, $dto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $postManagement->update($form->getData(), $id);

            $this->addFlash('success', 'Post was successfully updated!');

            return $this->redirectToRoute('admin_post_edit', [
                'id' => $id,
            ]);
        }

        return $this->render('admin/post/edit.html.twig', [
            'postEditForm' => $form->createView(),
        ]);
    }
}
