<?php


abstract class Shape {
    private $width;
    private $height;

    function setWidth($width){
        $this->width = $width;
    }

    function setHeight($height){
        $this->height = $height;
    }

    function getArea() {
        return $this->width * $this->height;
    }

    abstract function __clone();
}

class Square extends Shape {
    private $cname;
    function __construct($w, $h)
    {
        $this->setCname();
        parent::setWidth($w);
        parent::setHeight($h);
    }

    function getCname() {
        return $this->cname;
    }

    function setCname() {
       $this->cname = md5(rand(0,100));
    }

    function __clone() {
        $cname = rand(4410,8585855);
        $this->cname = "<br>NEW {$cname}<br>";
    }
}


$sq1 = new Square(14, 10);
$sq2 = clone $sq1;
if($sq1 === $sq2)
echo 1;
else
echo 0;
$sq2->setWidth(13);
echo "<br>";
echo $sq1->getArea();
echo $sq2->getArea();
echo "<br>";
echo $sq1->getCname();
echo "<br>";
echo $sq2->getCname();