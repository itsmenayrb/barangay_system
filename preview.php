<?php include 'header.php';?>
<?php include 'includes/dbh.inc.php';?>

<?php 
if (isset($_POST['signup'])){
            $contactnumber= $_POST['contactnumber'];
            $purpose = $_POST['purpose'];
            $username = $_POST['username'];
            $query = "INSERT INTO `user_requests` (`id`, `username`,`contactnumber,`purpose) VALUES (NULL,'$username', $contactnumber','$purpose')";
            if(performQuery($query)){
                echo "Your account request is now pending for approval. Please wait for confirmation. Thank you.";
            }else{
                echo "Unknown error occured.";
            }
}
?>
<html>
<br>
<a href="profile.php"><font size="4">Back</a>
<br>
<a href="index.php">Home</font></a>
<br>
<h1>Here is the Preview of your Request</h1>
<body>
            <table style="position: absolute;top: 400px;left: 1010px;">
            <tr>
            <td class='alert-success'><b><font size="6">Please fill this up to proceed</b>
            </td>
            </tr>
            <tr>
            <td class='alert-success'>User name :
            <input name="username"type="text" placeholder="User name" required>
            </td>
            </tr>
            <tr>
            <td class='alert-success'>Contact No. :
            <input name="contactnumber"type="text" placeholder="Contact No." required>
            </td>
            </tr>
            <tr>
            <td class='alert-success'><b>And Lastly, the PURPOSE of request</b>
            </td>
            </tr>
            <tr>
            <td class='alert-success'>Purpose :<br>
            <textarea name="purpose" style="width:400px;height:150px;" placeholder="e.g. Financial Assistance" required></textarea>
            </font>
            </td>
            </tr>
            </table>

            <table border='1'style="position: absolute;top: 800px;left: 1010px;">
            <tr>
            <td class='alert-success'><font size="4"><b>NOTICE TO PUBLIC:</b></font></td>
            </tr>
            <tr>
            <td class='alert-success'><font size="4">
                The following are <u><b>REQUIREMENTS</b></u> to <u><b>CLAIM</b></u> the <u><b>FORMS</b></u><br>
                If failed to comply the said <u><b>REQUIREMENTS</b></u>claiming will <br>not be possible.</font>
            </td>
            </tr>
            <tr>
            <td>
            For <b>BARANGAY CLEARANCE</b>
            </td>
            </tr>
            <tr><td>PLEASE bring : <br><b>NSO BIRTH CERTIFICATE (Original and 1 Photo copy)<br>Land Title (Photo copy )only if not a bona fide resident</b></td></tr><br>
            <tr>
            <td>
            For <b>INDIGENCY CERTIFICATE</b>    
            </td>
            </tr>
            <tr><td>PLEASE bring : <br><b>NSO BIRTH CERTIFICATE (Original and 1 Photo copy)<br>DSWD Indigency Card (Original and Photo copy)<br>or Parent's Pay slip</b></td></tr><br>
            <tr>
            <td>
            For <b>BARANGAY ENDORSEMENT</b>    
            </td>
            </tr>
            <tr><td>You MUST bring : <br><b>NSO BIRTH CERTIFICATE (Original and 1 Photo copy)<br>Photocopy of School REGISTRATION FORM<br>Photocopy of School ASSESSMENT FORM or EVALUATION FORM</b></td></tr><br>
            <tr>
            <td>
            For <b>BARANGAY CERTIFICATE</b>
            </td>
            </tr>
            <tr><td>PLEASE bring : <br><b>NSO BIRTH CERTIFICATE (Original and 1 Photo copy)<br>Land Title (Photo copy)only if not a bona fide resident</b></td></tr><br>
             <tr>
            <td>
            For <b>BUSINESS CLEARANCE</b>
            </td>
            </tr>
            <tr><td>PLEASE bring : <br><b>NSO BIRTH CERTIFICATE (Original and 1 Photo copy)<br>Land Title (Photo copy)</b></td></tr><br>
            <tr>

            </table>
<button name="signup" style="position:absolute; TOP:730px; LEFT:1300px; width:150px; height:50px; class="btn btn-lg btn-primary btn-block" type="submit" onclick="alertFunction()">Request</button>
<br>
<script>
function alertFunction() {
    alert("The request will take several hours to process. We ask for your patience. Thank you!");
}
</script>
<?php

if(isset($_POST['forms']))
{
	if($_POST['forms']=='clearance')//barangay clearance
	{
	echo '<object data="docs/clearance.php" type="application/pdf" style="position:absolute; top:400px;width:1000px;height:1000px;">alt : 
				<a href="docs/clearance.php">clearance.php</a></object>';

	}
else if($_POST['forms']=='indigency')//indigency cert
	{
echo '<object data="docs/indigency.php" type="application/pdf" style="position:absolute; top:400px;width:1100px;height:1000px;">alt : 
				<a href="docs/indigency.php">indigency.php</a></object>';
	}

else if($_POST['forms']=='endorsement')//endorsement cert
	{
echo '<object data="docs/endorsement.php" type="application/pdf" style="position:absolute; top:400px;width:1100px;height:1000px;">alt : 
				<a href="docs/endorsement.php">endorsement.php</a></object>';
}
else if($_POST['forms']=='certification')//barangay cert
	{
echo '<object data="docs/certification.php" type="application/pdf" style="position:absolute; top:400px;width:1100px;height:1000px;">alt : 
				<a href="docs/certification.php">certification.php</a></object>';
}
else if($_POST['forms']=='business')//business clearance
	{
echo '<object data="docs/business.php" type="application/pdf" style="position:absolute; top:400px;width:1100px;height:1000px;">alt : 
				<a href="docs/business.php">business.php</a></object>';
}
else{
    echo '<font size="10">There is nothing to display';
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