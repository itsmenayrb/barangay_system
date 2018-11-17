<?php include 'header.php';?>

<html>
<br>
<h1>Here is the Preview of your Request..</h1>
<div class="container"></div>
<body>
<br>
<?php

if(isset($_POST['forms']))
{
	if($_POST['forms']=='clearance')
	{
	echo '<object data="docs/clearance.php" type="application/pdf" style="width:1000px;height:1000px;">alt : 
				<a href="docs/clearance.php">clearance.php</a></object>';
	}
else if($_POST['forms']=='indigency')
	{
echo '<object data="docs/indigency.php" type="application/pdf" style="width:1100px;height:1000px;">alt : 
				<a href="docs/indigency.php">indigency.php</a></object>';
	}

else if($_POST['forms']=='endorsement')
	{
echo '<object data="docs/endorsement.php" type="application/pdf" style="width:1100px;height:1000px;">alt : 
				<a href="docs/endorsement.php">endorsement.php</a></object>';
}
else if($_POST['forms']=='certification')
	{
echo '<object data="docs/certification.php" type="application/pdf" style="width:1100px;height:1000px;">alt : 
				<a href="docs/certification.php">certification.php</a></object>';
}
else if($_POST['forms']=='business')
	{
echo '<object data="docs/business.php" type="application/pdf" style="width:1100px;height:1000px;">alt : 
				<a href="docs/business.php">business.php</a></object>';
}
}

?>
</body>
</html>