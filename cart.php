<?php
session_start();
require_once('component.php');
$conn=mysqli_connect('localhost','root','root','cart');
$sql="select * from tbl_product";
$results=mysqli_query($conn,$sql);

if(isset($_POST['remove'])){
  if($_GET['action']=='remove'){
    foreach($_SESSION['cart']as $key=>$value){
      if($value['product_id']==$_GET['id']){
        unset($_SESSION['cart'][$key]);
        echo "<script>alert('product has been removed')</script>";
        echo "<script>window.location='cart.php'</script>";
      }
    }
  }
}
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  header('Location: index.php?page=placeorder');
  exit;
}

?>
<html>
<head>
<link rel='stylesheet' type='text/css' href='style.css'>
<link rel="stylesheet" type="text/css"
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body class='bg-light'>
<?php
require_once('header.php');
?>
<div class='container-fluid'>
<div class='row px-5'>
<div class='col-md-7'>
<div class='shopping-cart'>
<h6>My Cart</h6>
<hr>
<?php
$total=0;
if(isset($_SESSION['cart'])){
  $product_id=array_column($_SESSION['cart'],'product_id');
if(mysqli_num_rows($results)>0){
  while($row=mysqli_fetch_assoc($results)){
    foreach($product_id as $id){
      if($row['id']==$id){
        cartElement($row['product_name'],$row['product_price'],$row['product_img'],$row['id']);
        $total=$total+(int)$row['product_price'];
      }
    }
  }
}
}else{
  echo "<h5>cart is empty</h5>";
}
?>
</div>
</div>
<div class='col-md-4 offset-md-1 border rounded mt-5 bg-white h-25'>
<div class='pt-4'>
<h6>PRICE DETAILS</h6>
<hr>
<div class='row price-details'>
<div class='col md-6'>
<?php
if(isset($_SESSION['cart'])){
  $count=count($_SESSION['cart']);
  echo "<h6>price ($count items)</h6>";
}else{
  echo "<h6>price (0 items)</h6>";
}
?>
<h6>Delivery charges</h6>
<hr>
<h6>Amount payable</h6>
</div>
<div class='col md-6'>
<h6>KSH.<?php echo $total;?></h6>
<h6 class='text-success'>FREE</h6>
<hr>
<h6>KSH.<?php echo $total;?></h6>
<form method='post' action='placeorder.php'>
<div class='row'>
<div class="buttons">
            <input type="submit" value="Update" class='btn btn-secondary' name="update">
            <input type="submit" value="Place Order" class='btn btn-secondary' name="placeorder">
</div>
<div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>