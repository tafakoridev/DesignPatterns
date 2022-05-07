<?php

//Interfaces
interface Phone {
    function setTitle($title);
    function getTitle(): String;
    function createCpu() : Cpu;
    function createRam() : Ram;
    function createPhone(): Render;
}

interface Cpu {
    function setModel($model);
    function getModel(): String;
}

interface Ram {
    function setSize($size);
    function getSize(): String;
}

interface Render {
    function createPhone() : String;
}

//Factories
class GalaxyA22 implements Phone {
    private $title;
    function setTitle($title)
    {
        $this->title = $title;
    }

    function getTitle(): string
    {
        $cpu = $this->createCpu()->getModel();
        $ram = $this->createRam()->getSize();
        return "<b>$this->title</b> <br> - Ram: $ram <br>- Cpu: $cpu";
    }

    function createCpu(): Cpu
    {
        return new CpuX22("Series A");
    }

    function createRam(): Ram
    {
        return new RamKingstone("4GB");
    }

    function createPhone(): Render
    {
        return new SamsungRender($this);
    }
}

class IphoneX implements Phone {
    private $title;
    function setTitle($title)
    {
        $this->title = $title;
    }

    function getTitle(): string
    {
        $cpu = $this->createCpu()->getModel();
        $ram = $this->createRam()->getSize();
        return "<b>$this->title</b> <br> - Ram: $ram <br>- Cpu: $cpu";
    }

    function createCpu(): Cpu
    {
        return new CpuX9500("Cortex B52");
    }

    function createRam(): Ram
    {
        return new RamTerbaik("6GB");
    }

    function createPhone(): Render
    {
        return new IphoneRender($this);
    }
}

//Factories that use in above
class CpuX22 implements Cpu {
    private $model;

    function __construct($model)
    {
        $this->setModel($model);
    }

    function setModel($model)
    {
        $this->model = "CpuX22 - $model";
    }

    function getModel(): string
    {
        return $this->model;
    }
}

class CpuX9500 implements Cpu {
    private $model;
    function __construct($model)
    {
        $this->setModel($model);
    }

    function setModel($model)
    {
        $this->model = "CpuX9500 - $model";
    }

    function getModel(): string
    {
        return $this->model;
    }
}

class RamKingstone implements Ram {
    private $size;
    function __construct($size)
    {
        $this->setSize($size);
    }

    function setSize($size)
    {
        $this->size = "RamKingstone - $size";
    }

    function getSize(): string
    {
        return $this->size;
    }
}


class RamTerbaik implements Ram {
    private $size;
    function __construct($size)
    {
        $this->setSize($size);
    }

    function setSize($size)
    {
        $this->size = "RamTerbaik - $size";
    }

    function getSize(): string
    {
        return $this->size;
    }
}

class SamsungRender implements Render {
    private $phone;
    function __construct(Phone $phone)
    {
        $this->phone = $phone;
        $this->createPhone();    
    }

    function createPhone(): string
    {
        return $this->phone->getTitle();
    }
}

class IphoneRender implements Render {
    private $phone;
    function __construct(Phone $phone)
    {
        $this->phone = $phone;
        $this->createPhone();    
    }

    function createPhone(): string
    {
        return $this->phone->getTitle();
    }
}

class Mobile {
    function __construct(Phone $model)
    {
        $model->createPhone();
        echo $model->getTitle();
    }
}
$galaxyA22 = new GalaxyA22();
$galaxyA22->setTitle("Samsung Galaxy A22");

$iphoneX = new IphoneX();
$iphoneX->setTitle("Apple iphone X");
new Mobile($iphoneX);

?>