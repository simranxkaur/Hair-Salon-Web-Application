<!DOCTYPE html>
<html lang = "en">
<head>
    <title>The Art of Hair (TAOH)</title>
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

   

    </style>
</head>
<body>
    
    <form name ="myForm" onsubmit="return validate()" action = "verify.php" method="post">
        <h1 style="text-align: center;">The Art of Hair </h1>
        <label for="fname"> Stylist's First Name: </label>
        <input type= "text" id="fname" name="fname" placeholder="Example: Simran">
        <label><b>REQUIRED</b></label>

        <br>
        <br>

        <label for= "lname"> Stylist's Last Name:</label>
        <input type = "text" id= "lname" name = "lname" placeholder= "Example: Kaur">
        <label><b>REQUIRED</b></label>
        <br>
        <br>

        <label for="pwd">Stylist's Password:</label>
        <input type="password" id="pwd" name="pwd" placeholder= "Example: Books2002!">
        <label><b>REQUIRED</b></label>
        <br>
        <br>

        <label for="idnum">Stylist's ID #:</label>
        <input type= "text" id= "idnum" name="idnum" placeholder= "Example:20022002">
        <label><b>REQUIRED</b></label>
        <br>
        <br>

        <label for="pnum">Stylist's Phone Number:</label>
        <input type= "text" id="pnum" name="pnum" placeholder= "Example: 732-532-7757">
        <label><b>REQUIRED</b></label>
        <br>
        <br>
        <label for="email">Stylist's Email</label>
        <input type="text" id="email" name= "email" placeholder= "sim@sim.com">
        <label id= "emailreq" style="display:none"><b>REQUIRED</b></label>
        <br>
        <br>
        <input type= "checkbox" id="emailcon" name = "emailcon" onclick="myFunction()">

        <label for="emailcon">Check the Box to Request an Email Confirmation</label>

        <br>
        <br>
        <label for="transaction">Select a Transaction</label>
            <select name="transaction" id="transaction">
                <option value= "Search a Stylist's Accounts">Search a Stylist's Accounts</option>
                <option value= "Book a Client's Appointment">Book a Client's Appointment</option>
                <option value= "Place a Client's Order">Place a Client's Order</option>
                <option value= "Update a Client's Order">Update a Client's Order</option>
                <option value= "Cancel a Client's Appointment">Cancel a Client's Appointment</option>
                <option value= "Cancel a Client's Order">Cancel a Client's Order</option>
                <option value= "Create a New Client Account">Create a New Client Account</option>
            </select>
        <br>
        <br>
        <input type="submit" name="submit" value = "Submit" id="submit" style="float:right" onclick="place()" >
        <input type = "reset" value ="Reset" id="reset" style="float:right">

    
        
        
    </form>
    <script>

        function place(){
            if(document.forms["myForm"]["transaction"].value == "Place a Client's Order") 
            {
                if(!confirm("Before you place an order you must have booked an appointment/event. Did you have an appointment/event?")){
                    event.preventDefault();
                    window.location = "https://web.njit.edu/~sk55/book.php";
                }
            }
        }
        
        function validate(){
            let firstname= document.forms["myForm"]["fname"].value;
            if (firstname==""){
                alert("First name must be filled out.");
                fname.focus();
                fname.select();
                return false;
                
            }
            
            let lastname= document.forms["myForm"]["lname"].value;
            if (lastname==""){
                alert("Last name must be filled out.");
                lname.focus();
                lname.select();
                return false;

            }
            

            let password= document.forms["myForm"]["pwd"].value;
            var validpwd= /^(?=.*\d)(?=.*[A-Z])(?=.*[!@#$%^&*]).{3,10}$/;
            var random = 1
            if (password.match(validpwd)){
                //nothing
            }
            else{
                alert("Invalid password format. It should have at least 1 uppercase letter, 1 digit, 1 special character and should be 10 characters at most.")
                pwd.focus();
                pwd.select();
                return false;
            }

            var userid = document.getElementById("idnum").value;
            var validuser= /^\d{8}$/;
            if (userid.match(validuser)){
                //nothing
            }
            else{
                alert("Invalid ID format. Your ID should be 8 digits.")
                idnum.focus();
                idnum.select();
                return false;
            }

            var phonenumber = document.getElementById("pnum").value;
            var validpnum= /^\d{3}-\d{3}-\d{4}$/;
            if (phonenumber.match(validpnum)){
                //nothing
            }
            else{
                alert("Invalid phone number format. Your phone number should be 10 digits delineated with dashes.")
                pnum.focus();
                pnum.select();

                return false;
            }

            var email = document.getElementById("email").value;
            var validemail= email.search(/^[A-za-z0-9!#$%&'*+-/=?^_`{|}~]{1,}@[a-z]{2,5}\.[a-z]{2,5}$/);
            var isitchecked= document.getElementById("emailcon");
            if (isitchecked.checked==true && validemail != 0)  {
               alert("Invalid email format. The email address must contain an @ followed by a period and an email domain with 2-5 characters.")
               return false;
            }
                        
        }

        
        function myFunction(){
        var isitchecked= document.getElementById("emailcon")
        var textoutput= document.getElementById("emailreq")
        if (isitchecked.checked==true)
        {
        textoutput.style.display="block";
        }
        else{
            textoutput.style.display="none";
        }
    }
      
    
    </script>

 

</body>



</html>
