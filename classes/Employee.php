<?php
class Employee{

    //to get the record of all employee
    public function selectAllEmployees(){
        include "config/db-connect.php";
        $sql="SELECT * FROM employees";
        $stmt=$pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO:: FETCH_ASSOC);
        return $result;
    }

    // get record of all the teachers
    public function getTeachers(){
        include "config/db-connect.php";
        $sql="SELECT age,firstFROM employees WHERE occupation=teachers";
        $stmt=$pdo->prepare($sql);
        $stmt->execute();
        $teacher=$stmt->fetch(PDO::FETCH_ASSOC);
        return $teachers;
    }

    //to count all record of all the gender
    public function recordOfGenders(){
        include "config/db-connect.php";
        $sql="SELECT gender, COUNT(*) FROM employees GROUP BY gender";
        $stmt=$pdo->prepare($sql);
        $stmt->execute();
        $gender=$stmt->fetch(PDO::FETCH_ASSOC);
        return $gender;
    }

    //to check for employees who are married and unmarried
    public function marriedEmployee(){
        include 'config/db-connect.php';
        $sql='SELECT married,COUNT(*) FROM employees GROUP BY married';
        $stmt=$pdo->prepare($sql);
        $stmt->execute();
        $married=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $married;
    }
    //to check occupation of unmarried employee
    public function unmarriedOccupation(){
        include 'config/db-connect.php';
        $sql="SELECT occupation FROM employees WHERE married=0";
        $stmt=$pdo->prepare($sql);
        $stmt->execute();
        $occ_unmarried=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $occ_unmarried;
    }
}
?>