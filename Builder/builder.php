<?php
class Button{
    private $buttonName;
    private $buttonType;
    private $title;


    public function setButtonType($buttonType){
        $this->buttonType = $buttonType;
    }

    public function setButtonName($buttonName){
        $this->buttonName = $buttonName;
    }

    public function setTitle($title){
        $this->title = $title;
    }

}

interface Builder {
    public function buildButton($buttonType);
    public function buildHeader($title);
    public function buildParagraph($type);
    public function getButton();

}

class ErnestButtom implements Builder{
    private $buttonElements = array();
    private $button;

    public function __construct() {
        $this->button = new Button();
    }

    public function buildHeader($title) {
        $this->buttonElements[] = "<h1>$title</h1><br><br>";
        return $this;
    }

    public function buildButton($buttonType) {
        $this->buttonElements[] = "<button type=\"$buttonType\">Random Qoute</button><br><br>";
        return $this;
    }

    public function buildParagraph($buttonName) {
        $this->buttonElements[] = "<p>$buttonName</p>";
        return $this;
    }


    public function getButton(){
        return $this->buttonElements;
    }

}
class Director{
    private $builder;

    public function __construct(Builder $builder) {
        $this->builder = $builder;
        $this->builder->buildButton("");
        $this->builder->buildHeader("");
        $this->builder->buildParagraph("");
    }

    public function getResult() {
        return $this->builder->getButton();
    }
}

$button = new ErnestButtom();
$button->buildHeader("Hello")->buildButton("submit")->buildParagraph("Ernest Button");
$director = new Director($button);
$buttonComplete = array_slice($director->getResult(), 0, 3);
echo implode("\n", $buttonComplete);


