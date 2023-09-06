<!-- LINKING OUR DATABASE TO OUR WEBSITE -->
<!-- MY SQLI IS A LANGUAGE THAT WE ARE USING TO COMMUNICATE WITH OUR DATABASE -->
<?php
    $host="localhost";
    $user="root";
    $password="";
    $dbname="sunshinenews";
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
?>