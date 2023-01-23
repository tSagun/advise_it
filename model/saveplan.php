<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once $_SERVER['DOCUMENT_ROOT'] . '/../pdo/config.php';

if ($_POST['planId'])
{
    $planId = $_POST['planId'];
    $date = date("Y-m-d G:i:s");
    $fall = $_POST['fall'];
    $winter = $_POST['winter'];
    $spring = $_POST['spring'];
    $summer = $_POST['summer'];

    $sql = "UPDATE `advising` SET date = :date, fall = :fall, winter = :winter, spring = :spring, summer = :summer WHERE plan_id = :plan_id";
    $statement = $dbh->prepare($sql);
    $statement->bindParam(':plan_id', $planId, PDO::PARAM_STR);
    $statement->bindParam(':date', $date, PDO::PARAM_STR);
    $statement->bindParam(':fall', $fall, PDO::PARAM_STR);
    $statement->bindParam(':winter', $winter, PDO::PARAM_STR);
    $statement->bindParam(':spring', $spring, PDO::PARAM_STR);
    $statement->bindParam(':summer', $summer, PDO::PARAM_STR);
    $statement->execute();

    echo $date;
}

