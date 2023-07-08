<?php

namespace Engine\Core\Template;
use Engine\Core\Template\Theme;

class View
{
    /**
     * @var \Engine\Core\Template\Theme
     */
    protected \Engine\Core\Template\Theme $theme;

    /**
     *
     */
    public function __construct()
    {
        $this->theme = new Theme();
    }

    /**
     * @param $template
     * @param array $vars
     * @return void
     */
    public function render($template, array $vars = [])
    {
        $templatePath = $this->getTemplatePath($template, ENV);
        if(!is_file($templatePath))
        {
            throw new \InvalidArgumentException(
                sprintf('Template "%s" not found in "%s"', $template, $templatePath)
            );
        }
        $this->theme->setData($vars );
        extract($vars);
        ob_start();
        ob_implicit_flush(0);

        try {
            require_once $templatePath;
        }catch (\Exception $e) {
            ob_end_clean();
            throw $e;
        }

        echo ob_get_clean();
    }

    /**
     * @param $template
     * @param $env
     * @return string
     */
    public function getTemplatePath($template, $env = null): string
    {
        if($env == 'Cms')
        {
            return ROOT_DIR . '/content/themes/default/' . $template . '.php';
        }

        return ROOT_DIR . '/admin/View/' . $template . '.php';

//        switch ($env) {
//            case 'Admin':
//                return ROOT_DIR . '/admin/View/' . $template . '.php';
//                break;
//            case 'Cms':
//                return ROOT_DIR . '/content/themes/default/' . $template . '.php';
//                break;
//            default:
//                return ROOT_DIR . '/' . mb_strtolower($env) . '/View/' . $template . '.php';
//
//        }
    }
}