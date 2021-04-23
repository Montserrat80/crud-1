<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/default.js" defer></script>
</head>
<body onload="benutzerZeigen()">
<?php $a = "test";?>
  <div id="overlay"></div>
  <div id="newFenster">
    <div id="box-header"></div>
    <button onmousedown="newFensterStarten()" id="btnClose"></button><br/><br/><br/>
      <input type="text" id="neuBenutzerName"  placeholder="Vorname"/><br/><br/>
      <input type="text" id="neuBenutzerEmail" placeholder="Email"/><br/><br/>
      <p id="meldung"></p>
    <button onmousedown="benutzerHinzufuegen()" class="btn btn-success">Benutzer Hinzufügen</button> <br/>
  </div>

  <div id="wrapper"> 
    <div id="infoContainer"></div>
  </div>
  <script type="text/javascript">
   let infoContainer = document.getElementById("infoContainer");
  
    let xmlhttp;
    if(window.XMLHttpRequest){
      xmlhttp = new XMLHttpRequest();
    }else{
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
  </script>
</body>
</html>