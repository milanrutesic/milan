<?php
return array(
    'displayErorrs' => 1,
    //MongoDB connection string
    'mongoDbUri' => "mongodb://alefos:_-wnUFMTtVDq7l88HuAmhI_4X8Z8WKMv@ds037847.mongolab.com:37847/",
    'mongoDbName' => 'alefos_dev',
    //MySQL DB
    'database' => array(
        'adapter' => 'pdo_mysql',
        'params'  => array(
            'host'     => 'localhost',
            'username' => 'alefos',
            'password' => 'abcd',
            'dbname'   => 'alefos'
        )
    ),
    'mainUrl' => 'http://' . $_SERVER['HTTP_HOST'] . '/AlefOS/',
    'rootPath'		=> 'C:/xampp/htdocs/AlefOS/server/'
);
