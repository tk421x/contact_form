<?php 

    if($_POST["submit"]){
        
        $result = '<div class = "alert alert-success">form submitted</div>';
        
        if(!$_POST["name"]){
            
            $error = "<br />Please enter your name.";
            
        }
        
        if(!$_POST["email"]){
            
            $error .= "<br />Please enter your email.";
            
        }
        
        if(!$_POST["comment"]){
            
            $error .= "<br />Please enter a comment.";
            
        }
        
        if ($_POST["email"] && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) { 
    
            $error .= "<br />Invalid email entered.";

        } 
        
        if($error){
            
            $result = '<div class = "alert alert-danger"><strong>There were error(s).</strong>'.$error.'</div>';
            
        } else {
            
            $subject = "Thank You";
            
            $headers = "Hi ".$_POST["name"].",";
            
            $body = "I will be in contact soon!\n\nBest Regards,\n\nJustin Swenson";
            
            if(mail($_POST["email"], $subject, $body, $headers)){
            
                $result = '<div class = "alert alert-success">Contact Submission Successful</div>';
            
            } else {
                
                $result = '<div class = "alert alert-danger">Contact Submission Unsuccessful</div>';   
                
            }
            
        }
        
    }

?>

<!doctype html>
<html>
    <head>
        
        <title>Contact Form</title>
        
        <meta charset="utf-8" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <!-- jQuery and jQuery UI -->
        <script type = "text/javascript" src = "jquery.min.js"></script>
        <script type = "text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
        
        <style type="text/css">
          
            #emailForm {
                border: 1px solid grey;
                border-radius: 10px;
                margin-top: 15px;
            }
            
            form {
                padding-bottom: 15px;   
            }

        </style>
        
    </head>
    
    <body>
        
        <div class = "container">
            
            <div class = "row">
                
                <div class = "col-md-6 col-md-offset-3" id = "emailForm">
                    
                    <h1>Want me to contact you?</h1>
                    
                    <?php echo $result; ?>
                    
                    <p class = "lead">Fill out this form.</p>
                    
                    <form method = "post">
                    
                        <div class = "form-group">
                        
                            <label for = "name">Name: </label>
                            
                            <input type = "text" name = "name" class = "form-control" placeholder = "Enter Name" value = "<?php echo $_POST['name'] ?>" />
                        
                        </div>
                        
                        <div class = "form-group">
                        
                            <label for = "email">Email: </label>
                            
                            <input type = "email" name = "email" class = "form-control" placeholder = "Enter Email" value = "<?php echo $_POST['email'] ?>" />
                        
                        </div>
                        
                        <div class = "form-group">
                        
                            <label for = "comment">Any Comments?</label>
                            
                            <textarea type = "text" name = "comment" class = "form-control"><?php echo $_POST["comment"] ?></textarea>
                        
                        </div>
                        
                        <input type = "submit" name = "submit" value = "Submit" class = "btn btn-success btn-lg" />
                    
                    </form>
                    
                </div>
                
            </div>
        
        </div>
        
    </body>
    
</html>
