<?php require("register.class.php") ?>
<?php require("login.class.php") ?>
<?php

   
            if (isset($_POST['signUp'])) {
                
                $user = new RegisterUser($_POST['login'], $_POST['name'], $_POST['email'], $_POST['userPassword'], $_POST['confirmPassword']);
                
        }
       
            if (isset($_POST['logIn'])) {
            
            $user = new LoginUser($_POST['login'], $_POST['password']);
           
           
        }
        
        
        
?>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous" href="styles.css">
   
	<?php include("styles.css") ?>
	 
	 <title>Register and login form</title>
</head>
<body>
    <div class="container" id="homePageContainer">
        
        
          
        <form action="" method = "post" id = "signUpForm" enctype="multipart/form-data" autocomplete="off">
        
        <h1>Registration field</h1>
           
        <fieldset class="form-group">
        
            <input class="form-control" name="login" type="text" placeholder="login" required minlength="6">
        
        </fieldset>
        
        <fieldset class="form-group">
        
            <input class="form-control" name="name" type="text" placeholder="name" required minlength="2">
        
        </fieldset>
        
        <fieldset class="form-group">
        
            <input class="form-control" name="email" type="email" placeholder="email">
        
        </fieldset>
        
        
        <fieldset class="form-group">
       
            <input class="form-control pattern" name="userPassword" type="password" placeholder="password" required minlength="6" required pattern="(?=.*[0-9])(?=.*[A-Za-z])[0-9a-zA-Z]{6,}" title="Password must include at least one number and one letter">
        
        </fieldset>
        
        <fieldset class="form-group">
       
            <input class="form-control" name="confirmPassword" type="password" placeholder="confirm password">
        
        </fieldset>
        
        
        
        <fieldset class="form-group">
        
            <input type="hidden" name="signUp" value=1>
        
            <input class="btn" type="submit" name="signUp" value="Sign up!">
            
        </fieldset>
          
        <p><a class="toggleForms">Log in</a></p>
        
        <p class="error"><?php echo @$user->error ?></p>
		<p class="success"><?php echo @$user->success ?></p>
       
    </form>
  
    
    <form action="" method = "post" id = "logInForm" enctype="multipart/form-data" autocomplete="off">
        
        <h1>Authorization field</h1>
        
        <p>Log in using your username and password.</p>
        
        <fieldset class="form-group">
       
            <input class="form-control" name="login" type="text" placeholder="login">
        
        </fieldset>
        
        <fieldset class="form-group">
       
            <input class="form-control" name="password" type="password" placeholder="password">
        
        </fieldset>
        
        
            <input type="hidden" name="logIn" value=0>
            
            <fieldset class="form-group">
       
            <input class="btn" type="submit" name="logIn" value="Log in!">
        
        </fieldset>
        
        <p><a class="toggleForms">Sign up</a></p>
        
        <p class="error"><?php echo @$user->error ?></p>
		<p class="success"><?php echo @$user->success ?></p>
       
    </form>
    
    
          
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
     </body>
</html>
<script type="text/javascript">
      
        $(".toggleForms").click(function() {
            
            $("#signUpForm").toggle();
            $("#logInForm").toggle();
            
            
        });
        </script>
        </body>
</html>
    
    
    
    
