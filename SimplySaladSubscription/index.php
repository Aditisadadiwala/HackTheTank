<?php include("header.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="icon" type="image/x-icon" href="favicon.ico"/>
  <link rel="stylesheet" href="style.css">
  

</head>
<body>


  <div class="container mt-5">
    <br><br>
    <div class="row justify-content-center">
      
    <div class="main_h">
    <h1>Subscriptions</h1>
    </div>
  

      <div class="col-lg-4 col-md-6 mb-4 " >
        <form action="manage_cart.php" method="POST">
          <div class="card" >
            <img src="6.jpg" class="card-img-top">
            <div class="card-body text-center">
              <h5 class="card-title">WEEKLY LUNCH</h5>
              <p class="card-text">Rs 200/- per Lunch</p>
              <button type="submit" name="Add_To_Cart" class="btn btn-info btn_col">Add To Cart</button>
              <input type="hidden" name="Item_Name" value="WEEKLY LUNCH">
              <input type="hidden" name="Price" value="200">
            </div>
          </div>
        </form>
      </div>

      <div class="col-lg-4 col-md-6 mb-4">
        <form action="manage_cart.php" method="POST">
          <div class="card ">
            <img src="7.jpg" class="card-img-top">
            <div class="card-body text-center">
              <h5 class="card-title">MONTHLY LUNCH</h5>
              <p class="card-text">Rs. 180/- per Lunch</p>
              <button type="submit"  name="Add_To_Cart" class="btn btn-info btn_col">Add To Cart</button>
              <input type="hidden" name="Item_Name" value="MONTHLY LUNCH">
              <input type="hidden" name="Price" value="180">
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>

  <div class="foot" style="position: relative; justify-content: center">
      <a href="https://www.instagram.com/thesimplysalad/?hl=en">
        <img src="instagram.png" alt="" class="ficon" />
      </a>
      <a
        href="https://www.google.com/search?q=simply+salad&oq=simply+salad&aqs=chrome..69i57j35i39j0i67i650l2j46i67i199i465i650j69i60l3.2217j0j4&sourceid=chrome&ie=UTF-8"
      >
        <img src="search.png" alt="" class="ficon" />
      </a>
      <a
        href="https://www.google.com/maps/dir/21.1612892,72.792461/simply+salad/@22.0937522,71.7716178,8z"
      >
        <img src="location.png" alt="" class="ficon" />
      </a>
    </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
