<?php
session_start();
if (!isset($_POST['fav']) && !isset($_POST['desc'])){
    $fav = array();
    $desc = array();
} else {
    $fav = json_decode($_COOKIE['fav'], true);
    $desc = json_decode($_COOKIE['desc'], true);
}
if (isset($_GET['wyloguj'])) {
    setcookie('login', '', time() - 3600);
    setcookie('password', '', time() - 3600);
    unset($_COOKIE['login']);
    unset($_COOKIE['password']);
    header('Location: index.php');
}
if (isset($_GET['zalogowany'])) {
    echo "Jesteś zalogowany";
}

if (isset($_POST['fav']) && isset($_POST['desc'])) {
    $fav[] = $_POST['fav'];
    $desc[] = $_POST['desc'];
    setcookie('fav', json_encode($fav), time() + 3600);
    setcookie('desc', json_encode($desc), time() + 3600);
    header('Location: fav.php');
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
    <?php
    if (!isset($_SESSION['accepted_cookie'])) {
        echo '<div class="d-flex justify-content-center position-fixed top-50 start-50 translate-middle cookie shadow">
    <div class="d-flex flex-column align-items-center align-self-center p-5 text-center" style="z-index: 10!important;width: 20rem; background: #fff; border:none">
        <img src="https://i.imgur.com/Tl8ZBUe.png" width="50">
        <span class="mt-2 h3">Cookies!</span>
        <span class="">Ta strona używa ciasteczek</span>
        <button class="btn btn-dark mt-3 px-4" type="button" onclick="hide()">Ok</button>
    </div>
</div>';
        $_SESSION['accepted_cookie'] = true;
    }
    ?>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid pe-5">
            <a class="navbar-brand ps-4" href="./index.php">
                <img src="./image/Vector.svg" alt="pizza logo" width="31" height="38" class="d-inline-block">
                Pod Kubkiem
            </a>
            <div class="justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <?php
                    if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) echo '<li class="nav-item"><a class="nav-link" href="./index.php?wyloguj=true">Wyloguj sie</a></li><li class="nav-item"><a class="nav-link" href="./fav.php">Ulubione</a></li>';
                    else echo '<li class="nav-item">
                    <a class="nav-link" href="./login.php">Zaloguj</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./register.php">Zarejestruj</a>
                </li>' ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-3">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="image/Pizza.svg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="lh-1">Pizza.</h1>
                <h2 class="lh-1">Od zawsze i na <span class="underline">zawsze</span>!</h2>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start btn-container">
                    <button type="button" class="btn btn-filled"><a href="fav.php">Zobacz ulubione</a></button>
                    <button type="button" class="btn btn-outline btn-lg"><a href="#pizza">Zobacz wszystkie</a></button>
                </div>
            </div>
        </div>
    </div>

    <div id="pizza" class="container my-5">
        <h2 class="text-center">Wszystkie pizze</h2>
        <div class="row flex-lg-row g-5 mt-3 px-5">

            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <p><img class="img-fluid py-3" src="image/Pizza2-small.svg" alt="card image"></p>
                        <h4 class="card-title">Margherita</h4>
                        <p class="card-text">Każdy lubi i szanuje</p>
                        <form action="index.php" method="post">
                            <input style="display: none;" name="desc" value="Każdy lubi i szanuje">
                            <button type="submit" class="btn btn-outline form-btn mt-2" name="fav" value="Margherita">Dodaj do ulubionych
                                <svg class="img-fluid heart mb-1" width="24" height="20" viewBox="0 0 39 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.0367 2.43762C6.43503 2.43762 2.70336 6.13096 2.70336 10.6876C2.70336 14.366 4.16169 23.096 18.5167 31.921C18.7738 32.0774 19.069 32.1602 19.37 32.1602C19.671 32.1602 19.9662 32.0774 20.2234 31.921C34.5784 23.096 36.0367 14.366 36.0367 10.6876C36.0367 6.13096 32.305 2.43762 27.7034 2.43762C23.1017 2.43762 19.37 7.43762 19.37 7.43762C19.37 7.43762 15.6384 2.43762 11.0367 2.43762Z" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <p><img class="img-fluid py-3" src="image/hawajska-small.svg" alt="card image"></p>
                        <h4 class="card-title">Hawajska</h4>
                        <p class="card-text">Tego tu nawet nie powinno być</p>
                        <form action="index.php" method="post">
                            <input style="display: none;" name="desc" value="Tego tu nawet nie powinno być">
                            <button type="submit" class="btn btn-outline form-btn mt-2" name="fav" value="Hawajska">Dodaj do ulubionych
                                <svg class="img-fluid heart mb-1" width="24" height="20" viewBox="0 0 39 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.0367 2.43762C6.43503 2.43762 2.70336 6.13096 2.70336 10.6876C2.70336 14.366 4.16169 23.096 18.5167 31.921C18.7738 32.0774 19.069 32.1602 19.37 32.1602C19.671 32.1602 19.9662 32.0774 20.2234 31.921C34.5784 23.096 36.0367 14.366 36.0367 10.6876C36.0367 6.13096 32.305 2.43762 27.7034 2.43762C23.1017 2.43762 19.37 7.43762 19.37 7.43762C19.37 7.43762 15.6384 2.43762 11.0367 2.43762Z" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <p><img class="img-fluid py-3" src="image/Pizza2-small.svg" alt="card image"></p>
                        <h4 class="card-title">Margherita</h4>
                        <p class="card-text">Każdy lubi i szanuje</p>
                        <form action="index.php" method="post">
                            <input style="display: none;" name="desc" value="Każdy lubi i szanuje">
                            <button type="submit" class="btn btn-outline form-btn mt-2" name="fav" value="margherita">Dodaj do ulubionych
                                <svg class="img-fluid heart mb-1" width="24" height="20" viewBox="0 0 39 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.0367 2.43762C6.43503 2.43762 2.70336 6.13096 2.70336 10.6876C2.70336 14.366 4.16169 23.096 18.5167 31.921C18.7738 32.0774 19.069 32.1602 19.37 32.1602C19.671 32.1602 19.9662 32.0774 20.2234 31.921C34.5784 23.096 36.0367 14.366 36.0367 10.6876C36.0367 6.13096 32.305 2.43762 27.7034 2.43762C23.1017 2.43762 19.37 7.43762 19.37 7.43762C19.37 7.43762 15.6384 2.43762 11.0367 2.43762Z" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <p><img class="img-fluid py-3" src="image/Pizza2-small.svg" alt="card image"></p>
                        <h4 class="card-title">Margherita</h4>
                        <p class="card-text">Każdy lubi i szanuje</p>
                        <form action="index.php" method="post">
                            <input style="display: none;" name="desc" value="Każdy lubi i szanuje">
                            <button type="submit" class="btn btn-outline form-btn mt-2" name="fav" value="margherita">Dodaj do ulubionych
                                <svg class="img-fluid heart mb-1" width="24" height="20" viewBox="0 0 39 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.0367 2.43762C6.43503 2.43762 2.70336 6.13096 2.70336 10.6876C2.70336 14.366 4.16169 23.096 18.5167 31.921C18.7738 32.0774 19.069 32.1602 19.37 32.1602C19.671 32.1602 19.9662 32.0774 20.2234 31.921C34.5784 23.096 36.0367 14.366 36.0367 10.6876C36.0367 6.13096 32.305 2.43762 27.7034 2.43762C23.1017 2.43762 19.37 7.43762 19.37 7.43762C19.37 7.43762 15.6384 2.43762 11.0367 2.43762Z" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <footer class="text-center mt-5 mb-2">
            Made by <br>Martyna Plutowska, Julia Przewodowska, Beata Ossowska
        </footer>
        <script>
            function hide() {
                document.querySelector('.cookie').classList.add("d-none");
            }
        </script>
</body>

</html>