<?php
if (!isset($_COOKIE['login']) && !isset($_COOKIE['password'])) {
   header('Location: index.php');
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
   <div class="container my-5">
      <h2 class="text-center">Ulubione</h2>
      <div class="row flex-lg-row g-5 mt-3 px-5">
         <?php 
         if(!isset($_COOKIE['fav'])) echo "<h3>Nie masz ulubionych</h3>";
         else {
            $fav_arr = json_decode($_COOKIE['fav'], true);
            $desc_arr = json_decode($_COOKIE['desc'], true);
            for ($i = 0; $i < count($fav_arr); $i++) {
               echo '<div class="col"> <div class="card">
                  <div class="card-body text-center">
                     <p><img class="img-fluid py-3" src="image/'.$fav_arr[$i].'.svg" alt="card image"></p>
                     <h4 class="card-title">'.$fav_arr[$i].'</h4>
                     <p class="card-text">'.$desc_arr[$i].'</p>
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
            </div>';
           }
         }
         ?>
      </div>

      <footer class="text-center mt-5 mb-2">
         Made by <br>Martyna Plutowska, Julia Przewodowska, Beata Ossowska
      </footer>
</body>

</html>