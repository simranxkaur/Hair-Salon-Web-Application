<!DOCTYPE html>
<head>
    <title>Book A Client's Appointment</title>
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
    <form name ="book" method="post" onsubmit="validate()">
        <h1> The Art Of Hair: Make an Appointment Form </h1>

        <label>Client's First Name: </label>
        <input type = "text" name = "clfname" id ="clfname" placeholder="Example: Harry">
        <label><b>REQUIRED</b></label>
        
        <br>
        <br>

        <label>Client's Last Name: </label>
        <input type = "text" name = "cllname" id ="cllname" placeholder="Example: Potter">
        <label><b>REQUIRED</b></label>

        <br>
        <br>

        <label>Client ID Number: </label>
        <input type = "text" name = "clid" id = "clid" placeholder="Example: 9">
        <label><b>REQUIRED</b></label>

        <br>
        <br>

        <label>Appointment Type: </label>
        <input type = "text" name = "apptype" id ="apptype" placeholder="Example: Haircut">
        <label><b>REQUIRED</b></label>

        <br>
        <br>

        <label>Date and Time: </label>
        <input type = "text" name = "date" id = "date" placeholder="Example: 10/9/2021 at 10AM">
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

$con = mysqli_connect($servername, $username, $password, $dbname);

            $fname = $_POST['clfname'];
            $lname = $_POST['cllname'];
            $id = $_POST['clid'];
            $app = $_POST['apptype'];
            $date = $_POST['date'];
            $appid = rand();
            $query="Select * FROM Client where FirstName ='$fname' AND LastName = '$lname' AND ID = '$id'";
            $result= mysqli_query($con, $query);
            $count= mysqli_num_rows($result);
if(!empty($_POST['submit']))
        {
            if($count > 0)
                {
                $sql = "INSERT INTO Appointments (`AppointmentType`, `Date`, `StylistID`, `ClientID`, `AppointmentID`)
                VALUES ('$app', '$date', '{$_SESSION['id']}', '$id', '$appid')";
                  if (mysqli_query($con, $sql)) {
                    echo '<script>alert("Client appointment booked.")</script>';
                  } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($con);
                  }
                  mysqli_close($con);
                  
                }
            else{
                echo '<script>alert("Client cannot be found. Recheck data entered otherwise you need to create a client account.")</script>';
            }
          
        }
            
    ?>
    <script>
      
    function validate(){
            let firstname= document.forms["book"]["clfname"].value;
            if (firstname==""){
                alert("First name must be filled out.");
                return false;
                
            }
            
            let lastname= document.forms["book"]["cllname"].value;
            if (lastname==""){
                alert("Last name must be filled out.");
                return false;

            }
            

            let id= document.forms["book"]["clid"].value;
            if (id==""){
                alert("Client ID must be filled out.");
                return false;
                
            }

            let apptype= document.forms["book"]["apptype"].value;
            if (apptype==""){
                alert("Appointment name must be filled out.");
                return false;
                
            }

      
            let date= document.forms["book"]["date"].value;
            if (date==""){
                alert("Date and time must be filled out.");
                return false;
            }
    }
    
      </script>
              
    
</body>
</html>
