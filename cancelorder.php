<?php

session_start();
require 'includes/config.php';

if(!isset($_SESSION["email"]) & empty($_SESSION["email"])){
    header("Location: login.php?error=mustlogin");
}
$UserID = $_SESSION["uid"];
$fname = $_SESSION["fname"];

if((isset($_GET['orderid']))&(isset($_GET['userid']))&($UserID == $_GET['userid'])){
    $orderid = $_GET['orderid'];
    $cancelsql = "UPDATE Orders SET OrderStatus='Cancelled' WHERE order_id=$orderid" ;
        if($conn->query($cancelsql)){
                echo "Order Cancelled";
                header("Location:./myorders.php?message=cancelled");
                }
                else{
                echo "Error:". $conn->error;
                header("Location:./myorders.php?message=cancelfailed");
        }
   



}else{
    header("Location:./myorders.php?message=accessesdenied");
}


$conn->close();
?>