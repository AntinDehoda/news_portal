<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Person domain object class
 *
 * @Gedmo\Mapping\Annotation\Slug(handlers={
 *      @Gedmo\Mapping\Annotation\SlugHandler(class="Gedmo\Sluggable\Handler\RelativeSlugHandler", options={
 *          @Gedmo\Mapping\Annotation\SlugHandlerOption(name="relationField", value="title"),
 *          @Gedmo\Mapping\Annotation\SlugHandlerOption(name="relationSlugField", value="slug"),
 *          @Gedmo\Mapping\Annotation\SlugHandlerOption(name="separator", value="/")
 *      })
 * })
 * @Doctrine\ORM\Mapping\Column(length=64, unique=true)
 */

/**
 * @ORM\Entity(repositoryClass="App\Repository\Category\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()git
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Gedmo\Mapping\Annotation\Slug
     * @Doctrine\ORM\Mapping\Column(length=64, unique=true)
     */
    private $slug;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Post", mappedBy="category")
     */
    private $post;

    public function __construct(string $title)
    {
        $this->title = $title;
        $this->post = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @return Collection|Post[]
     */
    public function getPost(): Collection
    {
        return $this->post;
    }

    public function addPost(Post $post): self
    {
        if (!$this->post->contains($post)) {
            $this->post[] = $post;
            $post->setCategory($this);
        }

        return $this;
    }

    public function removePost(Post $post): self
    {
        if ($this->post->contains($post)) {
            $this->post->removeElement($post);
            // set the owning side to null (unless already changed)
            if ($post->getCategory() === $this) {
                $post->setCategory(null);
            }
        }

        return $this;
    }
}
