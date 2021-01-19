<?php
namespace Engine\DI;

/*DI container*/
class DI
{
    /**
     * @var array;
     */
    private $container = [];

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key,$value)
    {
        $this->container[$key] = $value;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->container[$key];
    }

    public function has($key)
    {
        return isset($this->container[$key]) ? $this->container[$key] : null;
    }
}
?>