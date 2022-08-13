<?php
include_once ('../settings/dbconfig.php');
if(isset($_GET['productId']) && isset($_GET["cartId"])){
    $product_id = $_GET["productId"];
    $cart_id = $_GET["cartId"];
}
else{
    die();
}
try{
    $product_id = intval($product_id);
    $cart_id=intval($cart_id);
    if( $product_id==0 or $cart_id==0 ){
        throw new Exception("error");
    }
}
catch(Exception $ex){
    echo $ex->getMessage();
    die();
}
$insert= "INSERT INTO `cart_product` (`product_id`, `cart_id`) VALUES ($product_id, $cart_id)";
$result =  mysqli_query($db_connection,$insert);
if(!$result){
    echo "Error While Inserting into db";
    die();
}
?>