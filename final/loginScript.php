<?php
include "head.php";
include "navbar.php";
session_start();
$login = $_POST["login"];
$usedPassword = sha1($_POST["password"]);

//Nastavení proměnných pro připojení k databázi
$hostName = "localhost";
$databaseName = "matej_paclik";
$userName = "root";
$password = "";

// Připojení k MySQL/MarriaDB serveru
$idSpojeni = mysqli_connect($hostName, $userName, $password);

//Připojení k DB
$idDB = mysqli_select_db($idSpojeni, $databaseName);

//Ověření zda uživatel v DB existuje
$selectQuery = "SELECT * FROM users WHERE login='$login' AND password='$usedPassword'";
//Odeslání dat
$dotazUzivatel = mysqli_query($idSpojeni, $selectQuery);

$pocetUzivatel = mysqli_num_rows($dotazUzivatel);

//Nacteni do pole dotazUzivatel
$detailUzivatel = mysqli_fetch_array($dotazUzivatel);
if ($pocetUzivatel == 1) {
    $_SESSION['loggedUser'] = $login;
    $_SESSION['userID'] = $detailUzivatel['user_id'];
    $_SESSION['admin'] = $detailUzivatel['admin'];
    printf("<p>Uživatel:  <b> " . $_SESSION['loggedUser'] . "</b> byl úspěšně přihlášen.");
    printf("<p><a href='index.php'>Pokračovat na úvodní stránku.</p>");

} else {
    printf("<p>Uživatel nebyl v databázi nalezen, nebo jste zadali špatné heslo.</p>");
    printf("<p><a href='loginRegistration.php'>Znovu se přihlásit</p>");
}

//Ukončení spojení s DB
mysqli_close($idSpojeni);
