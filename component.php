<?php
function component($productname,$productprice,$productimage,$productid){
    $element="
    <div class='col-md-3 col-sm-6 my-3 my-md-0'>
    <form method='post' action='index.php'>
    <div class='card-shadow'>
    <div>
    <img src='$productimage' alt='image1' class='img-fluid card-img-top'>
    </div>
    <div class='card-body'>
    <h5 class='card-title'>$productname</h5>
    <h6>
    <i class='fas fa-star'></i>
    <i class='fas fa-star'></i> 
    <i class='fas fa-star'></i>
    <i class='fas fa-star'></i>
    <i class='far fa-star'></i>
    </h6>
    <p class='card-text'>some quick example text to build on the card</p>
    <h5>
    <small><s class='text-secondary'>1500</s></small>
    <span>$productprice</span>
    </h5>
    <button type='submit' name='add' class='btn btn-warning my-3'>add to cart</button>
    <input type='hidden' name='product_id' value='$productid'>
    
    </div>
    </div>
    </form>
    </div>
    ";
    echo $element;
}

function cartElement($productname,$productprice,$productimg,$productid){
    $element="
<form action='cart.php?action=remove&id=$productid' method='post' class='cart-items'>
<div class='row bg-white'>
<div class='col-md-3'>
<img scr='$productimg' alt='product1' class='img-fluid' >
</div>
<div class='col-md-6'>
<h5 class='pt-2'>$productname</h5>
<small class='text-secondary'>Seller:daily tuition</small>
<h5 class='pt-2'>$productprice</h5>
<button type='submit' class='btn btn-warning'>save for later</button>
<button type='sumbit' class='btn btn-danger mx-2' name='remove'>remove</button>
</div>
<div class='col-md-3'>
<div>
<button type='button' class='btn bg-light border rounded-circle'><i class='fas fa-minus'></i></button>
<input type='text' value='1' class='form-control w-25 d-inline'>
<button type='button' class='btn bg-light border rounded-circle'><i class='fas fa-plus'></i></button>

</div>
</div>
</div>
</div>
<div class='paypal'>
    <button type='submit' name='paypal'><img src='https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png' border='0' alt='PayPal Logo'></button>
</div>
</form>

    ";
    echo $element;
}

?>
