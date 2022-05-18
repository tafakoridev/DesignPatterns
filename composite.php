<?php

interface RenderInterface {
    function render();
}

class InputText implements RenderInterface {
    protected $placeholder, $name;
    function __construct($placeholder, $name)
    {
        $this->placeholder = $placeholder;
        $this->name = $name;
    }

    function render() {
        return "<input type='text' placeholder='$this->placeholder' name='$this->name' />";
    }
}

class Button implements RenderInterface {
    protected $title;
    function __construct($title)
    {
        $this->title = $title;
    }

    function render() {
        return "<button>$this->title</button>";
    }
}

class Form implements RenderInterface {
    public $children;
    function add(RenderInterface $el)
    {
        $this->children[] = $el;
    }

    function render() {
        echo "<form>";
        foreach ($this->children as $key => $element) {
            echo $element->render();
        }
        echo "</form>";
    }
}

$form = new Form;
$form->add(new InputText("name", "fullname"));
$form->add(new InputText("phone", "phone"));
$form->add(new Button("Save"));
$form->render();
?>