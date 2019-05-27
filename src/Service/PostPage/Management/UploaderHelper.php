<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\PostPage\Management;

use App\Form\Dto\PostCreateDto;
use Gedmo\Sluggable\Util\Urlizer;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class UploaderHelper
{
    private $uploadsPath;

    public function __construct(string $uploadsPath)
    {
        $this->uploadsPath = $uploadsPath;
    }

    public function setPostImage(UploadedFile $uploadedFile, PostCreateDto $dto): PostCreateDto
    {
        $destination = $this->uploadsPath . '/post_img';
        $originalFilename = \pathinfo($uploadedFile->getClientOriginalName(), \PATHINFO_FILENAME);
        $newFileName = Urlizer::urlize($originalFilename) . '-' . \uniqid() . '.' . $uploadedFile->guessExtension();
        $uploadedFile->move(
            $destination,
            $newFileName
            );
        $dto->image = $newFileName;

        return $dto;
    }
}
