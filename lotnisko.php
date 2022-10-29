<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Port lotniczy</title>
    <link rel="stylesheet" href="styl5.css">
    <?php
    setcookie("ciacho", "ciacho", time() + 60 * 60 * 2);
    if (isset($_COOKIE["ciacho"])) {
        $wiadomosc = "<i>Witaj ponownie na stronie lotniska</i>";
    } else {
        $wiadomosc = "<b>Dzień dobry! Strona lotniska używa ciasteczek</b>";
    }
    ?>
</head>
<body>
<div class="banner1">
<img id="samolot" src="zad5.png" alt="logo lotnisko">
</div>
<div class="banner2">
<h1>Przyloty</h1>
</div>
<div class="banner3">
<h3>przydatne linki</h3>
<a href="kwerendy.txt">Pobierz</a>
</div>
<div class="main">
<table>
   <thead>
      <tr>
         <th>Czas</th> <th>Kierunek</th> <th>Numer rejsu</th><th>Status</th>
     <tr>
      </thead>
   <tbody>
      <?php
      $conn = mysqli_connect("localhost", "root", "", "egzamin");
      $query = "SELECT czas,kierunek,nr_rejsu,status_lotu FROM przyloty ORDER BY czas ASC";
      $result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_array($result)) {
          $czas = $row["czas"];
          $kierunek = $row["kierunek"];
          $numer = $row["nr_rejsu"];
          $status = $row["status_lotu"];
          echo "<tr>";
          echo "<td>$czas</td>";
          echo "<td>$kierunek</td>";
          echo "<td>$numer</td>";
          echo "<td>$status</td>";
          echo "</tr>";
      }
      ?>
   </tbody>
</table>
</div>
<div class="stopka">
<p><?php echo "$wiadomosc"; ?></p>
</div>
<div class="stopka2">  
Autor: Tomek Macura   
</div>
</body>
</html>