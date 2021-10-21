<?php


namespace Model;


class AbstractModel
{
    protected $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }
    public function __set($key,$value){
        $this->data[$key] = $value;
    }
    public function __get($key){
        if (!empty($this->data[$key])){
            return $this->data[$key];
        }
        return null;
    }
    public function setData($data){
        $this->data = $data;
    }
    public function getData(){
        return $this->data;
    }
}