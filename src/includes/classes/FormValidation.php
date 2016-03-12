<?php

class FormValidation {

	private $_data;
	private $_error = array();

	public function set($value, $name) {
		$this->_data = array('value' => trim($value), 'name' => $name);

		return $this;
	}

	public function required() {
		if (empty($this->_data['value'])) {
			$this->_error[] = sprintf("The field %s is required.", $this->_data['name']);
		}

		return $this;
	}

	public function email() {
		if (!filter_var($this->_data['value'], FILTER_VALIDATE_EMAIL)) {
			$this->_error[] = sprintf("The field %s is not a valid Email!", $this->_data['name']);
		}

		return $this;
	}

	public function date() {
		if (!preg_match("/^[0-9]{2}\-[0-9]{2}\-[0-9]{4}$/", $this->_data['value'])) {
			$this->_error[] = sprintf("The field %s is not a valid type date!", $this->_data['name']);
		}

		return $this;
	}

	public function telephone() {
		//000-0000-0000
		if (!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $this->_data['value'])) {
			$this->_error[] = sprintf("The field %s is not a valid number telephone!", $this->_data['name']);
		}

		return $this;
	}

	public function cellphone() {
		//000-00000-0000
		if (!preg_match("/^[0-9]{3}-[0-9]{5}-[0-9]{4}$/", $this->_data['value'])) {
			$this->_error[] = sprintf("The field %s is not a valid number cell phone!", $this->_data['name']);
		}

		return $this;
	}

	public function validate() {
		if (count($this->_error) > 0) {
			return false;
		} else {
			return true;
		}
	}

	public function getErrors() {
		return $this->_error;
	}
}