<?php

namespace Engine\Service\Config;

use Engine\Service\AbstractProvider;
use Engine\Core\Config\Config;
use Exception;

class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public string $serviceName = 'config';

    /**
     * @return void
     * @throws Exception
     */
    public function init(): void
    {
        $config['main']     = Config::file('main');
        $config['database'] = Config::file('database');

        $this->di->set($this->serviceName, $config);
    }
}