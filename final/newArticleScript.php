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
                </div>
            </div>
        </div>
    </div>
    </header>
    <!-- Main Content-->
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="my-2">
                        <h2>Do databáze byly uloženy tyto hodnoty:</h2>
                        <hr>
                        <?php
                        $name = $_POST["name"];
                        printf("<p>Název článku: $name");

                        $author = $_POST["author"];
                        printf("<p>Autor článku: $author");

                        $title = $_POST["title"];
                        printf("<p>Titulek článku: $title");

                        $category = $_POST["category"];
                        printf("<p>Kategorie článku: $category");

                        $subcategory = $_POST["subcategory"];
                        printf("<p>Podkategorie článku: $subcategory");

                        $description = $_POST["description"];
                        printf("<p>Obsah článku: $description ");

                        $user_id = $_POST["user_id"];
                        printf("<p>ID user: $user_id");
                        ?>
                    </div>
                    <hr>
                    <p><a href='index.php'>Zpět na domovskou stránku.</p>
                </div>
            </div>
        </div>
        </div>
        </div>
    </main>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <?php
    //Nastavení proměnných pro připojení k databázi
    $hostName = "localhost";
    $databaseName = "matej_paclik"; //jmenéno celé DB
    $userName = "root";
    $password = "";

    // Připojení k MySQL/MarriaDB serveru
    $idSpojeni = mysqli_connect($hostName, $userName, $password);

    //Připojení k DB
    $idDB = mysqli_select_db($idSpojeni, $databaseName);

    //Uložení dat z formuláře do tabulky knihy, (article název tabulky, je potřeba mít stejné a stejně parametrů name,author,.. jako ve VALUES)
    $insertQuery = "INSERT INTO article (name, author, title, category, subcategory, description, user_id) VALUES ('$name', '$author', '$title', '$category', '$subcategory', '$description', '$user_id') ";

    //Odeslání dat
    $sendQuery = mysqli_query($idSpojeni, $insertQuery);

    //Ukončení spojení s DB
    mysqli_close($idSpojeni);
    ?>
    <?php include "topButton.php"; ?>
</body>

</html>