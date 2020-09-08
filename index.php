<?php
session_start();
require_once('component.php');
$conn=mysqli_connect('localhost','root','root','cart');
if(isset($_POST['add'])){
  //print_r($_POST['product_id']);
  if(isset($_SESSION['cart'])){
    $item_array_id=array_column($_SESSION['cart'],'product_id');
    //print_r($item_array_id);
     //print_r($_SESSION['cart']);
     if(in_array($_POST['product_id'],$item_array_id)){
       echo "<script>alert('product is already added in the cart...!')</script>";
       echo "<script>window.location='index.php'</script>";
     }else{
       $count=count($_SESSION['cart']);
       $item_array=array(
         'product_id'=>$_POST['product_id']
       );
       $_SESSION['cart'][$count]=$item_array;
       //print_r($_SESSION['cart']);

     }
  }else{
    $item_array=array(
      'product_id'=>$_POST['product_id']
    );
    //create a session variable
    $_SESSION['cart'][0]=$item_array;
    //print_r($_SESSION['cart']);
  }
}


?>

<html>
<head>
<title>shopping_cart</title>
<meta name='viewport' content='width=device-width initial-scale=1'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<?php require_once('header.php');?>
<div class='container'>
<div class='row text-center py-5'>
<?php
$sql="select * from tbl_product";
$results=mysqli_query($conn,$sql);
if(mysqli_num_rows($results)>0){
  while($row=mysqli_fetch_assoc($results)){
    component($row['product_name'],$row['product_price'],$row['product_image'],$row['id']);
  }
}
?>

</div>
</div>



</body>
</html>