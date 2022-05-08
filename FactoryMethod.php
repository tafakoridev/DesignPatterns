<?php

interface ShapeBase {
    function draw();
}

class Square implements ShapeBase {
    const BR = "<br/>";
    private $width;

    function __construct($options) {
        $this->width = $options['width'];
    }

    function draw()
    {
        return get_class($this). ":" .$this->width * 4 . self::BR;
    }
}

class Circle implements ShapeBase {
    const BR = "<br/>";
    private $radius;

    function __construct($options) {
        $this->radius = $options['radius'];
    }

    function draw()
    {
        return get_class($this). ":" .$this->radius * pi() * 2 . self::BR;
    }
}

class ShapeFactory {
    static function create($shape, $options) {
        return new $shape($options);
    }
}
$shape = ShapeFactory::create("Circle", ['radius' => 10]);
print_r($shape->draw());

?>