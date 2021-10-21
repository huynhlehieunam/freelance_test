<?php


namespace Model;
require_once __DIR__."/StringifyFormat.php";


class Staff extends AbstractModel implements StringifyFormat
{
    public function toString()
    {
        $info = "";
        foreach ($this->data as $key=>$value){
            $info .= "$key: $value;";
        }
        return $info;
    }
}