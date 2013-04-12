<?php

function __autoload($className) {
    require_once('library/php/class.' . $className . '.php');
}