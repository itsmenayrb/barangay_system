<?php include 'header.php';?>
<?php include 'includes/dbh.inc.php';?>
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

			echo	'<button name="signup" class="btn btn-lg btn-primary btn-block" type="submit">Request</button>';
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
<!---php fx to connect db-->
<?php
    
    define('DBINFO','mysql:host='.$dbServername.';dbname='.$dbName);
    define('DBUSER',$dbUsername);
    define('DBPASS',$dbPassword);
    function performQuery($query){
        $con = new PDO(DBINFO,DBUSER,DBPASS);
        $stmt = $conn->prepare($query);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    function fetchAll($query){
        $conn = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->query($query);
        return $stmt->fetchAll();
    }

?>
<!----endphpfx-->
</body>
</html>