<!DOCTYPE html>
<head>
    <title>Cancel A Client's Order</title>
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
    <form name ="cancel2" method="post" onsubmit = "return validate()">
        <h1> The Art Of Hair: Cancel an Order Form </h1>

        <label>Client ID Number: </label>
        <input type = "text" name = "clid" id = "clid">
        <label><b>REQUIRED</b></label>

        <br>
        <br>

        <label>Client Order Number: </label>
        <input type = "text" name = "ordernum" id ="ordernum">
        <label><b>REQUIRED</b></label>

        <br>
        <br>

        <input type="submit" name="submit" value = "Submit" id="submit" style="float:right" >


    </form>
    <?php
        session_start();

        $servername = "sql1.njit.edu";
        $username = "sk55";
        $password = "Kandpal20!";
        $dbname = "sk55";
        $con = mysqli_connect($servername,$username,$password,$dbname);

        
        $id = $_POST['clid'];
        $order = $_POST['ordernum'];
        $query="Select * FROM Orders where ClientID ='$id' AND OrderNumber = '$order'";
        $result= mysqli_query($con, $query);
        $count= mysqli_num_rows($result);
        if(!empty($_POST['submit']))
        {
            echo '<script type="text/JavaScript"> 
            if(!confirm("Are you sure you want to cancel this order?"))
                {
                    event.preventDefault();
                    window.location = "https://web.njit.edu/~sk55/cancel2.php";
                }
             </script>'
            ;
            if($count > 0)
                {
                $sql = "DELETE FROM `Orders` WHERE `ClientID`='$id' AND `OrderNumber`='$order'";
                  if (mysqli_query($con, $sql)) {
                    
                    echo '<script>alert("Customer order cancelled.")</script>';
                  } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($con);
                  }
                  mysqli_close($con);
                }
            else{
                echo '<script>alert("Order number does not exist for the client. Please check and re-enter the order number.")</script>';
            }
          
        } 

    ?>
    <script>
    
      function validate(){

let id= document.forms["cancel2"]["clid"].value;
if (id==""){
    alert("Client ID must be filled out.");
    return false;
    
}

let order= document.forms["cancel2"]["ordernum"].value;
if (order==""){
    alert("Order number must be filled out.");
    return false;
    
}


}

</script>
</body>
</html>
