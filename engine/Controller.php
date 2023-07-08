<?php

namespace Engine;

use Engine\Core\Database\Connection;
use Engine\DI\DI;

abstract class Controller
{
    protected DI $di;

    protected $db;
    protected $view;

    protected $config;

    public function __construct(DI $di)
    {
        $this->di       = $di;
        $this->view     = $this->di->get('view');
        $this->config   = $this->di->get('config');
    }
}