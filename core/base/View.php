<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 19.03.2019
 * Time: 8:53
 */

namespace core\base;


class View
{
    private $path;
    protected $data=[];
    /**
     * View constructor.
     * @param $name
     */
    public function __construct(string $name)
    {
        $this->path = APP_DIR."views/".$name.EXT;
    }
    public function render(array $data=[]){
        $data = array_merge($data,$this->data);
        extract($data);
        ob_start();
        include $this->path;
        return ob_get_clean();
    }
    public function __set($name, $value)
    {
        $this->data[$name]=$value;
    }
    public function __toString()
    {
        return $this->render();
    }
}