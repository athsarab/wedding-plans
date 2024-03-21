<?php
include_once 'logHeader.php';

?>

<?php

require 'includes/config.php';
require 'includes/function.php';

if(!isset($_SESSION["email"]) & empty($_SESSION["email"])){// Checking if the 'email' session variable is not set and is empty.
    header("Location: login.php?error=mustlogin");; // Redirecting to 'login.php' with an error message if the condition is met.
}
$UserID = $_SESSION["uid"]; // Storing the 'uid' session variable in 'UserID'
$fname = $_SESSION["fname"]; // Storing the 'fname' session variable in 'fname'.

?>
<style>// CSS style for tables.
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px 12px;
            text-align: left;
        }
    </style>


<?php
// Retrieving user details from the database based on the 'UserID'.
        $sql = "Select * from user_details where user_id = $UserID " ;
        $result = $conn->query($sql) ;

        if($result->num_rows > 0){

                while($row = $result->fetch_assoc()){
                         // Storing user details in an array.
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
                echo "empty table"; // Outputting a message if no user details are found.
        }
?>

<link rel="stylesheet" href="./Style/myprofile.css">
<link rel="stylesheet" href="./Style/mycart.css">


        <main>
            <section class="main-banner">
                <div>
                   <center> <img src="./images/userprofile/icon-256x256 1.png" style="margin-top: 15px;" >
                    <div class="welcome-msg" >
                        <h2>Hello !! 
                    <?php
                        if(isset($_SESSION["fname"])){
                            echo $profile["FirstName"] ;
                        }else {
                            echo "User" ;
                        } ?>
                            
                        
                        Welcome Back </h2>
                    </div>
                    
                </center>
                </div>
                

            </section>

            <div class="user-container">
                <div class="user-sidebar">
                  <ul class="user-menu">
                  <li><a href="./myprofile.php">My Details</a></li>
                    <li><a href="./myorders.php">My Orders</a></li>
                    <li><a href="./mycart.php">My Cart</a></li>
                  </ul>
            </div>

                <section class="details-section">
                    <div class="welcome-msg" >
                         <center><h2 style="margin-top: 30px;">My Orders</h2> </center>
                    </div>
                    <center><img src="./images/checkout/checkout.png" style="margin-top: 15px; margin-bottom: 15px;" ></center>

                    <?php
          if(isset($_GET["message"])){
            if($_GET["message"]=="productnotfound"){
              echo'<div class = "message error">Product Not Found!</div>';
            }elseif($_GET["message"]=="feedbacksubmitted"){
              echo'<div class = "message success">Feedback Submitted successfully!</div>';
            }elseif($_GET["message"]=="failedtosubmitfeedback"){
              echo'<div class = "message error">account createdsuccessfully!</div>';
            }elseif($_GET["message"]=="accessesdenied"){
              echo'<div class = "message error">suspicious attempt detected!</div>';
            }elseif($_GET["message"]=="cancelled"){
              echo "<script> alert('Order Cancelled successfully!'); </script>";
              
            }elseif($_GET["message"]=="cancelfailed"){
              echo'<div class = "message error">Order Cancelation Failed!</div>';
            }elseif($_GET["message"]=="paymentfailed"){
              echo'<div class = "message error">Order Placement Failed!</div>';
            }elseif($_GET["message"]=="paymentconfirmed"){
              echo'<div class = "message success">Order Placed successfully!</div>';
            }
          }
        
      $ordersql= "SELECT * from orders where user_id = '$UserID' ORDER BY order_id DESC";
      $orderresult = $conn->query($ordersql);

      if ($orderresult->num_rows> 0)
          {
              while($row = $orderresult->fetch_assoc())
              {
                  $orders[]=$row;
                
              }?>
              /*<table>
                  <tr>
                  <th>Order ID</th>
                  <th>Order Name</th>
                  <th>Amount(Rs)</th>
                  <th>Order Status</th>
                  <th>Actions</th>
                  </tr>
                  <?php foreach ($orders as $orders): ?>
                  <tr>
                  <td><?php echo $orders["order_id"] ?></td>
                  <td><?php echo $orders["serviceName"] ?></td>
                  <td><?php echo $orders["Amount"] ?></td>
                  <td id="status"><?php echo $orders["orderStatus"] ?></td>
                  <td>
                  <div id="edit-btn">
                      <a id="feedback-link" href="addfeedback.php?productid=<?php echo $orders['serviceName']."&userid=".$orders['user_id']?>">
                        <button id="edit-btn">Add Feedback</button>
                      </a>
                    </div>

                           <div id="delete-btn">
                      <a id="cancel-link" href="cancelorder.php?orderid=<?php echo $orders['order_id']."&userid=".$orders['user_id']?>">
                        <button id="delete-btn" onclick="return confirm('Are you sure you want to cancel the order?');">Cancel Order</button>
                      </a>
                    </div>
                                        
                  </td>
                  </tr>
                  <?php endforeach; ?>
                
            </table>*/

          <?php
          }
          else
          {
          echo "You Dont Have Any Orders Yet";
          }
    
      ?>

    </div>
  </div>

<?php 
$conn->close();

?>
               </section>
       </main>
           <footer id="footer">
                <div>
                    <div>
                        <img src="./Src/Images/logo/white-logo.png" alt="">
                        <img src="./Src/Images/footer/Planner 1.png" alt="">
                        
                        <ul>
                            
                            <a href="./index.php"><li>Home</li></a>
                            <a href="./service.php"><li>Services</li></a>
                            <a href="./LogAboutus.php"><li>About</li></a>
                            <a href="#"><li>Work</li></a>
                            <a href="./LogContact.php"><li>Contact</li></a>
                            <a href="./privacy_policy.php"><li>Privacy Policy</li></a>
                            
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