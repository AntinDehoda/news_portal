<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\DataFixtures;

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
                $post->publish(new \DateTime());
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
