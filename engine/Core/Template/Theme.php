<?php

namespace Engine\Core\Template;

use Exception;

class Theme
{
    /**
     *
     */
    const RULES_NAME_FILES = [
        'header'    => 'header-$s',
        'footer'    => 'footer-$s',
        'sidebar'   => 'sidebar-$s',
    ];

    /**
     * @var string
     */
    public string $uri = '';

    protected array $data = [];

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @param string|null $name
     * @return void
     * @throws Exception
     */
    public function header(string $name = null)
    {
        $name = (string) $name;
        $file = 'header';

        if($name !== '')
        {
            $file = sprintf(self::RULES_NAME_FILES['header'], $name);
        }
        $this->loadTemplateFile($file);
    }

    /**
     * @param string $name
     * @return void
     * @throws Exception
     */
    public function footer(string $name = '')
    {
        $name = (string) $name;
        $file = 'footer';

        if($name !== '')
        {
            $file = sprintf(self::RULES_NAME_FILES['footer'], $name);
        }
        $this->loadTemplateFile($file);
    }

    /**
     * @param string $name
     * @return void
     * @throws Exception
     */
    public function sidebar(string $name = '')
    {
        $name = (string) $name;
        $file = 'sidebar';

        if($name !== '')
        {
            $file = sprintf(self::RULES_NAME_FILES['sidebar'], $name);
        }
        $this->loadTemplateFile($file);
    }

    /**
     * @param string $name
     * @param array $data
     * @return void
     * @throws Exception
     */
    public function block(string $name = '', array $data = [])
    {
        $name = (string) $name;
        if($name !== '')
        {
            $this->loadTemplateFile($name, $data);
        }
    }


    /**
     * @param $nameFile
     * @param array $data
     * @return void
     * @throws Exception
     */
    public function loadTemplateFile($nameFile, array $data = [])
    {
        $templateFile = ROOT_DIR . '/content/themes/default/' . $nameFile . '.php';
        if(is_file($templateFile))
        {
            extract($data);
            require_once $templateFile;
        }
        else
        {
            throw new Exception(
                sprintf('View file %s does not exist', $templateFile)
            );
        }
    }
}