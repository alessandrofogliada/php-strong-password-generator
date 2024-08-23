<?php

// Imposto i caratteri minimo e massimo per la lunghezza della password 
$min = 8;
$max = 32;

// creo un array con all'interno tutti i caratteri di cui ho bigogno per creare la password 
$listChars = [
    'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
    '0123456789',
    "!?$%$0^+-*/（)［］イのキ="
];

// salvo in una variabile tutti i caratteri 
$allChars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!?$%$0^+-*/()［］イのキ=';

// salviamo in una variabile il numero che l'utente ha scelto 
$lunghezza_password = $_GET ["lunghezzaPassword"];

// Con una funzione utilizzeremo questo dato (lunchezza_password) per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.

function generaPassword ($allChars , $lunghezza_password){
    $psw = '';

    while(strlen($psw) < $lunghezza_password){
        $chars = getChars($allChars);
        $psw .= $chars;
    }
    return $psw;
};

function getChars($allChars){
    return $allChars [rand(0, strlen($allChars) -1 )];
};


// controllo che nell'input dato dall'utente ci sia dentro la l

if(isset ($_GET ["lunghezzaPassword"]) && !empty ($_GET ["lunghezzaPassword"])){
    // var_dump($_GET ["lunghezzaPassword"]);
    // creo un altra condizione per vedere se la lunghezza della password rispetta i criteri 
    if (($_GET ["lunghezzaPassword"]) < $min || ($_GET ["lunghezzaPassword"]) > $max){
        $output = "Errore la Password deve avere dagli $min ai $max caratteri";
    } else {
        $psw = generaPassword ($allChars , $_GET["lunghezzaPassword"]);
        $output = 'la password generata è' .htmlspecialchars($psw);
    }
}else{
        $output = "Genera una Password con almeno $min fino a $max";
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generatore di password</title>
</head>
<body>

    <div>
        <h1>
           Generatore di Password
        </h1>
    </div>

    <form action="index.php" method="GET">
        <input type="number" min="1" max="50" name="lunghezzaPassword">
        <button>Invia</button>
    </form>

    <h3>
        <?php echo $output?>
    </h3>
</body>
</html>


<!-- Descrizione
Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.
L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.

Milestone 1
Creare un form che invii in GET la lunghezza della password. 
Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
Scriviamo tutto (logica e layout) in un unico file index.php

Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale -->