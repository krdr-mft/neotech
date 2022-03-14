<?php
ini_set('max_execution_time', '300');
require_once 'vendor/autoload.php';

/* Database connection configuration */
$mysqlHost      = 'localhost';
$mysqlDatabase  = 'test';
$mysqlUser      = 'dragankrstic';
$mysqlPassword  = '';

/* Connecting and filling Db with fake data */
try 
{

    $pdo = new PDO('mysql:host='.$mysqlHost.';dbname='.$mysqlDatabase, $mysqlUser,'');
    echo 'Connection established<br>';
}
catch (PDOException $e)
{
    echo 'Conneciton failure<br>';
    die;
}

$insertSql = "INSERT INTO posts SET title = :title, body = :body";
$sqlPrepare = $pdo->prepare($insertSql);

$faker = Faker\Factory::create();

try
{
    $i = 0;
    while($i < 100000)
    {
        $i++;
        $sqlPrepare->bindValue(':title',$faker->sentence());
        $sqlPrepare->bindValue(':body', $faker->text(500));

        $sqlPrepare->execute();        
    }

    echo "Finished!";
}
catch (PDOException $e)
{
    echo 'Error occured: '.$e->message();
}