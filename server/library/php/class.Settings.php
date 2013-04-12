<?php
// Copyright 2012 AlefOS. All Rights Reserved.

/**
  @fileoverview Every user can change his settings like name, password, language of app...
  
  @author alef@alefos.com (Alef)
 */

class Settings {

	public function getLocaleAction() {
		$return = array(
			'locale' => Alefos::auth()->getIdentity()->locale
		);
		Alefos::printJsonOutput($return);
	}

	public function setLocaleAction() {
		$locale = filter_input(INPUT_GET, 'locale', FILTER_SANITIZE_STRING);
		if('' != $locale) {
		    Alefos::auth()->getIdentity()->locale = $locale;
		}
		$data = array('locale' => $locale);
		Alefos::db()->update('users', $data, 'user_id = ' . Alefos::auth()->getIdentity()->user_id);
		// save in cookie
		setcookie('locale', $locale);
	}

	public function getAccountInfoAction() {
		$query = "SELECT username, name 
				  FROM users 
				  WHERE user_id = " . Alefos::auth()->getIdentity()->user_id;
    	$result = Alefos::db()->fetchRow($query);
    	
    	$return = array(
			'email' => $result['username'],
			'name' => $result['name']
		);
		Alefos::printJsonOutput($return);
	}

	public function setAccountInfoAction() {
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
		$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
		if (!empty($name)) {
			$data = array('name' => $name);
			Alefos::db()->update('users', $data, 'user_id=' . Alefos::auth()->getIdentity()->user_id);
		}
		if (!empty($password)) {
			$data = array('password' => crypt($password, Alefos::config()->cryptSalt));
			Alefos::db()->update('users', $data, 'user_id=' . Alefos::auth()->getIdentity()->user_id);
		}
	}
	
}