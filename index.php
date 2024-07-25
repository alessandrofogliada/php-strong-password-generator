<?php 

// la variabile mi restituisce la lunghezza della password decisa dall'utente 
$lenght_password = $_GET['lenght'];
var_dump ($lenght_password);
// creo una funzione che mi generi una password random della lunghezza indicata dell'utente 



function passwordGenerator(){
    for($i = 0 ; $i <= $lenght_password ; $i++) {

        // creo una variabile dove saranno inseriti i caratteri random 
        $password_assembled = [];

        // genero un numero random 
        $new_number = rand(1 , 56);
        // lo inserisco nell'array creato sopra 
        $password_assembled [] = $new_number;
        //   var_dump($new_number);

        // genero una lettera random 
        $new_letter = chr(rand(65,90));
        // lo inserisco nell'array creato sopra 
        $password_assembled [] = $new_letter;

        var_dump($password_assembled);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP STRONG PASSWORD GENERATOR</title>
</head>
<body>

<h1>PHP STRONG PASSWORD GENERATOR</h1>



<form action="index.php" method="GET">
    <h4>Scegli un numero da 8 a 32</h4>
    <input type="number" id="number" name="lenght" min="8" max="32">
    <button type="submit">Invia</button>
</form>

    
</body>
</html>

<!-- Milestone 1
Creare un form che invii in GET la lunghezza della password. 

Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.

Scriviamo tutto (logica e layout) in un unico file index.php -->

<!-- Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale -->