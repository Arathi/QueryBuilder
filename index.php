<?php
define('BASEPATH', realpath(dirname(__FILE__)).'/');
define('APPPATH', realpath(dirname(__FILE__)).'');
include_once('core/Common.php');
include_once('database/DB.php');
function get_config(){}
function &connectDB($dsn, $query_builder_override = NULL)
{
    $connectedDB =& DB($dsn, $query_builder_override);
    return $connectDB;
}
function &connectMySQL($hostname, $username, $password, $dbname, $port=3306)
{
    $dsn = "mysqli://$username:$password@$hostname:$port/$dbname";
    $connectedDB =& DB($dsn, true);
    return $connectedDB;
}
//function &connectSQLite($filename)
//{
//    $dsn = "sqlite:$filename";
//    $connectedDB =& DB($dsn, true);
//    return $connectedDB;
//}

/* Load database via Database source name, eg. "mysql://root:password@localhost/mydatabase" */
//$db =& connectDB("mysql://root:password@localhost/mydatabase", true);
$db =& connectMySQL("hostname", "username", "password", "dbName");
//---------------------------------------------------------
/* Sample below */
$db->where('fieldName', 'value');
$query = $db->get('tableName');
foreach($query->result_array() as $data)
{
	print_r($data);
}
$query->free_result();
