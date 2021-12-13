<?php
try
{
$mysqlClient = new PDO('mysql:host=localhost;dbname=devops_projet;charset=utf8', 'root', 'wadoud1');
}
catch(Exception $e)
{

die('Erreur : '.$e->getMessage());
}
$sqlQuery = 'SELECT * FROM user';

$usersStatement = $mysqlClient->prepare($sqlQuery);

$usersStatement->execute();

$users = $usersStatement->fetchAll();

foreach ($users as $user) {

<p><?php echo $user['first_name', 'second_name']; ?></p>

}

?>

