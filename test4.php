<?php

class Builder{
    public static $queryParams = [];
    public function someSet(string $param)
    {
        $this->queryParams = $param;
    }
}
$var2 = new Builder();
$var2->someSet("dwdwdw");
var_dump(Builder::$queryParams);exit;

class PostFilter
{
    private $queryParams = [];

    public function __construct(array $params)
    {
        $this->queryParams = $params;
        $params["content"] = 1111;
    }
    

}
$builder = new Builder;
//$var1 = new PostFilter($params);
//var_dump($params);