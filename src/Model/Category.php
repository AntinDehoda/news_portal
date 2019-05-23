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

final class Category
{
    protected $slug;
    private $name;
    private $id;

    public function __construct(int $id, string $name, string $slug)
    {
        $this->name = $name;
        $this->id = $id;
        $this->slug = $slug;
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
