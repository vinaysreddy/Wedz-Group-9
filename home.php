<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_wishlist'])){

   $product_id = $_POST['product_id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];

   
   $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_wishlist_numbers) > 0){
       $message[] = 'already added to wishlist';
   }elseif(mysqli_num_rows($check_cart_numbers) > 0){
       $message[] = 'already added to cart';
   }else{
       mysqli_query($conn, "INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_image')") or die('query failed');
       $message[] = 'product added to wishlist';
   }

}

if(isset($_POST['add_to_cart'])){

   $product_id = $_POST['product_id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
       $message[] = 'already added to cart';
   }else{

       $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

       if(mysqli_num_rows($check_wishlist_numbers) > 0){
           mysqli_query($conn, "DELETE FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
       }

       mysqli_query($conn, "INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
       $message[] = 'product added to cart';
   }

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">
<style type="text/css">.wrapper{
  max-width: 1090px;
  width: 100%;
  margin: auto;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
.wrapper .table{
  background: #fff;
  width: calc(33% - 20px);
  padding: 30px 30px;
  position: relative;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}
.table .price-section{
  display: flex;
  justify-content: center;
}
.table .price-area{
  height: 120px;
  width: 120px;
  border-radius: 50%;
  padding: 2px;
}
.price-area .inner-area{
  height: 100%;
  width: 100%;
  border-radius: 50%;
  border: 3px solid #fff;
  line-height: 117px;
  text-align: center;
  color: #fff;
  position: relative;
}
.price-area .inner-area .text{
  font-size: 25px;
  font-weight: 400;
  position: absolute;
  top: -10px;
  left: 17px;
}
.price-area .inner-area .price{
  font-size: 45px;
  font-weight: 500;
  margin-left: 16px;
}
.table .package-name{
  width: 100%;
  height: 2px;
  margin: 35px 0;
  position: relative;
}
.table .package-name::before{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 25px;
  font-weight: 500;
  background: #fff;
  padding: 0 15px;
  transform: translate(-50%, -50%);
}
.table .features li{
  margin-bottom: 15px;
  list-style: none;
  display: flex;
  justify-content: space-between;
}
.features li .list-name{
  font-size: 17px;
  font-weight: 400;
}
.features li .icon{
  font-size: 15px;
}
.features li .icon.check{
  color: #2db94d;
}
.features li .icon.cross{
  color: #cd3241;
}
.table .btn{
  width: 100%;
  display: flex;
  margin-top: 35px;
  justify-content: center;
}
.table .btn button{
  width: 80%;
  height: 50px;
  color: #fff;
  font-size: 20px;
  font-weight: 500;
  border: none;
  outline: none;
  border-radius: 25px;
  cursor: pointer;
  transition: all 0.3s ease;
}
.table .btn button:hover{
  border-radius: 5px;
}
.basic .features li::selection{
  background: #ffd861;
}
.basic ::selection,
.basic .price-area,
.basic .inner-area{
  background: #ffd861;
}
.basic .btn button{
  border: 2px solid #ffd861;
  background: #fff;
  color: #ffd861;
}
.basic .btn button:hover{
  background: #ffd861;
  color: #fff;
}
.premium ::selection,
.premium .price-area,
.premium .inner-area,
.premium .btn button{
  background: #a26bfa;
}
.premium .btn button:hover{
  background: #833af8;
}
.ultimate ::selection,
.ultimate .price-area,
.ultimate .inner-area{
  background: #43ef8b;
}
.ultimate .btn button{
  border: 2px solid #43ef8b;
  color: #43ef8b;
  background: #fff;
}
.ultimate .btn button:hover{
  background: #43ef8b;
  color: #fff;
}
.basic .package-name{
  background: #ffecb3;
}
.premium .package-name{
  background: #d0b3ff;
}
.ultimate .package-name{
  background: #baf8d4;
}
.basic .package-name::before{
  content: "Basic";
}
.premium .package-name::before{
  content: "Premium";
  font-size: 24px;
}
.ultimate .package-name::before{
  content: "Ultimate";
  font-size: 24px;
}
@media (max-width: 1020px) {
  .wrapper .table{
    width: calc(50% - 20px);
    margin-bottom: 40px;
  }
}
@media (max-width: 698px) {
  .wrapper .table{
    width: 100%;
  }
}
::selection{
  color: #fff;
}
.table .ribbon{
  width: 150px;
  height: 150px;
  position: absolute;
  top: -10px;
  left: -10px;
  overflow: hidden;
}
.table .ribbon::before,
.table .ribbon::after{
  position: absolute;
  content: "";
  z-index: -1;
  display: block;
  border: 7px solid #4606ac;
  border-top-color: transparent;
  border-left-color: transparent;
}
.table .ribbon::before{
  top: 0px;
  right: 15px;
}
.table .ribbon::after{
  bottom: 15px;
  left: 0px;
}
.table .ribbon span{
  position: absolute;
  top: 30px;
  right: 0;
  transform: rotate(-45deg);
  width: 200px;
  background: #a26bfa;
  padding: 10px 0;
  color: #fff;
  text-align: center;
  font-size: 17px;
  text-transform: uppercase;
  box-shadow: 0 5px 10px rgba(0,0,0,0.12);
}
</style>
</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="home">

   <div class="content">
      <h3>new collections</h3>
      <p><?php @include 'user_page2.php'; ?></p>
      <a href="about.php" class="btn">discover more</a>
   </div>

</section>


<section class="products">

   <h1 class="title">latest products</h1>
  
   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <form action="" method="POST" class="box">
         <a href="view_page.php?pid=<?php echo $fetch_products['id']; ?>" class="fas fa-eye"></a>
         <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
         <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="" class="image">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <input type="number" name="product_quantity" value="1" min="0" class="qty">
         <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
         <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
         <input type="submit" value="add to wishlist" name="add_to_wishlist" class="option-btn">
         <input type="submit" value="add to cart" name="add_to_cart" class="btn">
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>

   </div>

   <div class="more-btn">
      <a href="shop.php" class="option-btn">load more</a>
   </div>

</section>



<section class="home-contact">

   <div class="content">
      <h3>invitation to your guests</h3>
      <p>"Join us in celebrating love and joy as we cordially invite you to share in the magic of our special day. Your presence is requested to witness the union of couple"</p>
      <a href="mailto:?&subject= invitation of wedding&body=Hi,I found this website and thought you might like it http://www.geocities.com/wowhtml/" class="btn">invite guest</a>
   </div>

</section>


 
  
  <?php @include 'footer.php'; ?>



<script src="js/script.js"></script>

</body>
</html>