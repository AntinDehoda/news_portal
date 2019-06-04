<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service;

use Gedmo\Sluggable\Util\Urlizer;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

final class FileUploader
{
    private $uploadsPath;
    private $params;

    public function __construct(string $uploadsPath, ParameterBagInterface $params)
    {
        $this->uploadsPath = $uploadsPath;
        $this->params = $params;
    }

    public function upload(UploadedFile $uploadedFile): string
    {
        $destination = $this->uploadsPath . $this->params->get('app.post_image_uploads');
        $originalFilename = \pathinfo($uploadedFile->getClientOriginalName(), \PATHINFO_FILENAME);
        $newFileName = Urlizer::urlize($originalFilename) . '-' . \uniqid() . '.' . $uploadedFile->guessExtension();
        $uploadedFile->move(
            $destination,
            $newFileName
            );

        return $newFileName;
    }
}
