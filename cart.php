<?php

@include 'config.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
}

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

<section class="shopping-cart">
<br><br><br><br><br><br><br><br><br><br>
   <h1 class="heading">shopping cart</h1>

   <table>

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $grand_total = 0;
      
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
               $product_name[] = $fetch_cart['name'] .' ('. $fetch_cart['quantity'] .') ';
               $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']);  
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td><?php echo number_format($fetch_cart['price']); ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
            <td><?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']);?>/-</td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
         $grand_total += ((int)$sub_total);  
         };
         };
        

?>
       
         <tr class="table-bottom">
            <td><a href="products.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3">Total</td>
            <td><?php echo $grand_total; ?>/-</td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">procced to checkout</a>
   </div>

</section>

</div>
   
</body>
</html>



