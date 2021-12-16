<?php
include_once 'connection_database.php';


Class Class_User extends db {


    public function logIn(){


if(isset($_POST['submit_login'])){

    if(!empty($_POST['username']) || !empty($_POST['password'])){

        $user = $_POST['username'];
        $pw = $_POST['password'];


            $sql = $this->connect()->prepare("SELECT * FROM Users WHERE username = :user");

            $sql->execute(array('user' => $user));
            if($sql->rowCount()){
                $username = $sql->fetch(\PDO::FETCH_BOTH);
                $dbpass = $username[2];
            if(password_verify($pw, $dbpass)){
                session_start();
                $_SESSION['ID'] = $username[0];
                $_SESSION['username'] = $username[1];
                $_SESSION['logged_in'] = true;
                $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                header("Location: $url");
            }else{
                echo "klopt nie huh"; }
    }else{
        echo "
                <div class='alert alert-danger' role='alert' style='margin-top: 12px;margin-bottom: 2px;'>
                <strogit ging>Verkeerde gebruikersnaam of wachtwoord</strong>.
                </div>
                ";
    }


} else{
    echo "
                <div class='alert alert-danger' role='alert' style='margin-top: 12px;margin-bottom: 2px;'>
                <strong>gebruikersnaam en wachtwoord zijn verplicht</strong>.
                </div>
                ";
}
}

}


public function createAccount(){

    if(isset($_POST['submit_registration'])){

// Check of alle vakken ingevuld zijn

        if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['emailAgain']) || empty($_POST['password']) || empty($_POST['passwordAgain'])){
            
            echo "
            <div class='alert alert-danger' role='alert' style='margin-top: 12px;margin-bottom: 2px;'>
            <strong>Niet alle vakken zijn ingevuld</strong>.
            </div>
            ";
        }
        echo "yee";
// check of de username een correcte groote is


        if(strlen($_POST['username']) < 4){

            echo "
            <div class='alert alert-danger' role='alert' style='margin-top: 12px;margin-bottom: 2px;'>
            <strong>Uw gebruikersnaam is te kort</strong>.
            </div>
            ";

        }
        elseif(strlen($_POST['username']) > 23){
            echo "
            <div class='alert alert-danger' role='alert' style='margin-top: 12px;margin-bottom: 2px;'>
            <strong>Uw gebruikersnaam is te lang</strong>.
            </div>
            ";
}

// check of de emails correct zijn


        elseif (!str_contains($_POST['email'], '@') || !str_contains($_POST['email'], '.')) { 
            
            echo "
            <div class='alert alert-danger' role='alert' style='margin-top: 12px;margin-bottom: 2px;'>
            <strong>Vul een geldig emailadress in</strong>.
            </div>
        ";
}


// check of de emails correct zijn


        elseif (!str_contains($_POST['email'], '@') || !str_contains($_POST['email'], '.')) { 
            
            echo "
            <div class='alert alert-danger' role='alert' style='margin-top: 12px;margin-bottom: 2px;'>
            <strong>Vul een geldig emailadress in</strong>.
            </div>
            ";
}


// check of de emails niet gelijk zijn

        elseif($_POST['email'] != $_POST['emailAgain']){

            echo "
            <div class='alert alert-danger' role='alert' style='margin-top: 12px;margin-bottom: 2px;'>
            <strong>Emails zijn niet hetzelfde, Probeer het opnieuw</strong>.
            </div>
        ";

}

// check of het wachtwoord een getal bezit


        elseif (!preg_match('~[0-9]+~', $_POST['password'])) {
        
            echo "
            <div class='alert alert-danger' role='alert' style='margin-top: 12px;margin-bottom: 2px;'>
            <strong>Wachtwoord moet minimaal 1 getal bezitten, Probeer het opnieuw</strong>.
            </div>
            ";
        
        }
        


// check of de wachtwoorden niet gelijk zijn

        elseif($_POST['password'] != $_POST['passwordAgain']){

            echo "
            <div class='alert alert-danger' role='alert' style='margin-top: 12px;margin-bottom: 2px;'>
            <strong>Wachtwoorden zijn niet hetzelfde, Probeer het opnieuw</strong>.
            </div>
            ";
    }


// check of de wachtwoord niet te kort is

    elseif(strlen($_POST['password']) <= 8){

            echo "
            <div class='alert alert-danger' role='alert' style='margin-top: 12px;margin-bottom: 2px;'>
            <strong>Uw wachtwoord moet minimaal 8 tekens hebben</strong>.
            </div>
            ";
}
     
    else{

        
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $profile_picture = "uploads/Unkown.png"; // hiermee in de toekomst misschien users een profiel foto geven ofzo
        $options = [
            'cost' => 10
        ];
        
        $password = password_hash($password, PASSWORD_BCRYPT, $options);

        $sql = $this->connect()->prepare("INSERT INTO users (username, password, email) VALUES (?,?,?)");
        $sql->execute(array($username, $password, $email));

        echo "gelukt yo";
        
        header('Location:index.php?registration?success');

    
    }



}
    }

public function securePage($loged_in_status){
    if($loged_in_status != true){
        header('Location:index.php');
    }
}



}