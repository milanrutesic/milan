<?php
/*
 * Global access to db, auth, session, config...
 */
 //TODO: Implement singleton here
 
class Alefos {
	
	public static function db() {
		global $db;
		return $db;
	}
	
	public static function auth() {
		global $auth;
		return $auth;
	}
	
	public static function alefosSession() {
		global $alefosSession;
		return $alefosSession;
	}
	
	public static function config() {
		global $config;
		return $config;
	}
	
	public static function numberOfCompanies() {
		global $numberOfCompanies;
		return $numberOfCompanies;
	}

	/**
	This method adds protection of the client code from JSON Vulnerability. 
	A JSON Vulnerability allows third party web-site to turn your JSON resource 
	URL into JSONP request under some conditions. To counter this your server 
	can prefix all JSON requests with following string ")]}',\n". Angular will 
	automatically strip the prefix before processing it as JSON. 	
	 */
	public function printJsonOutput($val, $jsonEncode = true) {
	    //JSON Vulnerability Protection string
	    $jvp = ")]}',\n";
        if (true === $jsonEncode) {
        	echo $jvp . json_encode($val);
        } else {
        	echo $jvp . $val;
        }
		
	}
}
