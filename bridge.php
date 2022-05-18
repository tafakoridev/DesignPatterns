<?php

    abstract class Shape {
        abstract function draw();
    }

    class Square extends Shape {
        public $color;

        function __construct(Color $color)
        {
            $this->color = $color;    
        }

        function draw() {
            return "Square" . $this->color->fill();
        }
    }

    interface Color {
        function fill();
    }

    class Red implements Color {
        function fill() {
            return "Red";
        }
    }

    class Blue implements Color {
        function fill() {
            return "Blue";
        }
    }

$redcolor = new Red(); 
$bluecolor = new Blue(); 
$redsquare = new Square($bluecolor);
echo $redsquare->draw()
?>