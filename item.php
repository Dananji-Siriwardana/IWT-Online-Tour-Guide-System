<?php

@include 'config.php';


if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
    echo "<script>alert('Product already added to cart')</script>";
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      echo "<script>alert('Product added to cart Successfully')</script>";
      
   }

}

?>
<html lang="en">
<head>
    <title> Purchase and Donate </title>
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
                    <li><a href="admin.php" class="btn">ADD NEW ITEM</a></li>

                </ul>
            </div>

   </div>


<body class="bg">

<div class="content">
            <h1>Purchase <br><span>Care</span> <br>Come Back Next Time</h1>

                <section class="about">
                    <div class="mainx">
                        
                        <div class="about-text">
                            <h2>Why Donate?</h2>
                            
                            <p>We use this donation to to uplift and protect our heritage location and serve better to the upcoming tourist. You coul donate 
                                through the website or buy or merchandise. You’re contributtion could help us a lot</p>
                                <button class="cn"><a href="#">DONATE</a></button>
                     
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>


<div class="container">

<section class="products">


   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['name']; ?></h3>
            <div class="price"><?php echo $fetch_product['price']; ?>/-</div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>