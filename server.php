<?php

  require "connection.php";

  if(isset($_GET['personen'])){
    $personen = $_GET['personen'];

    $nameID        = "nameID";
    $emailID       = "emailID";
    $aktualisieren = "aktualisieren";
    $loeschen      = "loeschen";

    $table = "";
    if($personen === "personen"){
      $bdAngaben = mysqli_query($con,"SELECT * FROM benutzer");

      $table .= '<div class="container">';
      $table .= '<table class="table table-striped table-bordered">';
      $table .= '<tr>';
      $table .= '<th>ID</th>';
      $table .= '<th>Name</th>';
      $table .= '<th>Email</th>';
      $table .= '<th></th>';
      $table .= '<th></th>';
      $table .= '</tr>';
    }
    
    while($row = mysqli_fetch_assoc($bdAngaben)){
      $table .= '<tr>';
      $table .= '<td>'. $row['id'] .'</td>';
      $table .= '<td id="'. $nameID . $row['id'] .'">'. $row['name'].'</td>';
      $table .= '<td id="'. $emailID . $row['id'] .'">'. $row['email'].'</td>';
      $table .= '<td><input id="'. $row['id'] .'" onclick="benutzerBearbeiten(this.id)" type="button" value="Bearbeiten" class="btn btn-secondary"></td>';
      $table .= '<td><input id="'. $loeschen . $row['id'] .'" onclick="benutzerLoeschen('.$row['id'].')" type="button" value="Löschen" class="btn btn-danger"></td>';
      $table .= '<td><input id="'. $aktualisieren . $row['id'] .'" onclick="benutzerAktualisieren('.$row['id'].')" type="button" value="Aktualisieren" class="btn btn-primary" style="display:none;"></td>';
      $table .= '</tr>';
    }
    $table .= '</table>';
    $table .= '<button onclick="newFensterStarten()" class="btn btn-primary">Benutzer Hinzufügen</button>';
    $table .= '</div>';
    echo $table;
  }

  if(isset($_GET['benutzerIDAktualisiert'])){
    $benutzerIDAktualisiert = $_GET['benutzerIDAktualisiert'];
    $nameAktualisiert = $_GET['nameAktualisiert'];

    if(!empty($nameAktualisiert)){
      $name = mysqli_real_escape_string($con,$nameAktualisiert);
      $antwort = mysqli_query($con,"UPDATE benutzer SET name = '$name' WHERE id = $benutzerIDAktualisiert");
    }

  }

  if(isset($_GET['benutzerIDgeloescht'])){
    $benutzerIDgeloescht = $_GET['benutzerIDgeloescht'];
    if(!empty($benutzerIDgeloescht)){
      $antwort = mysqli_query($con,"DELETE FROM benutzer WHERE id = $benutzerIDgeloescht");
    }
  }

  if(isset($_GET['neuBenutzerName']) && isset($_GET['neuBenutzerEmail'])){
    $neuBenutzerName  = $_GET['neuBenutzerName'];
    $neuBenutzerEmail = $_GET['neuBenutzerEmail'];

    if(!empty($neuBenutzerName ) && !empty($neuBenutzerEmail)){
      $antwort = mysqli_query($con,"INSERT INTO  benutzer (name, email) VALUES ('$neuBenutzerName', '$neuBenutzerEmail')");
    }
  }
  mysqli_close($con);

?>