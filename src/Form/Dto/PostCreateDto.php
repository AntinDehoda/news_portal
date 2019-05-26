<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Form\Dto;

use Symfony\Component\Validator\Constraints as Assert;

final class PostCreateDto
{
    /**
     * @Assert\NotBlank
     * @Assert\NotNull
     */
    public $title;
    /**
     * @Assert\NotNull
     */
    public $postBody;
    /**
     * @Assert\NotNull
     */
    public $shortDescription;
    /**
     * @Assert\Url
     */
    public $image;
    public $category;
    public $publicationDate;
}
