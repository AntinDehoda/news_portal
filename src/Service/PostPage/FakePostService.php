<?php


namespace App\Service\PostPage;


use App\Model\Category;
use App\Model\Post;
use Faker\Factory;

/**
 * This class generates test data based on post id for a single-post page.
 *
 * @author Anton Degoda <dehoda@ukr.net>
 */

class FakePostService implements PostServiceInterface
{

    /**
     * @param int
     * @return Post object
     */
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
                ->setFullText($faker->text)
            ;

            return $post;
    }
}