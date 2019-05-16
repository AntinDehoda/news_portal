<?php

declare(strict_types=1);

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Collection;

use App\Model\Post;

final class PostCollection implements \IteratorAggregate
{
    private $posts;

    public function __construct(Post ...$posts)
    {
        $this->posts = $posts;
    }

    public function addPost(Post $post): void
    {
        $this->posts[] = $post;
    }

    public function getIterator(): iterable
    {
        return new \ArrayIterator($this->posts);
    }
}
