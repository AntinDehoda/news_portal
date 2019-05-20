<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Post;

class PostFixtures extends AbstractFixtures implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $post =  new Post($this->faker->sentence);
            $post
                ->setShortDescription($this->faker->sentence(3, true))
                ->setImage($this->faker->ImageURL())
                ->setPostbody($this->faker->sentence(10, true))
                ->setCategory($this->getReference('category_' . \mt_rand(0, 3)))
                ->setBody($this->faker->sentence(10, true))
            ;
            if ($this->faker->boolean(80)) {
                $post->setPublicationDate(new \DateTime());
            }
            $this->addReference('post' . $i, $post);
            $manager->persist($post);
        }


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
          CategoryFixtures::class,
        ];
    }
}
