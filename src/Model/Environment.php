<?php

namespace Model;
use Pimple\Container;


class Environment {

    protected $container;
    protected $environment;

    public function __construct(Container $container)
    {
        $this->container = $container;


        $environment = $this->container["config"]['environment'];

        var_dump($environment['patch']);

        if (!file_exists($environment['patch'])) {
            if(@mkdir($environment['patch'], 0700, true)==false)
                throw new \Exception("Environment ".$environment['patch']."  does not exist and cannot be created.");
        }
    }

}