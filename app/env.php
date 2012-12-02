<?PHP

$env =  json_decode(file_get_contents("/home/dotcloud/environment.json"));
$user = $env->DOTCLOUD_DB_MYSQL_LOGIN;
$password = $env->DOTCLOUD_DB_MYSQL_PASSWORD; 
$host = $env->DOTCLOUD_DB_MYSQL_HOST;
$port = $env->DOTCLOUD_DB_MYSQL_PORT;
$dbname = 'test';


$dbType = 'mysql';   // what driver to use to connect
$dbName = "irememberya";
$dbUser = "root";
$dbPass = "root";
$dbHost = "localhost";

$template_dir = "tpl";

$production = false; 

$path = "";

$API_CONFIG = array(
    'appKey' => 'g_DtCVfd8F0RBKI_sh1jysUeA4Z8MjPNLFYzmENSeNEd7ZjKPDFffLCuiKaaH2W0',
    'appSecret' => '-G9HCdamSgj8FiZVlAZdZMilTBryrtTyhVIgh52enfoLH2qWo9F-UPT2iDAHcOJO',
    'callbackUrl' => NULL
);

$salt = 'lkjlhy5678iuo123';

$domain = 'http://top3skills.com/';
$domainLocal = 'http://localhost/'

?>