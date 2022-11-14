<!DOCTYPE html>
<html lang="en">
<head>
    <Style>
        .error{
            color: #FF0000;
        }
    </Style>
</head>
<body>
    <?php
    // Define variable and set the empty values

    $nameErr = $emailErr = $genderErr = $websiteErr = "";

    $name = $email = $gender = $comment = $website = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        }else{
            $name= test_input($_POST["name"]);
            
            // It check if the name only contain letters and whitespace
            if(!pref_match("/^[a-zA-Z-' ]*$/",$name))
            {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["email"])){
            $emailErr = "Email is required";
        }else{
            $email = test_input($_POST["email"]);

            // It checks if email address is well-formed 

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
              }
        }
        

        if (empty($_POST["website"])) {
            $website = "";
          } else {
            $website = test_input($_POST["website"]);
            // check if URL address syntax is valid
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
              $websiteErr = "Invalid URL";
            }    
          }


        
          if (empty($_POST["comment"])) {
            $comment = "";
          } else {
            $comment = test_input($_POST["comment"]);
          }
        

          if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
          } else {
            $gender = test_input($_POST["gender"]);
          }
        }
        
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
         ?>

  
    <h2>Form Fields Validate !</h2>
    <p><span class="error"> * Required Field</span></p>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    Name: <input type="text" name="name">
    <span class="error"><?php echo $nameErr;?></span><br><br>

    E-mail: <input type="text" name="email">
    <span class="error"> <?php echo $emailErr;?> </span><br><br>

    Website: <input type="text" name="website">
    <span class="error"> <?php echo $websiteErr;?></span><br><br>

    Comment: <textarea name="comment" rows="5" cols="20"></textarea><br><br>

    Gender:
    <input type="radio" name="gender" value="female"> Female
    <input type="radio" name="gender" value="male" > Male
    <input type="radio" name="gender" value="other">Other
    <span class="error"> * <?php echo $genderErr;?></span><br><br>

    <input type="submit" name="button" value="Submit"><br><br>
</form>

<?php
echo "<h2>Your Inputs: </h2>";

echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
?>
</body>
</html>