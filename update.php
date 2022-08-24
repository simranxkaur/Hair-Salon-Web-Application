<!DOCTYPE html>
<head>
    <title>Update A Client's Order</title>
    <meta charset= "utf-8">
    <style type= "text/css">


    form {
        border: thick solid black;
        margin: 125px 250px 125px 250px;
        padding: 1ch;
        border-spacing: 1ch;
        position:fixed;
        width: 700px;
        background: lightgray;
    }

    body{
        background-image: url(https://images.unsplash.com/photo-1560066984-138dadb4c035?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8YmVhdXR5JTIwc2Fsb258ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80);
    }
    table{
        background-color: white;
    }
    ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
    </style>
</head>
<body>
        <ul>
            <li><a href="IT202_Assignment4.php">Home</a></li>
            <li><a href="search.php">Search Stylist's Records</a></li>
            <li><a href="book.php">Make Appointment</a></li>
            <li><a href="place.php">Place Order</a></li>
            <li><a href="update.php">Update Order</a></li>
            <li><a href="cancel1.php">Cancel Appointment</a></li>
            <li><a href="cancel2.php">Cancel Order</a></li>
            <li><a href="create.php">Create Client Account</a></li>
        </ul>
    <form name ="update" method="post" onsubmit = "return validate()">
        <h1> The Art Of Hair: Update an Order Form </h1>


        <label>Client ID Number: </label>
        <input type = "text" name = "clid" id = "clid" >
        <label><b>REQUIRED</b></label>

        <br>
        <br>

        <label>Client Order Number: </label>
        <input type = "text" name = "order" id ="order" >
        <label><b>REQUIRED</b></label>

        <br>
        <br>

        <label>Updated Order: </label>
        <input type = "text" name = "neworder" id = "neworder">
        <label><b>REQUIRED</b></label>

        <br>
        <br>

        <input type="submit" name="submit" value = "Submit" id="submit" style="float:right"  >


    </form>
    <?php
        session_start();

        $servername = "sql1.njit.edu";
        $username = "sk55";
        $password = "Kandpal20!";
        $dbname = "sk55";
        $con = mysqli_connect($servername,$username,$password,$dbname);
        $id = $_POST['clid'];
        $ordernumber = $_POST['order'];
        $neworder = $_POST['neworder'];
        $query="Select * FROM Orders where OrderNumber ='$ordernumber' AND ClientID = '$id'";
        $result= mysqli_query($con, $query);
        $count= mysqli_num_rows($result);
        if(!empty($_POST['submit']))
        {
            echo '<script type="text/JavaScript"> 
            if(!confirm("Are you sure you want to cancel this appointment?"))
                {
                    event.preventDefault();
                    window.location = "https://web.njit.edu/~sk55/update.php";
                }
             </script>'
            ;
            if($count > 0)
                {
                $sql = "UPDATE `Orders` SET `ProductTypeAndQuantity`='$neworder' WHERE `OrderNumber`='$ordernumber'";
                  if (mysqli_query($con, $sql)) {
                    
                    echo '<script>alert("Order Updated.")</script>';
                  } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($con);
                  }
                  mysqli_close($con);
                }
            else{
                echo '<script>alert("Either data entered for Client ID or Order Number is incorrect. Please check the Client ID and Order Number entered or that the order was placed by searching records of the stylist.")</script>';
            }
          
        } 

    ?>

<script>

    

    function validate(){

            let id= document.forms["update"]["clid"].value;
            if (id==""){
                alert("Client ID must be filled out.");
                return false;
                
            }

            let appid= document.forms["update"]["order"].value;
            if (appid==""){
                alert("Order number must be filled out.");
                return false;
                
            }

      
            let product= document.forms["update"]["neworder"].value;
            if (product==""){
                alert("Updated order must be filled out.");
                return false;
            }


    }

    </script>
</body>
</html>
