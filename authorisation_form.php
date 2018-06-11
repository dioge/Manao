<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Authorisation form</title>
        <script src="js/jquery-3.3.1.js"></script>
        <noscript>
            <script>
            $(function (){
                $("#authorisation_form").submit(function (){
                    return false;
                });
            });
            </script>
        </noscript>
    </head>
    
    <body>
        <h1>Authorisation</h1>
        <p>*All fields are required</p>
        <form action="" method="post" id="authorisation_form">
            <table>
                <tr>
                    <td><label for="login">Login</label></td>
                    <td><input type="text" id="login" name="login" required></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" id="password" name="password" required></td>
                </tr>
            </table>
            <p><input type="submit" value="Submit"></p>
        </form>
        
        <br>

        <div id="result_form"></div> 

        <script src="js/ajax_authorisation.js"></script>
    </body>
</html>