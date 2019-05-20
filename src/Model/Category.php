<?php

declare(strict_types=1);

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Model;

use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Person domain object class
 *
 * @Gedmo\Mapping\Annotation\Slug(handlers={
 *      @Gedmo\Mapping\Annotation\SlugHandler(class="Gedmo\Sluggable\Handler\RelativeSlugHandler", options={
 *          @Gedmo\Mapping\Annotation\SlugHandlerOption(name="relationField", value="name"),
 *          @Gedmo\Mapping\Annotation\SlugHandlerOption(name="relationSlugField", value="slug"),
 *          @Gedmo\Mapping\Annotation\SlugHandlerOption(name="separator", value="/")
 *      })
 * })
 * @Doctrine\ORM\Mapping\Column(length=64, unique=true)
 */
final class Category
{
    /**
     * @Gedmo\Mapping\Annotation\Slug
     * @Doctrine\ORM\Mapping\Column(length=64, unique=true)
     */
    private $slug;
    private $name;
    private $id;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSlug()
    {
        return $this->slug;
    }
}
