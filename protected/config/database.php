<?php

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	'connectionString' => 'mysql:host=localhost;dbname=test',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => 'nafaha3H',
	'charset' => 'utf8',
	'tablePrefix' => 'y_', //数据表前缀
);