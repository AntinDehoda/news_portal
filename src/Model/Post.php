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

final class Post
{
    private $id;
    private $category;
    private $title;
    private $shortDescription;
    private $image;
    private $publicationDate;
    private $postBody;

    public function getPostBody(): ?string
    {
        return $this->postBody;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
    public function setPostBody(string $postBody): self
    {
        $this->postBody = $postBody;

        return $this;
    }
    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
    public function __construct(int $id, Category $category, string $title)
    {
        $this->id = $id;
        $this->category = $category;
        $this->title = $title;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(?string $description): self
    {
        $this->shortDescription = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPublicationDate(): \DateTimeInterface
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(\DateTimeInterface $date): self
    {
        $this->publicationDate = $date;

        return $this;
    }
}
