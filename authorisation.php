<?php
    $dom = new domDocument("1.0", "utf-8");
    $dom->load("xml/users.xml");
    
    $root = $dom->documentElement;
    $users = $root->childNodes;
    
    for($i = 0; $i <count($users); $i++){
        
        $user = $users->item($i);
        $login = $user->childNodes->item(0)->nodeValue;
        $password = $user->childNodes->item(1)->nodeValue;
        $salt = $user->childNodes->item(2)->nodeValue;
        $name = $user->childNodes->item(4)->nodeValue;

        if(!isset($_POST['login']) || !isset($_POST['password'])){
            $result = array(
                "EmptyFields" => "Please fill out all fields.</a>."
            );
            echo json_encode($result);
            exit;
        }
        
        if($login == htmlspecialchars($_POST['login']) && (md5($salt.md5(htmlspecialchars($_POST['password']))) == $password)){
            $result = array(
                "login" => $login,
                "password" => $password,
                "name" => $name
            );
            setcookie("login", $login, time() + 3600);
            setcookie("password", $password, time() + 3600);
            session_start();
            $_SESSION["login"] = $login;
            
            echo json_encode($result);
            break;
        }elseif($i == (count($users) - 1)) {
            $result = array(
                "Error" => "Wrong username or password!"
            );
            echo json_encode($result);
            break;
        }
    }
?>
