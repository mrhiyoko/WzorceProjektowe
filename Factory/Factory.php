<?php

// Produkty
interface Pizza{
	public function getName();
}
class HawaiianPizza implements Pizza{
	public function getName() {
		return "Hawalian pizza";
	}
}
class DeluxePizza implements Pizza{
	public function getName() {
		return "Deluxe pizza";
	}
}

// Kreator tworzacy obiekt produktu
interface Creator{
	public function create($type);
}
class ConcreteCreator implements Creator{
	public function create($type) {
		switch($type) {
			case 'Hawalian':
				return new HawaiianPizza();
				break;
			case 'Deluxe':
				return new DeluxePizza();
				break;
		}
	}
}

// testy
$creator = new ConcreteCreator();
$prod1 = $creator->create("Hawalian");
$prod2 = $creator->create("Deluxe");
echo $prod1->getName(); // wyswietli "Hawalian pizza"
echo $prod2->getName(); // wyswietli "Deluxe pizza"