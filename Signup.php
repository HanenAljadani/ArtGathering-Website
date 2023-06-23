<!DOCTYPE html>
<html>
    <head>
        
	<title>Signup</title>
  <?php
  $servername = "localhost";  
  $username = "root";  
  $password = "mysql";  
  $dbname = "ArtGathering";
    
  // Create connection  
  $conn = new mysqli($servername, $username, $password, $dbname);  
  // Check connection  
  if ($conn->connect_error) {
  }

  $name_err ="";
  $email_err ="";
  $password_err ="";
  $password_con_err = "";
  $msg_form ="";

$name = $gender = $password = $email = $password_con =  "";  
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
if (empty($_POST["name"])) {
    $name_err = "Please enter a name";  }
else {$name = $_POST["name"];
 
}
if (empty($_POST["email"])) {
    $email_err = "Please enter an email";  }
else { $email = $_POST["email"];  }
if (isset($_POST["gender"])) {

    $gender = $_POST["gender"];}
if (empty($_POST["password"])) {
  $password_err = "Please enter password";
}else{

  $password = $_POST["password"]; }
  if (empty($_POST["psw-repeat"])) {
    $password_con_err = "Please enter your password again";
  }else{
    if($_POST["psw-repeat"] != $_POST["password"] ){
        $password_con_err = "Password must be the same";
    }else{
      $password_con = $_POST["psw-repeat"];
    }
   }
  }

if($password_con != "" && $password !="" &&  $name != "" && $email != "" ){
      $sql_select = "SELECT *  FROM users WHERE name='$name' AND password='$password' AND email='$email' AND gender='$gender'
";

$result = $conn->query($sql_select);

if($result->num_rows>0){



header("Location: login.html");
}else{


      $sql_insert = "INSERT INTO  users ( name, email ,  gender ,  password ) 
VALUES ('$name','$email','$gender','$password')";

      if ($conn->query($sql_insert) === TRUE) {
        
        $msg_form = "Created successfully";

      } else {
        $msg_form = "Error creating";
      }


}
}
    


  ?> 



        <link rel="stylesheet" href="Style.css">
	    <script src="javaScript.js">	</script>
		<style>
#err{
  color:red;
}
#msg{
  color:green;
}

</style>
		
    </head>
    <body>
      <div class="logo">
        <h3><span>Art</span>Gathering</li></h3>
        </div>
             	<ul class="menu">
						<li><a href="Index.html">Home</a></li>
						<li><a href="Shop.html">Shop</a></li>
						<li><a href="Contact.html">Contact</a></li>
						<li><a href="About.html">About</a></li>
						<li><a href="Signup.php" class="signup">Signup </a></li>
						<li><a href="logIn.html" >Login  </a></li>
					</ul>
            
			

           <section class="background">
          
          <div class="signup">
            <p>START FOR FREE
            <h2>Create new account<span>.</span></h2>
            Already Have An Account? <a href="logIn.html">Log in</a><br/></p>
           
          <form onreset="resetMsg()"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
          <br><b id="msg"><?php echo $msg_form;?></b>
              <br/>
          
          <label for="name"><b>Name</b><br/>
              <input onfocus="myFunFocus(this)" type="text" placeholder="Enter Your Full Name" name="name" id="name" onblur="myBlurFunction(this)">
              <br><b id="err"><?php echo $name_err;?></b>
            </label>
              <br/>


                 <label for="gender"><b>Gender</b></label>
                 <label for="email" class="email"><b>Email</b></label>
                 <br/>
                 <select id="gender" name="gender">
                 <option value="Female">Female</option>
                 <option value="Male">Male</option>
                 </select>
      <input id="email" type="email" title="Please check for the existence of the email address"  placeholder="Enter Email" name="email" style="margin: 10px 0 0px 10px;display: inline-block;border: none;border-radius: 6px;background: rgba(122, 114, 255, 0.3);width: 29.3%;padding: 15px;">
      <br><b id="err"><?php echo $email_err;?></b>
              <br/>
                 <label for="password"><b>Password</b></label><br/>
                 <input onfocus="myFunFocus(this)" onblur="myBlurFunction(this)" type="password" placeholder="Enter Password" name="password"
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[#@$]).{8,}" title="Password Must contain at least one number and one uppercase and lowercase letter and # or $ symbols, and at least 8 or more characters" >
              
            <br><b id="err"><?php echo $password_err;?></b>
            
            <br/>
                 <label for="psw-repeat"><b>Confirm Password</b></label><br/>
                 <input onfocus="myFunFocus(this)" onblur="myBlurFunction(this)" type="password" placeholder="Confirm Password" name="psw-repeat" >
                 <br><b id="err"><?php echo $password_con_err;?></b>
              <br/>

              <label>
                <input type="checkbox" name="join" > Subscribe to our newsletter to receive offers. 
              </label>
              

              <br/>
                <button type="reset">Cancel</button>
                <button id="FORM_ID" type="submit" onclick="confirmSubmit()">Signup</button><br>
                
              </div>
            </form>




        <!--Footer section----->
        <footer>
         <a href = "https://twitter.com/"> <img src="images/icons/twitter.png" alt="twitterLogo" ></a>
          <a href = "https://www.snapchat.com/"><img src="images/icons/snapchat.png" alt="snapLogo" ></a>
          <a href = "https://instagram.com/"><img src="images/icons/instagram.png" alt="instagramLogo" ></a>
          <p><b>Info.Support.Marketing</b></p>
          <p><b>Terms of Use.Privacy Policy</b></p>
          <p id="footer">@2030 ArtGathering</p>
      </footer>
      </section>
    </body>
</html>