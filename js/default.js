'use strict';
  function benutzerZeigen(){
    xmlhttp.onload = function(){

    if(xmlhttp.status === 200)
      infoContainer.innerHTML = xmlhttp.responseText;
    }

    xmlhttp.open("GET","server.php?personen="+"personen",true);
    xmlhttp.send();
  }

  function benutzerBearbeiten(benutzerID){
    let nameID        = "nameID"  + benutzerID;
    let emailID       = "emailID" + benutzerID;
    let aktualisieren = "aktualisieren" + benutzerID;
    let loeschen      = "loeschen" + benutzerID;
    let bearbeitenNameId = nameID + "-bearbeiten";

    let benutzerName = document.getElementById(nameID).innerHTML;
    //let parent = document.querySelector("#" + nameID); //idm. untere Zeile
    let parent = document.getElementById(nameID);
    if(parent.querySelector("#" + bearbeitenNameId) === null){
      document.getElementById(nameID).innerHTML = '<input type="text" id = "'+bearbeitenNameId+'" value="'+benutzerName+'">';
      document.getElementById(loeschen).disabled = "true";
      document.getElementById(aktualisieren).style.display = "block";
    }
  }

  function benutzerAktualisieren(benutzerID){
    let nameAktualisiert = document.getElementById("nameID"+benutzerID+"-bearbeiten").value;
    
    xmlhttp.onload = function(){
    if(xmlhttp.status === 200)
      benutzerZeigen();
    }
    xmlhttp.open("GET","server.php?benutzerIDAktualisiert="+benutzerID+"&nameAktualisiert="+nameAktualisiert,true);
    xmlhttp.send();
  }

  function benutzerLoeschen(benutzerID){
    let antwort = confirm("Sind Sie sicher, dass Sie diesen Benutzer löschen möchten?");
    if(antwort === true){
      xmlhttp.onload = function(){
      if(xmlhttp.status === 200)
        benutzerZeigen();
      }
      xmlhttp.open("GET","server.php?benutzerIDgeloescht="+benutzerID,true);
      xmlhttp.send();
    }
  }

  let overlay = document.getElementById("overlay");
  let newFenster = document.getElementById("newFenster");

  function newFensterStarten(){
    overlay.style.opacity = .5;
    if(overlay.style.display == "block"){
      overlay.style.display = "none";
      newFenster.style.display = "none";
    }else{
      overlay.style.display = "block";
      newFenster.style.display = "block";
    }
    document.getElementById("neuBenutzerName").value = "";
    document.getElementById("neuBenutzerEmail").value = "";
  }

  function benutzerHinzufuegen(){
    document.getElementById("meldung").innerHTML = "";
    let neuBenutzerName = document.getElementById("neuBenutzerName").value;
    let neuBenutzerEmail = document.getElementById("neuBenutzerEmail").value;

    if (neuBenutzerName == "" || neuBenutzerEmail == ""){
      document.getElementById("meldung").innerHTML = "bitte alle Daten eingeben";
    }else{ 
      xmlhttp.onload = function(){
      if(xmlhttp.status === 200)
        benutzerZeigen();
      }

      xmlhttp.open("GET","server.php?neuBenutzerName="+neuBenutzerName+"&neuBenutzerEmail="+neuBenutzerEmail,true);
      xmlhttp.send();

      overlay.style.display="none";
      newFenster.style.display = "none";
    }
  }
