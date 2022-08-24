<?php
session_start();
$servername = "sql1.njit.edu";
$username = "sk55";
$password = "Kandpal20!";
$dbname = "sk55";
$con = mysqli_connect($servername,$username,$password,$dbname);

if(!empty($_POST['submit']))
{
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pwd = $_POST['pwd'];
    $id = $_POST['idnum'];
    $query="Select * FROM Stylist where FName ='$fname' AND LName = '$lname' AND Password = '$pwd' AND StylistID = '$id'";
    $result= mysqli_query($con, $query);
    $count= mysqli_num_rows($result);
    if($count > 0)
        {
            $_SESSION['fname']= $fname;
            $_SESSION['lname']= $lname;
            $_SESSION['pwd']=$pwd;
            $_SESSION['id']=$id;
            if($_POST['transaction'] == "Search a Stylist's Accounts")
                {
                    header('Location: https://web.njit.edu/~sk55/search.php');
                }
            if($_POST['transaction'] == "Book a Client's Appointment")
                {
                    header('Location: https://web.njit.edu/~sk55/book.php');
                }
            if($_POST['transaction'] == "Place a Client's Order")
                {
                    header('Location: https://web.njit.edu/~sk55/place.php');
                }
            if($_POST['transaction'] == "Update a Client's Order")
                {
                    header('Location: https://web.njit.edu/~sk55/update.php');
                }
            if($_POST['transaction'] == "Cancel a Client's Appointment")
                {
                    header('Location: https://web.njit.edu/~sk55/cancel1.php');
                }
            if($_POST['transaction'] == "Cancel a Client's Order")
                {
                    header('Location: https://web.njit.edu/~sk55/cancel2.php');
                }
            if($_POST['transaction'] == "Create a New Client Account")
                {
                    header('Location: https://web.njit.edu/~sk55/create.php');
                }
            
        }
    else
        {
            echo "Login not successful.";
        }
}
?>