<?php

namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimple\Container;
use Symfony\Component\Console\Input\InputArgument;

class Deploy extends Command
{
    private $container;

    public function __construct(Container $container)
    {
        parent::__construct();
        $this->container = $container;
    }

    protected function configure()
    {
        $this
            ->setName('deploy:init')
            ->setDescription('Init new repo to project')
            ->addArgument('repo', InputArgument::REQUIRED, 'Url of git repo')
            ->addArgument('priority', InputArgument::OPTIONAL, 'Priority to run', 0)

        ;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        //shell_exec("git ")
        var_dump($this->container["config"]);
        $output->writeln('Heppppllo, World!');
    }
}