
<?php
include_once 'logHeader.php';

?>


<?php



require 'includes/config.php';
require 'includes/function.php';

if(!isset($_SESSION["email"]) & empty($_SESSION["email"])){
    header("Location: login.php?error=mustlogin");
}

$UserID = $_SESSION["uid"];
$fname = $_SESSION["fname"];


if((isset($_GET['servicename']))&(isset($_GET['userid']))&(isset($_GET['cartid']))&($UserID == $_GET['userid'])){
    $pid = $_GET['servicename'];
    $cid = $_GET['cartid'];

    $checkoutsql = "SELECT * from cart WHERE id = '$cid' AND user_id = '$UserID'";

    $checkoutresult = $conn->query($checkoutsql);

    
    if ($checkoutresult->num_rows> 0)
    {
        while($row = $checkoutresult->fetch_assoc())
        {
            $orderdet[]=$row;
            
        }
    }
    else
    {
    echo "Product Not Found";
    header("Location:./mycart.php?message=productnotfound");
    } 



?>



<?php

        $sql = "Select * from user_details where user_id = $UserID " ;
        $result = $conn->query($sql) ;

        if($result->num_rows > 0){

                while($row = $result->fetch_assoc()){
                    $profile = array();
                    $profile["UserID"] = $row["user_id"];
                    $profile["FirstName"] = $row["fname"];
                    $profile["LastName"] = $row["lname"];
                    $profile["Phone"] = $row["phone_No"];
                    $profile["Address"] = $row["address"];
                    $profile["City"] = $row["city"];
                    $profile["PostalCode"] = $row["postalcode"];
                    
                }

        }else {
                echo "empty table";
        }

        

?>


<?php foreach ($orderdet as $orderdet):


$serviceName = $orderdet["serviceName"];
$totamount = $orderdet["Price"];



endforeach;?>


<link rel="stylesheet" href="./style/checkout.css">


<div class="checkout-section">
                <center><h2 class="cate-h" style="font-size: 30px;">CHECKOUT</h2></center>
                <hr>
                <div class="category-column">
                    
                        <img src="./images/checkout/cart-s.png"
                            alt="Category 1">
                        <h2>Cart</h2>
                   
                </div>
                <div class="category-column">
                    
                        <img src="./images/checkout/checkout.png"
                            alt="Category 2">
                        <h2>Checkout</h2>
                    
                </div>
                <div class="category-column ">
                    
                        <img src="./images/checkout/payment.png" alt="Category 3">
                        <h2>Payment</h2>
                </div>
            </div>

            
            <div class="my-details">

                        <h2 class= "billing">Billing  Details</h2>

                        <div class="detail-container">
                            
                            <p><img src="./images/userprofile/icons/user-solid (1) 1.png" style="margin-right: 10px;"><strong>User ID:<?php echo " ".$profile["UserID"];?></strong></p>
                            <p><img src="./images/userprofile/icons/user-solid (1) 1.png" style="margin-right: 10px;"><strong>Name: <?php echo " ".$profile["FirstName"]." ".$profile["LastName"];?> </strong></p>
                            <p><img src="./images/userprofile/icons/phone-solid 1.png" style="margin-right: 10px;"><strong>Phone:<?php echo " ".$profile["Phone"];?> </strong></p>
                            <p><img src="./images/userprofile/icons/house-solid 1.png" style="margin-right: 10px;"><strong>Address: <?php echo " ".$profile["Address"];?> </strong></p>
                            <p><img src="./images/userprofile/icons/city-solid 1.png" style="margin-right: 10px;"><strong>City:<?php echo " ".$profile["City"];?> </strong></p>
                            <p><img src="./images/userprofile/icons/envelopes-bulk-solid 1.png" style="margin-right: 10px;"><strong>Postal Code: <?php echo " ".$profile["PostalCode"];?> </strong></p>
                          
                          </div>
                    </div>


                    <div class="order-container">
                        <nt><br>
                    <h1 style = "text-align:center;">Your Order</h3> <br><br>
                    <div class="order-details" style = "text-align:center;">
                        <h3>Service Name :  <?php echo $serviceName?>  </h3> 


                    </div> <br><br>
                    <div class="total-amount" style = "text-align:center;">

                        <h2><strong>Total:</strong> Rs.<?php echo $totamount;?>.00</h2>
                    </div>

                    </div>

                    






       

        <div class = "bill-content">
          
          <form method = "post" action="">
            <strong><label for="billingaddressk">Billing Address:</label></strong><br>
            <textarea id="billingaddress" name="billingaddress" rows="4" cols="50"><?php echo $profile["Address"];?></textarea><br>
            <input type="hidden" name="totamount" value="<?php echo $totamount;?>">
            <input type="hidden" name="serviceName" value="<?php echo $serviceName;?>"> <br> <br>
            <strong><label for="pm" class="payment-methode">Payment Method:</label></strong><br>
            <div class = "paymethod">
            <input type="radio" id="option1" name="paymethod" value="CashOnDelivery" checked>
            <label for="option1"><img src ="./images/checkout/cod.png"/>Cash</label>
          
            <input type="radio" id="option2" name="paymethod" value="CreditDebitCard">
            <label for="option2"><img src ="./images/checkout/card.png"/>Credit Or Debit Card</label>

            <input type="radio" id="option3" name="paymethod" value="Paypal">
            <label for="option3"><img src ="./images/checkout/paypal.png"/>PayPal</label>
          </div>
          <div class = "product-info"><input type="submit" name = "place" value="PLACE ORDER" class="place"></div>
        </form>
        
        </div>



        <footer id="footer">
            <div>
                <div>
                    <img src="./Src/Images/logo/white-logo.png" alt="">
                    <img src="./Src/Images/footer/Planner 1.png" alt="">
                    
                    <ul>
                        
                        <a href="./index.html"></a><li>Home</li></a>
                        <a href="#"></a><li>Services</li></a>
                        <a href="#"></a><li>About</li></a>
                        <a href="#"></a><li>Work</li></a>
                        <a href="#"></a><li>Contact</li></a>
                        
                    </ul>
                    <ul>
                        <a href="#"></a><li>Facebook</li></a>
                        <a href="#"></a><li>Youtube</li></a>
                        <a href="#"></a><li>Instagram</li></a>
                        <a href="#"></a><li>Email</li></a>
                        <a href="#"></a><li>Call us</li></a>
                    </ul>
                </div>
                <h3>Quick links</h3>
                <h3>Contact Us</h3>
                <p>All Right Reserved - 2023 Designed by SLIIT Matara Center, Group 04</p>
            </div>
        </footer>

    </body>
</html>



<?php
        if (isset($_POST["place"])) {
        $paymethod = $_POST["paymethod"];
        $baddress = $_POST["billingaddress"];
        $tot = $_POST["totamount"];
        $service = $_POST["serviceName"];

        $placedsql = "INSERT INTO Orders(Amount,BillingAddress,PaymentMethod,serviceName,user_id) 
                        VALUES ($tot, '$baddress', '$paymethod','$service',$UserID )";
        if($conn->query($placedsql)){
            
           ?>

          <script>
            alert("Order Successfully Placed");
            window.location.href = "thanksfororder.php";
            </script>
          
 
          
                
          <?php      
          }
                else{
                echo "Error:". $conn->error;
                header("Location:./myorders.php?message=paymentfailed");
                }
               
        }
        

        
        


        

}else{
    header("Location:./mycart.php?message=accessesdenied");
}


$conn->close();

?>