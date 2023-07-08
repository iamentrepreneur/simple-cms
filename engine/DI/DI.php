<?php

namespace Engine\DI;

class DI
{
    /**
     * @var array
     */
    private array $container;

    /**
     * @param $key
     * @param $value
     * @return object
     */
    public function set($key, $value): object
    {
        $this->container[$key] = $value;
        return $this;
    }

    /**
     * @param $key
     * @return bool
     */
    public function get($key)
    {
        return $this->has($key);
    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        return $this->container[$key] ?? false;
    }
}