<?php

class DataLayer
{
    private $_dbh;

    function construct()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/advise_it/config.php';
        $this->_dbh = $dbh;
        $this->_dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->_dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    function getPlan($plan_id)
    {
        $sql = "SELECT * FROM `advising` WHERE plan_id = :plan_id";
        $statement = $this->_dbh->prepare($sql);
        $statement->bindParam(':plan_id', $plan_id, PDO::PARAM_STR);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    function createPlan($plan_id)
    {
        $sql = "INSERT INTO `advising` (`plan_id`) VALUES (:plan_id)";
        $statement = $this->_dbh->prepare($sql);
        $statement->bindParam(':plan_id', $plan_id, PDO::PARAM_STR);
        $statement->execute();
    }

    function addPlan($plan_id, $fall, $winter, $spring, $summer)
    {

        $sql = "INSERT INTO `advising` (`plan_id`, `fall`, `winter`, `spring`, `summer`) VALUES (:plan_id, :fall, :winter, :spring, :summer)";
        $statement = $this->_dbh->prepare($sql);
        $statement->bindParam(':plan_id', $plan_id, PDO::PARAM_STR);
        $statement->bindParam(':fall', $fall, PDO::PARAM_STR);
        $statement->bindParam(':winter', $winter, PDO::PARAM_STR);
        $statement->bindParam(':spring', $spring, PDO::PARAM_STR);
        $statement->bindParam(':summer', $summer, PDO::PARAM_STR);
        $statement->execute();
    }

    function editPlan($plan_id, $fall, $winter, $spring, $summer)
    {
        if (!$plan_id)
        {
            return false;
        }
        $sql = "UPDATE `advising` SET fall = :fall, winter = :winter, spring = :spring, summer = :summer WHERE plan_id = :plan_id";
        $statement = $this->_dbh->prepare($sql);
        $statement->bindParam(':plan_id', $plan_id, PDO::PARAM_STR);
        $statement->bindParam(':fall', $fall, PDO::PARAM_STR);
        $statement->bindParam(':winter', $winter, PDO::PARAM_STR);
        $statement->bindParam(':spring', $spring, PDO::PARAM_STR);
        $statement->bindParam(':summer', $summer, PDO::PARAM_STR);
        $statement->execute();
    }
}