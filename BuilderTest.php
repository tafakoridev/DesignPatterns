<?php
class Developer {
    public $type;
    public $gender;
    public $name;
    const GENDER_MALE = "male";
    const GENDER_FEMALE = "female";
    const FRONTEND = "frontend";
    const BACKEND = "backend";
}

interface DeveloperMaker {
    function setType();
    function setGender();
    function setName($name);
    function getDeveloper();
}

class PHPDeveloper implements DeveloperMaker {
    private $developer;

    function __construct()
    {
        $this->developer = new Developer();   
    }

    function setName($name)
    {
        $this->developer->name = $name;
    }

    function setGender()
    {
        $this->developer->gender = Developer::GENDER_MALE;
    }

    function setType()
    {
        $this->developer->type = Developer::BACKEND;
    }

    function getDeveloper()
    {
        return $this->developer;
    }
}

class JSDeveloper implements DeveloperMaker {
    private $developer;

    function __construct()
    {
        $this->developer = new Developer();   
    }

    function setName($name)
    {
        $this->developer->name = $name;
    }

    function setGender()
    {
        $this->developer->gender = Developer::GENDER_FEMALE;
    }

    function setType()
    {
        $this->developer->type = Developer::FRONTEND;
    }

    function getDeveloper()
    {
        return $this->developer;
    }
}

class DeveloperDirector {
    function build(DeveloperMaker $developer) {
        $developer->setGender();
        $developer->setType();
        return $developer->getDeveloper();
    }
}

$phpdeveloper = new PHPDeveloper();
$phpdeveloper->setName("Kaveh");
$director = new DeveloperDirector();
$developerResult = $director->build($phpdeveloper);

print_r($developerResult);
?>