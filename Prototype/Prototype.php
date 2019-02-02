<?php
class Sheep {
    public $name;
    public $time;
    public $clonedWithDisease;


//    public function __clone()
//    {
//        $this->time = clone $this->time;
//        $this->clonedWithDisease = clone $this->clonedWithDisease;
//        $this->clonedWithDisease->sheep = $this;
//    }
}
class ClonedSheep{
    public $dolly;

    public function __construct(Sheep $dolly)
    {
        $this->dolly = $dolly;
    }
}

function scienceIsCrazy()
{
    $sheep = new Sheep;
    $sheep->name = 'Dolly';
    $sheep->time = new \DateTime;
    $sheep->clonedWithDisease = new ClonedSheep($sheep);

    $sheep2 = clone $sheep;
    if ($sheep->name === $sheep2->name) {
        echo "String cloned!\n";
    } else {
        echo "String cloning failed!\n";
    }
    if ($sheep->time === $sheep2->time) {
        echo "Time object has not been cloned!\n";
    } else {
        echo "Time object has been cloned!!\n";
    }

    if ($sheep->clonedWithDisease === $sheep2->clonedWithDisease) {
        echo "Cloning process failed!\n";
    } else {
        echo "Cloning object with references complete!\n";
    }
}

scienceIsCrazy();

?>
