<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
include("auth.php");
?>
<?php
    $pdo = new PDO('pgsql:host=ec2-52-22-216-69.compute-1.amazonaws.com;dbname=dc9864jjr8m47c', 'lxtaqhdibeqfmp', '2f3011ee07231a425d3a0fe5e1e646727d7b2bab6ad2248052be0c592caa9441');
?>
<?php
$sql = "SELECT * FROM customer ORDER BY customerid";
$stmt = $pdo->prepare($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$resultSet = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Customer Info</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Home</a> | <a href="insert.php">Insert New Customer</a> | <a href="logout.php">Logout</a></p>
<h2>View Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
	<th><strong>ID</strong></th>
	<th><strong>Name</strong></th>
	<th><strong>Phone</strong></th>
	<th><strong>Address</strong></th>
	<th><strong>Edit</strong></th>
	<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
	 <?php
             foreach ($resultSet as $row) {
      ?>
   
      <tr>
        <td scope="row"><?php echo $row['customerid'] ?></td>
        <td><?php echo $row['customername'] ?></td>
        <td><?php echo $row['customerphone'] ?></td>
        <td><?php echo $row['customeraddress'] ?></td>     
        <td align="center"><a href="edit.php?id=<?php echo $row["customerid"]; ?>">Edit</a></td>
        <td align="center"><a href="delete.php?id=<?php echo $row["customerid"]; ?>">Delete</a></td>  
      </tr>
     
      <?php
        }
      ?>



</tbody>
</table>

<br /><br /><br /><br />
<a href="https://www.allphptricks.com/insert-view-edit-and-delete-record-from-database-using-php-and-mysqli/">Tutorial Link</a> <br /><br />
For More Web Development Tutorials Visit: <a href="https://www.allphptricks.com/">AllPHPTricks.com</a>
</div>
</body>
</html>
