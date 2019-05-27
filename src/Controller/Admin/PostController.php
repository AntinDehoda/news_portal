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
use App\Service\PostPage\Management\UploaderHelper;
use App\Service\PostPage\Management\PostManagementServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class PostController extends AbstractController
{
    public function create(Request $request, PostManagementServiceInterface $postManagement, UploaderHelper $uploaderHelper)
    {
        $form = $this->createForm(PostCreateType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dto = $form->getData();
            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $form['imageFile']->getData();

            if ($uploadedFile) {
                $dto = $uploaderHelper->setPostImage($uploadedFile, $dto);
            }
            $postManagement->create($dto);

            $this->addFlash('success', 'Post was successfully created!');

            return $this->redirectToRoute('admin_post_create');
        }

        return $this->render('admin/post/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function edit(Request $request, PostManagementServiceInterface $postManagement, int $id, UploaderHelper $uploaderHelper)
    {
        $dto = $postManagement->createPostDtoById($id);
        $form = $this->createForm(PostEditType::class, $dto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dto = $form->getData();
            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $form['imageFile']->getData();

            if ($uploadedFile) {
                $dto = $uploaderHelper->setPostImage($uploadedFile, $dto);
            }
            $postManagement->update($dto, $id);

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
