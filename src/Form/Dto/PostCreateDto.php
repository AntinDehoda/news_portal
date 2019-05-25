<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Form\Dto;

final class PostCreateDto
{
    public $title;
    public $postBody;
    public $shortDescription;
    public $image;
    public $category;
    public $publicationDate;
}
