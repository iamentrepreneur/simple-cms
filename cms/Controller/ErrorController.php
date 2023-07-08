<?php

namespace Cms\Controller;

use Engine\DI\DI;

class ErrorController extends CmsController
{
    public function page404()
    {
        echo 'Page 404';
    }
}