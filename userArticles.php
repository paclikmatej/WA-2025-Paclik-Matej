<!DOCTYPE html>
<html lang="en">
<?php include "head.php"; ?>

<body>
    <!-- Responsive navbar-->
    <?php include "navbar.php"; ?>

    <!-- Page Header-->
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <br>
                    <h1>Články našich uživatelů</h1>
                    <hr>
                    </header>
                    <!-- Main Content-->
                    <main class="mb-4">
                        <div class="container px-4 px-lg-5">
                            <div class="row gx-4 gx-lg-5 justify-content-center">
                                <!--<div class="col-md-10 col-lg-8 col-xl-7">-->
                                <div class="bg-light rounded">
                                    <?php
                                    //Nastavení proměnných pro připojení k databázi
                                    $hostName = "localhost";
                                    $databaseName = "matej_paclik";
                                    $userName = "root";
                                    $password = "";

                                    //Připojení k MySQL/MarriaDB serveru
                                    $idSpojeni = mysqli_connect($hostName, $userName, $password);

                                    //Připojení k DB
                                    $idDB = mysqli_select_db($idSpojeni, $databaseName);

                                    $insertQuery = "SELECT * FROM article ";

                                    $sendQuery = mysqli_query($idSpojeni, $insertQuery);

                                    while ($row = mysqli_fetch_assoc($sendQuery)) {
                                        echo
                                            "<div class='post-preview'>
                                                <div class='inner'>
                                                    <header class='align-center'>
                                                        <h3 class='post-title'><b>" . $row['name'] . "</b></h3>
                                                        <p class='post-subtitle'><b>Podnadpis: </b> " . $row['title'] . "</p>
                                                        <p><b>Autor:</b> <h7 class='post-meta'>" . $row['author'] . "</h7></p>
                                                        <p><b>Obsah: </b>" . $row['description'] . "</p>
                                                        <hr>
                                                    </header>
                                                </div>
                                            </div>";
                                    }
                                    //Ukončení spojení s DB
                                    mysqli_close($idSpojeni);
                                    ?>
                                </div>
                                <!-- Explanation -->
                                <p><a href=index.php>Zpět na domovskou stránku</a></p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </main>
</body>

</html>