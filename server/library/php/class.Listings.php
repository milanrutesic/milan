<?php

class Listings {
	
	public function defaultAction() {
			
		$method = strtolower($_SERVER['REQUEST_METHOD']);
		// Call appropriate action depending on request method
		if('get' == $method){
			self::getAction();			
		} elseif ('post' == $method){
			self::postAction();		
		} elseif('put' == $method){
			self::putAction();
		} elseif('delete' == $method) {
			self::deleteAction();
		} else {
			self::getAction();
		}
	}

	private function getAction(){
	    $crud = new Crud();
        $listings = $crud->retrieve('residentials');
        echo $listings;
	}

    private function postAction() {
        echo "Post executed";
    }

    private function putAction() {
        echo "Put executed";
    }

    private function deleteAction() {
        echo "Delete executed";
    }
}
