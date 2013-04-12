<?php

class Loadjs {
	const JS_CONTROLLERS_LOCATION = '../js/controllers/';
    
	public function defaultAction() {
	    $collectJs = '';
        $dir = opendir(self::JS_CONTROLLERS_LOCATION);
        while ($file = readdir($dir)) {
            if ('.' != $file && '..' != $file) {
                $fp = fopen(self::JS_CONTROLLERS_LOCATION.$file, 'r');
                $collectJs .= fread($fp, filesize(self::JS_CONTROLLERS_LOCATION.$file));
                fclose($fp);
            }
        }
        closedir($dir);
        header("content-type: application/javascript");
        echo $collectJs;
	}
}
