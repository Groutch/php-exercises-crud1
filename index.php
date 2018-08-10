<!DOCTYPE html>
<html lang="en">

<head>
    <!--<meta charset="UTF-8">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Title </title>
</head>

<body>
    <?php
    echo "<h1>Liste des clients</h1>";
    try{
        $pdo = new PDO("mysql:host=den1.mysql3.gear.host;dbname=gcolyseum","gcolyseum","Gj8m8?L700Q~");
        foreach($pdo->query("SELECT * FROM clients") as $row){
            echo $row["id"]." - ".$row["lastName"]." ".$row["firstName"]."<br>";
        }
        $pdo=NULL;
    }catch(PDOException $e){
        print "Erreur:".$e->getMessage()."<br>";
        die();
    }
    
    echo "<h1>types de spectacles possibles</h1>";
    try{
        $pdo = new PDO("mysql:host=den1.mysql3.gear.host;dbname=gcolyseum","gcolyseum","Gj8m8?L700Q~");
        foreach($pdo->query("SELECT type FROM showTypes") as $row){
            echo $row["type"]."<br>";
        }
        $pdo=NULL;
    }catch(PDOException $e){
        print "Erreur:".$e->getMessage()."<br>";
        die();
    } 
    
    echo "<h1>20 premiers clients</h1>";
    try{
        $pdo = new PDO("mysql:host=den1.mysql3.gear.host;dbname=gcolyseum","gcolyseum","Gj8m8?L700Q~");
        foreach($pdo->query("SELECT * FROM clients ORDER BY id LIMIT 20") as $row){
            echo $row["id"]." - ".$row["lastName"]." ".$row["firstName"]."<br>";
        }
        $pdo=NULL;
    }catch(PDOException $e){
        print "Erreur:".$e->getMessage()."<br>";
        die();
    } 
    
    echo "<h1>Clients avec carte de fidélité</h1>";
    try{
        $pdo = new PDO("mysql:host=den1.mysql3.gear.host;dbname=gcolyseum","gcolyseum","Gj8m8?L700Q~");
        foreach($pdo->query("SELECT * FROM clients WHERE card =1") as $row){
            echo $row["id"]." - ".$row["lastName"]." ".$row["firstName"]."<br>";
        }
        $pdo=NULL;
    }catch(PDOException $e){
        print "Erreur:".$e->getMessage()."<br>";
        die();
    } 
    
    echo "<h1>Nom et le prénom de tous les clients dont le nom commence par la lettre M</h1>";
    try{
        $pdo = new PDO("mysql:host=den1.mysql3.gear.host;dbname=gcolyseum","gcolyseum","Gj8m8?L700Q~");
        foreach($pdo->query("SELECT * FROM clients WHERE lastName LIKE 'M%' ORDER BY lastName") as $row){
            echo "Nom: ".$row["lastName"]." Prenom: ".$row["firstName"]."<br>";
        }
        $pdo=NULL;
    }catch(PDOException $e){
        print "Erreur:".$e->getMessage()."<br>";
        die();
    } 
    
    echo "<h1>Titre de tous les spectacles ainsi que l'artiste, la date et l'heure</h1>";
    try{
        $pdo = new PDO("mysql:host=den1.mysql3.gear.host;dbname=gcolyseum","gcolyseum","Gj8m8?L700Q~");
        foreach($pdo->query("SELECT * FROM shows ORDER BY title") as $row){
            echo $row["title"]." par ".$row["performer"]." le ".date("d/m/Y",strtotime($row["date"]))." à ".date("H:i",strtotime($row["startTime"]))."<br>";
        }
        $pdo=NULL;
    }catch(PDOException $e){
        print "Erreur:".$e->getMessage()."<br>";
        die();
    } 
    
    echo "<h1>client avec affichage de leur carte de fidélité</h1>";
    try{
        $pdo = new PDO("mysql:host=den1.mysql3.gear.host;dbname=gcolyseum","gcolyseum","Gj8m8?L700Q~");
        foreach($pdo->query("SELECT * FROM clients") as $row){
            echo "Nom : ".$row['lastName']." Prénom : ".$row['firstName']." Date de Naissance : ".date("d/m/Y",strtotime($row['birthDate']));
            if($row['card']==1){
                echo " Carte de fidélité : Oui Numéro de carte : ".$row['cardNumber'];
            }else{
                echo " Carte de fidélité : Non";
            }
            echo "<br>";
        }
        $pdo=NULL;
    }catch(PDOException $e){
        print "Erreur:".$e->getMessage()."<br>";
        die();
    } 
    ?>
</body>

</html>
