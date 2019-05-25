<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class CreateUserCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('app:create-user');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Start...');
    }
}
