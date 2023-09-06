<?php
include "classes/Employee.php";
$employeeInstance = new Employee();
$employees = $employeeInstance->selectAllEmployees();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.rtl.min.css">
</head>
<body>
  <table class="table">
      <tr>
        <th>id</th>
        <th>FirstName</th>
        <th>lastName</th>
        <th>gender</th>
        <th>age</th>
        <th>occupation</th>
        <th>income</th>
        <th>married</th>
      </tr>
      <?php foreach($employees as $empl){ ?>
      <tr>
        <td><?php echo $empl['id'];?></td>
        <td><?php echo $empl['firstName'];?></td>
        <td><?php echo $empl['lastName'];?></td>
        <td><?php echo $empl['gender'];?></td>
        <td><?php echo $empl['age'];?></td>
        <td><?php echo $empl['occupation'];?></td>
        <td><?php echo $empl['income'];?></td>
        <td><?php echo $empl['married'];?></td>
      </tr>
      <?php
        }
        ?>
  </table>

</body>
</html>