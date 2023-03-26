<?php 
include("index.php"); 

// check if the "proceed to pay" button is clicked
if(isset($_POST['proceed_to_pay'])) {

  // generate a random payment ID
  $payment_id = uniqid();

  // connect to the MySQL database
  $conn = mysqli_connect("localhost", "root", "", "pay");

  // check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // prepare the SQL statement to insert the payment ID into the database
  $stmt = $conn->prepare("INSERT INTO `payments` (`payment_id`) VALUES (?)");

  if($stmt) {
    // bind the parameter and execute the SQL statement
    $stmt->bind_param("s", $payment_id);
    $stmt->execute();

    if($stmt->affected_rows > 0) {
      // close the database connection
      $stmt->close();
      $conn->close();

      // redirect to the payment page with the payment ID
      header("Location: payment.php?payment_id=".$payment_id);
      exit();
    } else {
      // handle the case where no rows were affected
      echo "Error: Payment ID not added to database.";
    }
  } else {
    // handle the case where the statement could not be prepared
    echo "Error: " . $conn->error;
  }
}
?>
