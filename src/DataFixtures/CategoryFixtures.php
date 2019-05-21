<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Category;

class CategoryFixtures extends Fixture
{
    public const CATEGORIES  = [
        'World',
        'Sport',
        'IT',
        'Science',
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::CATEGORIES as $key => $title) {
            $category = new Category($title);
            $category->setTitle($title);


            $this->addReference('category_' . $key, $category);

            for ($i = 0; $i < 20; $i++) {
                if ($this->hasReference('post' . $i)) {
                    $category = $category->addPost($this->getReference('post' . $i));
                }
            }


            $manager->persist($category);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            PostFixtures::class,
        ];
    }
}
