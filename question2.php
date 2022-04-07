<!-- Use jQuery to collect, display and validate the submitted form data. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validate And Display</title>
    <style>
        .error {
            color: red;
            font-size: 0.9rem;
        }
        .form-group {
            margin-bottom: 1rem;
        }

    </style>
</head>

<body>
    <div class="container">
        <div id="validated_data">
            
        </div>
        <h1>Registeration Form</h1>
        <form action="" id="reg_form">
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
                <input type="submit" value="Submit" id="submit">
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $('#reg_form').submit(function(e){
                e.preventDefault();
                var name = $('#name');
                var email = $('#email');
                var password = $('#password');
                var zip = $('#zip');
                validateIsEmpty(name);
                validateEmail(email);
                validatePassword(password);
                validateZip(zip);

                if(!validateIsEmpty(name) && validateEmail(email) && validatePassword(password) && validateZip(zip)){
                    // display validated data
                    $('#validated_data').html('<h2>Validated Data </h2><p>Name: '+name.val()+'</p><p>Email: '+email.val()+'</p><p>Password: '+password.val()+'</p><p>Zip: '+zip.val()+'</p>');
                }

            });
        });

        const setError = (field, error) => {
            field.siblings('.error').remove();
            field.after(error);
        }
        const validateIsEmpty = (field) => {
            if(field.val() === ''){
                field_name = field.attr('name');
                setError(field, `<div class="error">${field_name} is required</div>`);
                return true;
            }
            return false;
        }
        const validateEmail = (field) => {
            validateIsEmpty(field);
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!regex.test(field.val())){
                setError(field, '<div class="error">Invalid Email</div>');
                return false;
            }
            return true;
        }
        const validatePassword = (field) => {
            validateIsEmpty(field);
            if(field.val().length < 8){
                setError(field, '<div class="error">Password must be at least 8 characters</div>');
                return false;
            }
            return true;
        }
        const validateZip = (field) => {
            validateIsEmpty(field);
            var regex = /^\d{5}$/;
            if(!regex.test(field.val())){
                setError(field, '<div class="error">Invalid Zip COde</div>');
                return false;
            }
            return true;
        }
    </script>


</body>

</html>