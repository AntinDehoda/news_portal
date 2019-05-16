<?php

declare(strict_types=1);

/*
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\HomePage;

use App\Collection\PostCollection;
use App\Model\Category;
use App\Model\Post;
use Faker\Factory;

/**
 * This class generates fake posts information for a home-page.
 *
 * @author Anton Degoda <dehoda@ukr.net>
 */
final class FakeHomePageService implements HomePageServiceInterface
{
    private $faker;
    public function __construct()
    {
        $this->faker = Factory::create();
    }
    /** Generate info for bottom posts */
    public function getPosts(): PostCollection
    {
        $collection = new PostCollection();

        for ($i = 0; $i < 10; $i++) {
            $collection->addPost($this->generatePost());
        }

        return $collection;
    }
    /** Generate info for top-posts */
    public function getTopPosts(): PostCollection
    {
        $collection = new PostCollection();

        for ($i = 0; $i < 3; $i++) {
            $collection->addPost($this->generatePost());
        }

        return $collection;
    }
    /** Generate info for main post */
    public function getMainPost(): Post
    {
        return $this->generatePost();
    }
    /** Generate info for one post */
    private function generatePost(): Post
    {
        $post = new Post(
                $this->faker->randomNumber(),
                new Category($this->faker->sentence),
                $this->faker->sentence
            );
        $post
                ->setImage($this->faker->imageUrl())
                ->setShortDescription($this->faker->sentence())
                ->setPublicationDate($this->faker->dateTime)
            ;

        return $post;
    }
}
