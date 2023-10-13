<?php

@include 'config.php';

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += ((int)$product_price);
      };
   };

?>

<html lang="en">
<head>
    <title> My Cart </title>
    <link rel="stylesheet" href="css\tour.css">
</head>


<body>

    <div class="main5">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo"> Sri Lanka  </h2>
            </div>

            <div class="menu">
                <ul>
                <li><a href="tour.php">HOME</a></li>
                    <li><a href="wild.php">WILDLIFE</a></li>
                    <li><a href="beach.php">BEACHES</a></li>
                    <li><a href="activity.php">ACTIVITIES</a></li>
                    <li><a href="heritage.php">HERITAGE</a></li>
                    <li><a href="item.php">PURCHASE & DONATE</a></li>

                    <?php
                     $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
                     $row_count = mysqli_num_rows($select_rows);
                     ?>

                    <li><a href="cart.php" class="btn"> Cart <span><?php echo $row_count; ?></span> </a></li>

                </ul>
            </div>

   </div>

</head>
<body>


<div class="container">

<section class="checkout-form">
<br><br><br><br><br><br><br><br><br><br>
   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            $total = ((int)$total += (int)$total_price);
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> Total : <?= $total; ?>/- </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>Your Name</span>
            <input type="text" placeholder="Enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>Address</span>
            <input type="text" placeholder="e.g. Peradeniya Road,Kandy" name="add" required>
         </div>
         <div class="inputBox">
            <span>Country</span>
            <input type="text" placeholder="e.g. Sri Lanka" name="country" required>
         </div>
         <div class="inputBox">
            <span>City</span>
            <input type="text" placeholder="e.g. Kandy" name="city" required>
         </div>
         <div class="inputBox">
            <span>Postal code</span>
            <input type="text" placeholder="e.g. 123456" name="pin_code" required>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="number" placeholder="enter your number" name="number" required>
         </div>
         <div class="inputBox">
            <span>Payment Method</span>
            <select name="method">
               <option value="cash on delivery" selected>Bank Deposit</option>
               <option value="credit cart">Credi/Debit card</option>
            </select>
         </div>  
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>

</body>
</html>