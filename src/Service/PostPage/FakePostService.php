<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\PostPage;

use App\Collection\PostCollection;
use App\Model\Category;
use App\Model\Post;
use Faker\Factory;

/**
 * This class generates fake post information based on post id for a single-post page.
 *
 * @author Anton Degoda <dehoda@ukr.net>
 */
class FakePostService implements PostServiceInterface
{
    public function getPost(int $id): Post
    {
        $faker = Factory::create();

        $post = new Post(
            $id,
            new Category($faker->word),
            $faker->sentence
            );
        $post
                ->setImage($faker->imageUrl())
                ->setShortDescription($faker->sentence())
                ->setPublicationDate($faker->dateTime)
                ->setPostBody($faker->text)

            ;

        return $post;
    }

    public function findById(int $id): ?Post
    {
        // TODO: Implement findById() method.
        return null;
    }

    public function getPostsByCategory(Category $category): ?PostCollection
    {
        // TODO: Implement getPostsByCategory() method.
    }
}
