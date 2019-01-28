<?php
use DeepCopy\DeepCopy;

function deep_copy($var)
{
    static $copier = null;

    if (null === $copier) {
        $copier = new DeepCopy(true);
    }

    return $copier->copy($var);
}

abstract class Book {
    protected $title;
    protected $topic;
    abstract function __clone();
    public function getTitle() {
        return $this->title;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function getTopic() {
        return $this->topic;
    }
}

class PHPBook extends Book {
    public function __construct() {
        $this->topic = 'PHP';
    }
    function __clone() {
    }
}

class PythonBook extends Book {
    public function __construct() {
        $this->topic = 'Python';
    }
    function __clone() {
    }
}

//testy
$phpbook1 = new PHPBook();
$phpbook1->setTitle("Ksiazka1");
$phpbook2 = clone $phpbook1;
$phpbook2->setTitle("Ksiazka2");

$pythonbook1 = new PythonBook();
$pythonbook1->setTitle("Ksiazka1");
$pythonbook2 = clone $pythonbook1;
$pythonbook3 = deep_copy($pythonbook1);
//$pythonbook2->setTitle("Ksiazka2");
var_dump(spl_object_hash($pythonbook1));
var_dump(spl_object_hash($pythonbook2));
var_dump(spl_object_hash($pythonbook3));

//echo "Kategoria: ".$phpbook1->getTopic()." Tytul: ".$phpbook1->getTitle()."<br />";
//echo "Kategoria: ".$phpbook2->getTopic()." Tytul: ".$phpbook2->getTitle()."<br />";
//echo "Kategoria: ".$pythonbook1->getTopic()." Tytul: ".$pythonbook1->getTitle()."<br />";
//echo "Kategoria: ".$pythonbook2->getTopic()." Tytul: ".$pythonbook2->getTitle()."<br />";
?>
