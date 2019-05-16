<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\HomePage;

use App\Collection\PostCollection;
use App\Model\Post;

/**
 * Interface for retrieving posts data for a home-page.
 *
 * @author Anton Degoda <dehoda@ukr.net>
 */
interface HomePageServiceInterface
{
    public function getPosts(): PostCollection;
    public function getMainPost(): Post;
    public function getTopPosts(): PostCollection;
}
