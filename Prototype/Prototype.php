<?php
class Sheep {
    private $name;
    private $time;
    private $clonedWithDisease;
    
    public function __construct(string $name, ClonedSheep $clonedWithDisease)
    {
        $this->name = $name;
        $this->clonedWithDisease = $clonedWithDisease;
        $this->clonedWithDisease->ClonedSheep($this);
        $this->time = new \DateTime();
    }
    
    public function __clone()
    {
        $this->name = $this->name;
        $this->time = new \DateTime();
    
        $this->clonedWithDisease->ClonedSheep($this);
        $this->clonedWithDisease->sheep = $this;
    }
}
class ClonedSheep{
    public $sheep;
    
    public function __construct(Sheep $sheep)
    {
        $this->sheep = $sheep;
    }
}

function scienceIsCrazy()
{
    $sheep = new Sheep("Dolly", clonedWithDisease);
    $sheep->clonedWithDisease = new ClonedSheep($sheep);
    
    $clone = clone $sheep;
    if ($sheep-> === $clone->name) {
        echo "Primitive field values have been carried over to a clone. Yay!\n";
    } else {
        echo "Primitive field values have not been copied. Booo!\n";
    }
    if ($sheep->component === $clone->component) {
        echo "Simple component has not been cloned. Booo!\n";
    } else {
        echo "Simple component has been cloned. Yay!\n";
    }
    
    if ($sheep->clonedWithDisease === $clone->clonedWithDisease) {
        echo "Component with back reference has not been cloned. Booo!\n";
    } else {
        echo "Component with back reference has been cloned. Yay!\n";
    }
    
    if ($sheep->clonedWithDisease->prototype === $clone->clonedWithDisease->prototype) {
        echo "Component with back reference is linked to original object. Booo!\n";
    } else {
        echo "Component with back reference is linked to the clone. Yay!\n";
    }
}

clientCode();

?>
