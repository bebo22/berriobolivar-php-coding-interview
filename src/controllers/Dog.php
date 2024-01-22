<?php

namespace Src\controllers;

use Src\models\DogModel;

class Dog {

	private function getDogModel(): DogModel {
		return new DogModel();
	}

	public function getDogs() {
		return $this->getDogModel()->getDogs();
	}

	public function getClientDogs($clientId) {
		$dogs = $this->getDogs();
		return array_search($clientId, $dogs);
	}

	public function getDogById($id) {
		$dogs = $this->getDogs();
		foreach ($dogs as $dog) {
			if ($dog['id'] == $id) {
				return $dog;
			}
		}
		return null;
	}
}