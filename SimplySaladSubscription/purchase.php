<?php 

session_start();
$con=mysqli_connect("localhost","root","","purchase");

if(mysqli_connect_error()){
  echo"<script>
    alert('cannot connect to database');
    window.location.href='mycart.php';
  </script>";
  exit();
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
  if(isset($_POST['purchase']))
  {
    $query1="INSERT INTO `order_manager`(`Full_Name`, `Phone_No`, `Address`, `Pay_Mode`,`Zipcode`) VALUES ('$_POST[full_name]','$_POST[phone_no]','$_POST[address]','$_POST[pay_mode]','$_POST[zipcode]')";
    try {
      if(mysqli_query($con,$query1))
      {
        $Order_Id=mysqli_insert_id($con);
        $query2="INSERT INTO `user_orders`(`Order_Id`, `Item_Name`, `Price`, `Quantity`) VALUES (?,?,?,?)";
        $stmt=mysqli_prepare($con,$query2);
        if($stmt)
        {
          mysqli_stmt_bind_param($stmt,"isii",$Order_Id,$Item_Name,$Price,$Quantity);
          foreach($_SESSION['cart'] as $key => $values)
          {
            $Item_Name=$values['Item_Name'];
            $Price=$values['Price'];
            $Quantity=$values['Quantity'];
            mysqli_stmt_execute($stmt);
          }
          unset($_SESSION['cart']);
          echo"<script>
            alert('Order Placed');
            window.location.href='index.php';
          </script>";
        }
        else
        {
          throw new Exception("SQL Query Prepare Error");
        }
      }
      else
      {
        throw new Exception("SQL Error");
      }
    } catch (mysqli_sql_exception $e) {
      if(strpos($e->getMessage(), "chk_zipcode") !== false) {
        $message = "Sorry we are not available at your place.";
      } else {
        $message = "There was an error placing your order.";
      }
      echo "<script>alert('$message'); history.go(-1);</script>";
    } catch (Exception $e) {
      $message = "There was an error placing your order.";
      echo "<script>alert('$message'); history.go(-1);</script>";
    }
  }
}

?>
