<?php

namespace App\DataFixtures;

use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Post;

class PostFixtures extends AbstractFixtures
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $post =  new Post($this->faker->sentence);
            $post
                ->setShortDescription($this->faker->sentence(3, true))
                ->setImage($this->faker->ImageURL())
                ->setPostbody($this->faker->sentence(10, true))
                ->setBody($this->faker->sentence(10, true))
            ;
            if ($this->faker->boolean(80)) {
                $post->setPublicationDate(new \DateTime());
            }
            $manager->persist($post);
        }


        $manager->flush();
    }
}
