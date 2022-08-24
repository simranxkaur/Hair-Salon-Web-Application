<!DOCTYPE html>
<html lang= "en">
<head>
    <title>Search a Stylist's Records</title>
    <meta charset = "utf-8">
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
        <h1 style="text-align: center;">The Art of Hair </h1>
    <?php
        session_start();

        $servername = "sql1.njit.edu";
        $username = "sk55";
        $password = "Kandpal20!";
        $dbname = "sk55";
        $con = mysqli_connect($servername,$username,$password,$dbname);

        $query2 = "SELECT Stylist.FName, Stylist.LName, Stylist.StylistID, Stylist.PhoneNumber, Stylist.Email, Client.FirstName, 
        Client.LastName, Appointments.ClientID, Appointments.AppointmentType, Appointments.Date, Appointments.AppointmentID, 
        Orders.ProductTypeAndQuantity, Orders.ShippingAddress, Orders.OrderNumber FROM Stylist Inner Join Appointments ON 
        Stylist.StylistID = Appointments.StylistID AND Stylist.FName = '{$_SESSION['fname']}' Inner Join Client ON 
        Appointments.ClientID = Client.ID Inner Join Orders ON Appointments.AppointmentID = Orders.AppointmentID AND 
        Orders.ClientID = Appointments.ClientID";
        $result2= mysqli_query($con, $query2);

        echo "<table border='1'>
            <tr> 
            <th>Stylist First Name</th>
            <th>Stylist Last Name</th>
            <th>Stylist ID</th>
            <th>Stylist Phone Number</th>
            <th>Stylist Email</th>
            <th>Client First Name </th>
            <th>Client Last Name </th>
            <th> Client ID </th>
            <th> Appointment Type </th>
            <th> Appointment Date and Time </th>
            <th> Appointment ID </th>
            <th> Product </th>
            <th> Shipping Address </th>
            <th> Order Number </th>
            </tr>";

            while($row = mysqli_fetch_array($result2))
        {
                echo "<tr>";
                echo "<td>" . $row['FName'] . "</td>";
                echo "<td>" . $row['LName'] . "</td>";
                echo "<td>" . $row['StylistID'] . "</td>";
                echo "<td>" . $row['PhoneNumber'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['FirstName'] . "</td>"; 
                echo "<td>" . $row['LastName'] . "</td>";
                echo "<td>" . $row['ClientID'] . "</td>";
                echo "<td>" . $row['AppointmentType'] . "</td>";
                echo "<td>" . $row['Date'] . "</td>";
                echo "<td>" . $row['AppointmentID'] . "</td>";
                echo "<td>" . $row['ProductTypeAndQuantity'] . "</td>";
                echo "<td>" . $row['ShippingAddress'] . "</td>";
                echo "<td>" . $row['OrderNumber'] . "</td>";
                echo "</tr>";
        }
        
        echo "</table>";

    ?>
</body>



</html>