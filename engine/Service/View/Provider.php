<?php

namespace Engine\Service\View;

use Engine\Service\AbstractProvider;
use Engine\Core\Template\View;

class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public string $serviceName = 'view';

    /**
     * @return mixed|void
     */
    public function init()
    {
        $view = new View();

        $this->di->set($this->serviceName, $view);
    }
}