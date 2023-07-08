<?php

namespace Engine\Helper;

/**
 *
 */
class Common
{
    /**
     * @return bool
     */
    function isPost(): bool
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            return true;
        }
        return false;
    }

    /**
     * @return mixed
     */
    function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return false|mixed|string
     */
    function getPathUri()
    {
        $pathUri = $_SERVER['REQUEST_URI'];

        if($position = strpos($pathUri, '?'))
        {
            $pathUri = substr($pathUri, 0, $position);
        }

        return $pathUri;
    }
}