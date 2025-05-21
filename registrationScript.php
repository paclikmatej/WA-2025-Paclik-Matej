<!DOCTYPE html>
<html lang="en">
<?php include "head.php"; ?>

<body>
    <!-- Responsive navbar-->
    <?php include "navbar.php"; ?>

    <!-- Main Content-->
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <br>
                    <h1 class="mt-2">Výsledek registračního procesu</h1>
                    <hr>
                    <?php
                    //Nastavení proměnných pro připojení k databázi
                    $hostName = "localhost";
                    $databaseName = "matej_paclik";
                    $userName = "root";
                    $password = "";

                    // Připojení k MySQL/MarriaDB serveru
                    $idSpojeni = mysqli_connect($hostName, $userName, $password);

                    //Připojení k DB
                    $idDB = mysqli_select_db($idSpojeni, $databaseName);

                    $login = $_POST["login"];
                    $password = $_POST["password"];
                    $password2 = $_POST["password2"];
                    $email = $_POST["email"];
                    $name = $_POST["name"];
                    $surname = $_POST["surname"];
                    $admin = 0;

                    $dotaz = mysqli_query($idSpojeni, "SELECT * FROM users WHERE login = '$login'");

                    if (mysqli_num_rows($dotaz) > 0) {
                        // Uživatel se stejným loginem již existuje
                        printf("Uživatel s tímto loginem již existuje. Zvolte prosím jiný login.");
                        printf("<p><a href='registrace.php'>Zpět na registrační formulář.</a></p>");
                    } elseif (!($password == $password2)) {
                        printf("<p class='text-danger'>Zadaná hesla se neshodují.</p>");
                        printf("<p><a href='registrace.php'>Zpět na registrační formulář.</a></p>");
                    } else {
                        printf("<p>Váš účet <b> $login </b> byl úspěšně registrován.");
                        printf("<p>Login: $login");
                        printf("<p>Email: $email");
                        printf("<p>Jméno: $name");
                        printf("<p>Příjmení: $surname");
                        printf("<p><a href='index.php'>Zpět na domovskou stránku.</p>");

                        //Uložení dat z formuláře do tabulky knihy
                        $insertQuery = "INSERT INTO users (login, password, email, name, surname, admin) VALUES ('$login',sha1('$password'),'$email','$name','$surname','$admin')";

                        //Odeslání dat
                        $sendQuery = mysqli_query($idSpojeni, $insertQuery);
                    }

                    //Ukončení spojení s DB
                    mysqli_close($idSpojeni);
                    ?>
                </div>
            </div>

        </div>
        </div>
        </div>
        </div>
    </main>
    <?php include "topButton.php"; ?>
</body>

</html>