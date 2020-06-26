<?php
    
include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from customer where customerid='".$id."'"; 
$result = pg_query($query) or die ( pg_last_error());
$row = pg_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> | <a href="insert.php">Insert New Customer</a> | <a href="logout.php">Logout</a></p>
<h1>Update Customer Info</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$name =$_REQUEST['name'];
$phone =$_REQUEST['phone'];
$address =$_REQUEST['address'];
$update="update customer set customername='".$name."', customerphone='".$phone."', customeraddress='".$address."' where customerid='".$id."'";
pg_query($query) or die ( pg_last_error());
$status = "Record Updated Successfully. </br></br><a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="name" placeholder="Enter Name" required value="<?php echo $row['customername'];?>" /></p>
<p><input type="text" name="phone" placeholder="Enter Phone" required value="<?php echo $row['customerphone'];?>" /></p>
<p><input type="text" name="address" placeholder="Enter Address" required value="<?php echo $row['customeraddress'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>

<br /><br /><br /><br />
</div>
</div>
</body>
</html>
