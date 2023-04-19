<?php
namespace Helper;

class ViewHelper{
    public function getImg(String $name){
        return URL."public/img/".$name;
    }
}