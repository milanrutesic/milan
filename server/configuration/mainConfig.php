<?php
$services_json = json_decode(getenv("VCAP_SERVICES"),true);
$mysql_config = $services_json["mysql-5.1"][0]["credentials"];

return array(
    'displayErorrs' => 0,
    'cryptSalt' => '$2a$07$R.jksueIkedMu8uw873iie746.HGT7283764a',
    'locale' => 'en_US',
    //MongoDB connection string
    'mongoDbUri' => "mongodb://alefos:_-wnUFMTtVDq7l88HuAmhI_4X8Z8WKMv@ds037847.mongolab.com:37847/",
    'mongoDbName' => 'alefos',
	//MySQL DB
	'database' => array(
        'adapter' => 'pdo_mysql',
        'params'  => array(
            'host'     => $mysql_config["hostname"],
            'username' => $mysql_config["username"],
            'password' => $mysql_config["password"], 
            'dbname'   => $mysql_config["name"],
            'port'     => $mysql_config["port"]
        )
    ),
    'mainUrl' 		=> 'http://' . $_SERVER['HTTP_HOST'] . '/',
    'rootPath'		=> '/var/www/alefos.com/httpdocs/',
    'imageOriginalPath' => 'files/images/originals/',
    'imageThumbPath' => 'files/images/thumbs/',
    
    // session
    'sessionDbTable' => array(
        'name'              => 'session',
        'primary'           => array(
            'session_id',
            'session_name'
        ),
        'primaryAssignment' => array(
            'sessionId',
            'sessionName'
        ),
        'modifiedColumn'    => 'modified',
        'dataColumn'        => 'session_data',
        'lifetimeColumn'    => 'lifetime',
        'lifetime'          => 86400,
        'overrideLifetime'  => true
    ),
    'sessionName' => 'ALEFOSABSESSID',
    'sessionNs' => 'alefos.com',
    
    //Email
    'emailEnabled'  => false,
    'fromEmail'		=> 'miljan@putuy.com',
    'fromEmailSender'=> 'Putuy Team',
    'smtpServer'	=> 'mail.xorstudio.net',
    'smtpAuth'		=> array(
    		//'ssl' => 'tls',
            //'port' => '2525',
    		'auth' => 'login',
            'username' => '',
            'password' => ''),
    
    //Pagination
    'numberOfItemsPerPage' => 10,
    'numberOfPaginationLinks' => 6,
    //Default theme
	'defaultTheme'		=> 'hot-sneaks',
    
    //PayPal - Live
    'returnUrl' => 'payments/OrderConfirm/',
    'cancelUrl' => 'payments/OrderCancel',
    'myApiUsername' => 'test.s_1242479445_biz_api1.xorstudio.com',//'miljan.vranic_api1.gmail.com',
	'myApiPassword' => '1242479459',//'WPNELPKF7J82235F',
	'myApiSignature' => 'AYSkW3Zvlkm8YbpJ9qw8E.M3XbkeAwfx2j60ue4MTuIZXiVB13YGJlI6',//'AQoe6ZiLJAF.UeJfaZ90PJ61vJYYA6ocCOtEY.uuA78wXvXtWQ3CYrNQ',
    'sandboxFlag'	=> true,
    
    //Currencies supported
    'supportedCurrencies' => array(
    	'USD', 'EUR', 'CHF', 'GBP', 'RSD', 'RUB'
    )
);