<!-- Write a script that ensures a valid email, a password between 8 to 16 characters long, and a valid zip code (#####) to be supplied through a form in HTML. -->
<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $zip = $_POST['zip'];
    $error = [];
    if(empty($name)){
        $error['name'] = 'Name is required';
    }
    if(empty($email)){
        $error['email'] = 'Email is required';
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error['email'] = 'Invalid Email';
    }
    if(empty($password)){
        $error['password'] = 'Password is required';
    }elseif(strlen($password) < 8 || strlen($password) > 16){
        $error['password'] = 'Password must be between 8 to 16 characters';
    }
    if(empty($zip)){
        $error['zip'] = 'Zip is required';
    }elseif(!preg_match('/^\d{5}$/', $zip)){
        $error['zip'] = 'Invalid Zip Code';
    }
    if(!empty($error)){
        echo '<ul>';
        foreach($error as $key => $value){
            echo '<li>'.$value.'</li>';
        }
        echo '</ul>';
    }else{
        echo '<h2>Validated Data </h2>';
        echo '<p>Name: '.$name.'</p>';
        echo '<p>Email: '.$email.'</p>';
        echo '<p>Password: '.$password.'</p>';
        echo '<p>Zip: '.$zip.'</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validate And Display</title>
</head>
<body>
    <div class="container">
        <h1>Registeration Form</h1>
        <form action="" method="POST" id="reg_form">
            <div class="form-group">
                <label for="name">Name</label><br>
                <input type="text" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="zip">Zip</label><br>
                <input type="text" name="zip" id="zip">
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" name="submit" id="submit">
            </div>
        </form>
    </div>

    
</body>
</html>