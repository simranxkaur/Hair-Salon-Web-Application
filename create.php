<!DOCTYPE html>
<head>
    <title>Create A New Client Account </title>
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
    <form name ="create" method="post" onsubmit = "return validate()">
        <h1> The Art Of Hair: Create a New Account Form </h1>

        <label>Client First Name: </label>
        <input type = "text" name = "clfname" id ="clfname" >
        <label><b>REQUIRED</b></label>
        
        <br>
        <br>

        <label>Client Last Name: </label>
        <input type = "text" name = "cllname" id ="cllname" >
        <label><b>REQUIRED</b></label>

        <br>
        <br>

        <label>Client ID Number: </label>
        <input type = "text" name = "clid" id = "clid" >
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

        $fname= $_POST['clfname'];
        $lname= $_POST['cllname'];
        $id = $_POST['clid'];
        $query="Select * FROM Client where FirstName ='$fname' AND LastName = '$lname' AND ID = '$id'";
        $result= mysqli_query($con, $query);
        $count= mysqli_num_rows($result);

        if(!empty($_POST['submit']))
        {
            if($count>0)
            {
                echo '<script>alert("Client already has an account.")</script>';
            }
            else{
            $sql = "INSERT INTO Client (`FirstName`, `LastName`, `ID`)
                VALUES ('$fname', '$lname', '$id')";
                  if (mysqli_query($con, $sql)) {
                    echo '<script>alert("Client account created.")</script>';
                  } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($con);
                  }
                  mysqli_close($con);
                  
            }

        }

    ?>
      <script>
        
      function validate(){

let fname= document.forms["create"]["clfname"].value;
if (fname==""){
    alert("First name must be filled out.");
    return false;
    
}

let lname= document.forms["create"]["cllname"].value;
if (lname==""){
    alert("Last name must be filled out.");
    return false;
    
}
let id= document.forms["create"]["clid"].value;
if (id==""){
    alert("Client ID must be filled out.");
    return false;
    
}


}

</script>
</body>
</html>
