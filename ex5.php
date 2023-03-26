

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
    <?php 
    session_start();
    ?>
    
    
    <form action="guess.php" method="POST">
        
            <legend class="display-3">GUESS THE  NUMBER</legend>
            
            <input type="text" name="username" placeholder="Enter your name!" class="form-control-lg" size="30" value=<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?> ><br><br>
            <input type="radio" name="diff" id="easy" value="easy" >
            <label for="easy" class="display-6">Easy (1-10) with 5 guesses</label><br><br>
            <input type="radio" name="diff" id="medium" value ="medium">
            <label for="medium" class="display-6">Medium (1-50) with 10 guesses</label><br><br>
            <input type="radio" name="diff" id="hard" value="hard">
            <label for="hard" class="display-6">Hard (1-100) with 20 guesses</label><br><br>
            <button type="submit" class="btn btn-outline-warning btn-lg">Start</button>
    </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</html>
