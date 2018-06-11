<?php

    $dom = new domDocument("1.0", "utf-8");
    $dom->load("xml/users.xml");
    
    $root = $dom->documentElement;
    $users = $root->childNodes;

    $post_login = htmlspecialchars($_POST['login']);
    $post_password = htmlspecialchars($_POST['password']);
    $post_confirm_password = htmlspecialchars($_POST['confirm_password']);
    $post_email = htmlspecialchars($_POST['email']);
    $post_name = htmlspecialchars($_POST['name']);
    
    if(!isset($post_login) || !isset($post_password) || !isset($post_confirm_password) || !isset($post_email) || !isset($post_name)){
        $result = array(
            "EmptyFields" => "Please fill out all fields.</a>."
        );
        echo json_encode($result);
        exit;
    }

    if(count($users) == 0){
        $login = $dom->createElement('login', $post_login);
    }else{        
        for($i = 0; $i <count($users); $i++){
            
            $user = $users->item($i);
            $login = $user->childNodes->item(0)->nodeValue;

            if($login == $post_login){
                $result = array(
                    "LoginError" => "That username is taken. Please try another."
                );
                echo json_encode($result);
                exit;
            }elseif($i == (count($users) - 1))
                $login = $dom->createElement('login', $post_login);
        }
    }

    if(count($users) == 0){
        $email = $dom->createElement('email', $post_email);
    }else{        
        for($i = 0; $i <count($users); $i++){
            
            $user = $users->item($i);
            $email = $user->childNodes->item(3)->nodeValue;

            if($email == $post_email){
                $result = array(
                    "EmailError" => "Username with such email is already exist. Please <a href='authorisation_form.php'>log in</a>."
                );
                echo json_encode($result);
                exit;
            }elseif($i == (count($users) - 1))
                $email = $dom->createElement('email', $post_email);
        }
    }
        
    if($post_password !== $post_confirm_password){
        $result = array(
            "PasswordError" => "Password does not match the Confirm Password. Please try again."
        );
        echo json_encode($result);
        exit;
    }else{
        for($i=0; $i<10; $i++) {
            $salt .= chr(rand(65, 90));
        }
        $password = $dom->createElement('password', md5($salt.md5($post_password)));
        $salt = $dom->createElement('salt', $salt);
    }
    
    $name = $dom->createElement('name', $post_name);
    
    $user = $dom->createElement('user');
    for ($i = 0; $i <=count($users); $i++){
        $id = $i + 1;
        $user->setAttribute('id', $id);
    } 
    $user->appendChild($login);
    $user->appendChild($password);
    $user->appendChild($salt);
    $user->appendChild($email);
    $user->appendChild($name);
    $root->appendChild($user);
 
    $dom->save("xml/users.xml");
    
    $result = array(
        "Success" => "Thank you for registration. Please <a href='authorisation_form.php'>log in</a>."
    );
    echo json_encode($result);
?>