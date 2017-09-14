<?php

namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimple\Container;
use Symfony\Component\Console\Input\InputArgument;

class Listener extends Command
{
    private $container;

    /**
     * Listener constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        parent::__construct();
        $this->container = $container;
    }


    protected function configure()
    {
        $this
            ->setName('listener:start')
            ->setDescription('An example command.')
            ->addArgument('port', InputArgument::OPTIONAL, 'The username of the user.', 8080)
        ;
    }

    /**
     * Start new HttpServer
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $requestHandler = new \Yosymfony\HttpServer\RequestHandler(function ($request) {
            return new \Symfony\Component\HttpFoundation\Response(
                'Hi ',
                200,
                array('content-type' => 'text/html')
            );
        });
        $requestHandler->enableHttpFoundationRequest();
        $requestHandler->listen(8081, '0.0.0.0');
        $server = new \Yosymfony\HttpServer\HttpServer($requestHandler);
        $server->start();

        // go to http://localhost:8081
    }
}