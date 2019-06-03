<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\PostPage\Management;

use Gedmo\Sluggable\Util\Urlizer;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class UploaderHelper
{
    private $uploadsPath;
    const POST_IMAGE_UPLOADS = '/post_img';

    public function __construct(string $uploadsPath)
    {
        $this->uploadsPath = $uploadsPath;
    }

    public function setPostImage(UploadedFile $uploadedFile): string
    {
        $destination = $this->uploadsPath . self::POST_IMAGE_UPLOADS;
        $originalFilename = \pathinfo($uploadedFile->getClientOriginalName(), \PATHINFO_FILENAME);
        $newFileName = Urlizer::urlize($originalFilename) . '-' . \uniqid() . '.' . $uploadedFile->guessExtension();
        $uploadedFile->move(
            $destination,
            $newFileName
            );

        return $newFileName;
    }
}
