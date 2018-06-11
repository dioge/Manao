<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registration form</title>
        <script src="js/jquery-3.3.1.js"></script>
        <noscript>
            <script>
            $(function (){
                $("#registration_form").submit(function (){
                    return false;
                });
            });
            </script>
        </noscript>
    </head>
    
    <body>
        <h1>Registration</h1>
        <p>*All fields are required</p>
        <form action="" method="post" id="registration_form">
            <table>
                <tr>
                    <td><label for="login">Login</label></td>
                    <td><input type="text" id="login" name="login" required></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" id="password" name="password" required></td>
                </tr>
                <tr>
                    <td><label for="confirm_password">Confirm Password</label></td>
                    <td><input type="password" id="confirm_password" name="confirm_password" required></td>
                </tr>
                <tr>
                    <td><label for="email">E-mail</label></td>
                    <td><input type="email" id="email" name="email" required></td>
                </tr>
                <tr>
                    <td><label for="name">Name</label></td>
                    <td><input type="text" id="name" name="name" required></td>
                </tr>
            </table>
            <p><input type="submit" value="Submit"></p>
        </form>
        
        <br>

        <div id="result_form"></div> 

        <script src="js/ajax_registration.js"></script>
    </body>
</html>