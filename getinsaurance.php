<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['order'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
  
      $email = mysqli_real_escape_string($conn, $_POST['email']);
  
    
    $placed_on = date('Y-m-d');

  $cart_total = 0;
    $cart_products[] = '';
   
 $cart_query = mysqli_query($conn, "SELECT * FROM `applyinsaurance` WHERE user_id = '$user_id'") or die('query failed1');
    if(mysqli_num_rows($cart_query) > 0){
        while($cart_item = mysqli_fetch_assoc($cart_query)){
            $cart_products[] = $cart_item['name'];
            $sub_total = ($cart_item['price'] );
            $cart_total += $sub_total;
        }
    }

    $total_products = implode(', ',$cart_products);

    $order_query = mysqli_query($conn, "SELECT * FROM `getinsaurance` WHERE name = '$name' AND email = '$email' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed2');

    if($cart_total == 0){
        $message[] = 'your cart is empty!';
    }elseif(mysqli_num_rows($order_query) > 0){
        $message[] = 'insaurance placed already!';
    }else{
      mysqli_query($conn, "INSERT INTO `getinsaurance`(user_id, name, email, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$email', '$total_products', '$cart_total', '$placed_on')") or die(mysqli_error($conn));
     // Add this line before executing the query
       mysqli_query($conn, "DELETE FROM `applyinsaurance` WHERE user_id = '$user_id'") or die('query failed');
        $message[] = 'insaurance placed successfully! click on pay now to confirm your insaurance plan';

       


    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>checkout order</h3>
    <p> <a href="home.php">home</a> / checkout </p>
</section>

<section class="display-order">
    <?php
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `applyinsaurance` WHERE user_id = '$user_id'") or die('query failed3');
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] );
            $grand_total += $total_price;
    ?>    
    <p> <?php echo $fetch_cart['name'] ?> <span>(<?php echo '$'.$fetch_cart['price'].'/-'  ?>)</span> </p>
    <?php
        }
        }else{
            echo '<p class="empty">your cart is empty</p>';
        }
    ?>
    <div class="grand-total">grand total : <span>$<?php echo $grand_total; ?>/-</span></div>
</section>

<section class="checkout">

    <form action="" method="POST">

        <h3>place your order</h3>

        <div class="flex">
            <div class="inputBox">
                <span>your name :</span>
                <input type="text" name="name" placeholder="enter your name">
            </div>
        
            <div class="inputBox">
                <span>your email :</span>
                <input type="email" name="email" placeholder="enter your email">
            </div>
             <input type="submit" name="order" value="order now" class="btn">
       <a  href="https://buy.stripe.com/test_4gw9DK0nw4Vt5UcbIK" target="_blank"><div class="btn" style="    padding: 3rem 1rem;">pay now</div> </a> 
        <p>"please pay 10 first then click on order now button to conform your order"</p>

    </form>
    <div style="padding-top: 2rem;">
      
         <a href="shop.php" class="option-btn">continue shopping</a>
          <a href="home.php" class="option-btn">back to home</a>
    </div>
 

</section>






<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>