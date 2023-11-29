<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}



if(isset($_POST['add_to_cart'])){

  
   $product_name = $_POST['name'];
   $product_price = $_POST['price'];
   $product_image = $_POST['image'];


   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `applyinsaurance` WHERE  user_id = '$user_id'") or die('query failed');
$order_query = mysqli_query($conn, "SELECT * FROM `getinsaurance` WHERE  user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($order_query) > 0){
       $message[] = 'insaurance placed already!';
   }elseif(mysqli_num_rows( $check_cart_numbers) > 0){
        $message[] = 'you select insaurance last time please proceed to check out';
    }else{
           
        mysqli_query($conn, "INSERT INTO `applyinsaurance`(user_id, name, price, image) VALUES('$user_id', '$product_name', '$product_price', '$product_image')") or die('query failed');
       $message[] = 'product added to cart';
       
       }

      


}



?>

<!DOCTYPE html>
<html>
<head>
    
     <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Insaurance</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">
  
</head>
<body>
    <?php @include 'header.php'; ?>  

    <section class="heading">
    <h3>our insaurance</h3>
    <p> <a href="home.php">home</a> / insaurance </p>
</section>
  
  <section class="products">

   <h1 class="title">insaurance</h1>
  
   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `insurance_purchases` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_insurance_purchases = mysqli_fetch_assoc($select_products)){
      ?>
      <form action="" method="POST" class="box">
       
         <div class="price">$<?php echo $fetch_insurance_purchases['price']; ?>/-</div>
         <img style="border-radius: 50%; height: 29rem;"  src="uploaded_img/<?php echo $fetch_insurance_purchases['image']; ?>"  alt="" class="image">
         <div class="name"><?php echo $fetch_insurance_purchases['plan_name']; ?></div>
         <div class="details" style="font-size: 1.5rem; padding: 1rem; border:1px solid black;"><?php echo $fetch_insurance_purchases['details']; ?></div>
        
         <input type="hidden" name="id" value="<?php echo $fetch_insurance_purchases['id']; ?>">
         <input type="hidden" name="name" value="<?php echo $fetch_insurance_purchases['plan_name']; ?>">
         <input type="hidden" name="price" value="<?php echo $fetch_insurance_purchases['price']; ?>">
         <input type="hidden" name="image" value="<?php echo $fetch_insurance_purchases['image']; ?>">
          <input type="submit" value="apply" name="add_to_cart" class="btn">
          
      </form>

      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>

   </div>
   <div class="more-btn"><a href="getinsaurance.php" class="btn">proceed to checkout</a></div>
    

   <div class="more-btn">
      <a href="perchase.php" class="option-btn">load more</a>
   </div>

</section>
  

     <?php @include 'footer.php'; ?>
     

</body>
</html>
