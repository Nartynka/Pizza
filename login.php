<?php
if (isset($_POST['login']) && isset($_POST['password'])) {
    setcookie('login', $_POST['login']);
    setcookie('password', $_POST['password']);
    header('Location: index.php');
} else if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
    header('Location: index.php?zalogowany=true');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria Pod Kubkiem</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Work+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid pe-5">
            <a class="navbar-brand ps-4" href="./index.php">
                <img src="./image/Vector.svg" alt="pizza logo" width="31" height="38" class="d-inline-block">
                Pod Kubkiem
            </a>
            <div class="justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <?php
                    if (isset($_COOKIE['login']) && isset($_COOKIE['password']))echo '<li class="nav-item"><a class="nav-link" href="./index.php?wyloguj=true">Wyloguj sie</a></li><li class="nav-item"><a class="nav-link" href="./fav.php">Ulubione</a></li>';
                    else echo '                    <li class="nav-item">
                    <a class="nav-link" href="./login.php">Zaloguj</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./register.php">Zarejestruj</a>
                </li>' ?>
                </ul>
            </div>
        </div>
    </nav>

    </nav>
    <div class="container px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-3 justify-content-between">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="image/Pizza2.svg" class="d-block mx-lg-auto img-fluid" alt="pizza" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-auto">
                <h3 class="mb-4">Zaloguj się</h3>
                <form action="./login.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="login" placeholder="login" name="login">
                        <label for=" login">Login</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        <label for="password">Hasło</label>
                    </div>
                    <button type="submit" class="btn btn-filled btn-lg mt-3 px-4">Zaloguj</button>
                </form>
            </div>
        </div>
    </div>
    <footer class="text-center mt-5 mb-2">
            Made by <br>Martyna Plutowska, Julia Przewodowska, Beata Ossowska
        </footer>
</body>

</html>