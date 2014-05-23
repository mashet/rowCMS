<?
require_once('database.php'); //database connection settings
require_once('cms/classes/MysqliDb.php'); //database class
require_once('cms/functions/helper.php'); //sitewide helper functions

//connect to db
$db = new MysqliDb($dbSettings['HN'], $dbSettings['UN'], $dbSettings['PW'], $dbSettings['DB']);
$NavigationLinks = $db->get('cmsNavigationLinks'); //contains an array of all users

p($NavigationLinks[0]['LinkTitle']);

/*echo "<pre>";
print_r($NavigationLinks);
echo "</pre>";*/
?>