<?php
    interface SoftwarePrototype {
        function __clone();
    }

    class SoftwareExample implements SoftwarePrototype {
        private $developer;
        private $dateOfCreate;
        private $lastVersion;
        private $description;
        const BR = "<br/>";

        function __construct($developer, $dateOfCreate, $lastVersion, $description)  {
            $this->developer = $developer;
            $this->dateOfCreate = $dateOfCreate;
            $this->lastVersion = $lastVersion;
            $this->description = $description;
        }

        function getInfo() {
            return "this software developed by {$this->developer} and last version of it is {$this->lastVersion}, and it was create at {$this->dateOfCreate}. software description: {$this->description}" . self::BR;
        }


        function __clone()
        {
            $this->lastVersion = "0";
        }
    }

    function main() {
        $softwareExample = new SoftwareExample("Kaveh", "2022-Feb", "1.52", "this is and cms that manages your blogs!");
        print_r($softwareExample->getInfo());
        $softwareExample2 = clone $softwareExample;
        print_r($softwareExample2->getInfo());

        if($softwareExample == $softwareExample2)
            echo "1 object";
        else
            echo "seperate objects";

    }

    main();
?>