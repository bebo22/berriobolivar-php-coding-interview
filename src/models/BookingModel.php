<?php

namespace Src\models;
use Src\controllers\Dog;
use Src\helpers\Helpers;

class BookingModel {

	private $bookingData;
	private $helper;
	private $dogs;

	function __construct() {
		$this->helper = new Helpers();
		$this->dogs = new Dog();
		$string = file_get_contents(dirname(__DIR__) . '/../scripts/bookings.json');
		$this->bookingData = json_decode($string, true);
	}

	public function applyDiscount() {

	}

	public function createBooking($data) {
		$bookings = $this->getBookings();
		// $dogs = $this->dogs->getDogs();

		$data['id'] = end($bookings)['id'] + 1;
		$bookings[] = $data;
		$clientDogs = $this->dogs->getClientDogs($data['clientid']);


		$this->helper->putJson($bookings, 'bookings');

		return $data;
	}

	public function getBookings() {
		return $this->bookingData;
	}
}