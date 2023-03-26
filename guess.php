<?php
error_reporting(E_ERROR | E_PARSE);
    session_start();
    $Y=20; //initialisation du score.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $difficulty = $_POST["diff"];
        $_SESSION['name']=$username; /* pour garder la dernière saisie de l'utilisateur (dernière question)*/
       
     }
    // put score in a session + X est le nombre de guesses initial 
    // session count vas augmenter with 1 chaque guess , et on va faire $X-Session count pour connaitre le nombre de guesses left.
    // mettre random dans post pour ne pas donner un nouveau random chaque click.
     if($difficulty=="easy"){
           if(!isset($_POST["guess"])){
                $_SESSION["count"]=0;
                $_SESSION["Y"]=20; 
                $message ="Try to Guess";
                $_POST["random"]=rand(1,10);
                }
                $X=5;
            }
                elseif($difficulty=="medium"){
            if(!isset($_POST["guess"])){
            $_SESSION["count"]=0;
            $_SESSION["Y"]=20;
            $message ="Try to Guess";
            $_POST["random"]=rand(1,50);
            } 
            $X=10;  
            }
                elseif($difficulty=="hard"){
            if(!isset($_POST["guess"])){
            $_SESSION["count"]=0;
            $_SESSION["Y"]=20;
            $message ="Try to Guess";
            $_POST["random"]=rand(1,100);
           } 
            $X=20;
            }
        
        // Les conditions pour augmentation du SESSION count.
                       if (isset($_POST["guess"])){
                        if (isset($_POST["guess"])){
                            if($_POST["guess"] > $_POST["random"]){
                                $message = $_POST["guess"]." is too big! Try a smaller number.";
                                if(isset($_SESSION["count"])){
                                    $_SESSION["count"]++;
                                } else {
                                    $_SESSION["count"] = 1;
                                }
                            } else if ($_POST["guess"] < $_POST["random"]) {
                                $message = $_POST["guess"]." is too small! Try a larger number";
                                if(isset($_SESSION["count"])){
                                    $_SESSION["count"]++;
                                } else {
                                    $_SESSION["count"] = 1;
                                }
                            } else {
                                if(isset($_SESSION["count"])){
                                    $_SESSION["count"]++;
                                }
                                $message = "Well done! You guessed the right number in ".$_SESSION["count"] ." attempt(s)! "; 
                                unset($_SESSION["count"]);
                            }
                        }
         
                        
        //Les conditions pour diminue le Score  .            
        if($_POST["guess"] != $_POST["random"] && $difficulty=="easy"){
            $_SESSION["Y"]-=4;}elseif($_POST["guess"] != $_POST["random"] && $difficulty=="medium"){
                $_SESSION["Y"]-=2;
            }elseif($_POST["guess"] != $_POST["random"] && $difficulty=="medium")
            {$_SESSION["Y"]-=1;}

        //le champ de saisie doit étre toujours initialisé avec la derniére valeur saisie par l'utilisateur dernière question.
        if (!isset($inputValue)){
            $inputValue = '';
        $inputValue = $_POST['guess'];

        // Store the input value in a session
        $_SESSION['guess'] = $inputValue;
              }}
        // changer button name to Restart après utiliser tous guesses
        if(($X-$_SESSION["count"])==0 || $_POST["random"]==$_SESSION['guess']){
            $newname="Restart";
             }else{
            $newname="Guess"; }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GUESS GAME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid vh-100 w-100 bg-dark text-white p-5" style=" text-align: center;">
        <form action="" method="POST">
            <legend class="display-3">GUESS THE NUMBER</legend>
            <strong class="display-6">
                <?php 
                echo "Hi " . $username . " , You chose : " . $difficulty . "<br>";
                echo "Your score now is: " . $_SESSION["Y"] . "<br>";
                if (isset($_SESSION["count"])) {
                    echo "you still have " . ($X - $_SESSION["count"]) . " guesses left.<br>";
                    echo "<br>";
                    $inputValue = '';
                    if (isset($_POST['guess'])) {
                        $inputValue = $_POST['guess'];
                    }
                    echo "<input type='number' name='guess' required value='" . $inputValue . "' ";
                    if (($X-$_SESSION["count"])==0 || $_POST["random"]==$_SESSION['guess']) {
                        
                        echo "disabled='disabled'";
                       
                    }
                    echo "><br>";
                }
                echo "<input type='hidden' name='random' value='" . $_POST["random"] . "'>";
                echo "<input type='hidden' name='diff' value='" . $difficulty . "'>";
                echo "<input type='hidden' name='username' value='" . $username . "'><br>";
                echo "<button type='submit' class='btn btn-outline-warning btn-lg'  >" . $newname . "</button>";
                echo "<br>";
                ?>
            </strong>
            <h4><?php echo $message;?></h4>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>
