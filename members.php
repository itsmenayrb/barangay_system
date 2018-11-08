<!--
  This page will let uses add family members, while
  also letting them see their current family members
-->

<?php include_once 'header.php'; ?>

<div class="container">

<?php
  // Id of the logged in user
  $id = $_SESSION['id'];
  $relationshipsQuery = "SELECT * FROM relationship WHERE fromUser = $id";
  // Get the relationships between the user
  $result = $conn -> query($relationshipsQuery);
  if($conn -> error) {
    echo $conn -> error;
    exit();
  }
  // If no relationships exist so far, find one... JK tell the user that they could
  // add new ones on existing accounts only
  if($result -> num_rows <= 0) {
    echo "<div style='min-height: 100px'>If you have a family member that already has an account, you can add them as your family member.</div>";
  }
  while($row = $result -> fetch_assoc()) {
    $relation_user_ID = $row -> toUser;
    $userDetailsQuery = "SELECT * FROM residents WHERE user_ID = $relation_user_ID";

    $result2 = $conn -> query($userDetailsQuery);
    if($conn -> error) {
      echo $conn -> error;
      exit();
    }
    $relation_user_details = $result2 -> fetch_assoc();
    $firstName = $relation_user_details -> FirstName;
    $relationship = $row -> relation;
    echo "$firstName, $relationship";
  }
?>


  <h4>Add a new family member</h4>
  <form method="POST" action="./includes/add.new.member.request.handler.php">
    <input type="hidden" name="fromUser" value="<?php echo $id; ?>">

    <label for="toUser">ID of the user that you want to add: </label>
    <input type="number" name="toUser" id="toUser">

    <br>
    <label for="relation">What is your relation to the other user?</label>
    <input type="text" name="relation" id="relation">

    <br>

    <input type="submit" value="submit">
  </form>
</div>

<?php include_once 'footer.php'; ?>