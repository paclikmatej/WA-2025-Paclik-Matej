<?php
session_start();
?>

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Vývoj mobilních aplikací - Nový článek</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />

    <script>
        var objekty = {
            "Problematika": {
                "Optimalizace": [""],
                "Paměť": [""],
                "Zabezpečení": [""],
                "Jiné": [""]
            },
            "Platformy": {
                "Android": [""],
                "iOS": [""],
                "Jiné": [""]
            },
            "Nové možnosti": {
                "Jazyky": [""],
                "Jiné": [""]
            },
            "Dotazy": {
                "Pomoc": [""],
                "Jiné": [""]
            }
        }

        window.onload = function () {
            var categorySel = document.getElementById("category");
            var subcategorySel = document.getElementById("subcategory");

            for (var x in objekty) {
                categorySel.options[categorySel.options.length] = new Option(x, x);
            }
            categorySel.onchange = function () {
                subcategorySel.length = 1;
                for (var y in objekty[this.value]) {
                    subcategorySel.options[subcategorySel.options.length] = new Option(y, y);
                }
            }
        }      
    </script>
</head>

<body>
    <!-- Responsive navbar-->
    <?php include "navbar.php"; ?>

    <!-- Page Header-->
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <br>
                    <h1>Nový článek</h1>
                    <hr>
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
                    <div class="my-5">
                        <?php
                        @$user_id = $_SESSION['userID'];
                        $sql = "SELECT user_id FROM users WHERE user_id = '$user_id'";
                        // Kontrola, zda je uživatel přihlášen
                        if (isset($_SESSION['loggedUser'])) {
                            $login = $_SESSION['loggedUser'];
                            $admin = $_SESSION['admin'];
                            ?>

                            <p>Napiště nám něco o vývoji aplikací nebo cokoliv ostatním chcete sdělit.</p>
                            <form action="newArticleScript.php" method="post">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" placeholder="Název článku" required>
                                    <label for="name">Název článku (*)</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" class="form-control" name="author" value="<?php echo $login; ?>"
                                        readonly>
                                    <label>Autor článku</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" class="form-control" name="user_id" value="<?php echo $user_id; ?>"
                                        readonly>
                                    <label>Uživatel</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" name="title" class="form-control" placeholder="titulek článku"
                                        required>
                                    <label>Titulek článku (*) </label>
                                </div>
                                <br>
                                <div class="form-floating">
                                    Kategorie článku <select class="form-select form-select-sm"
                                        aria-label=".form-select-sm example" data-sb-validations="required" name="category"
                                        id="category">
                                        <option value="" data-sb-validations="required" selected="selected">Zvolte kategorii
                                        </option>
                                    </select>
                                    <br>
                                    Podkategorie článku <select class="form-select form-select-sm"
                                        aria-label=".form-select-sm example" data-sb-validations="required"
                                        name="subcategory" id="subcategory">
                                        <option value="" data-sb-validations="required" selected="selected">Zvolte
                                            podkategorii</option>
                                    </select>
                                </div>
                                <br>
                                <label for="message">Obsah článku (*)</label>
                                <div class="form-floating">
                                    <textarea type="text" name="description" id="description" class="form-control"
                                        style="height: 12rem" data-sb-validations="required" placeholder=""
                                        required></textarea>
                                    <label for="description" class="form-label"></label>
                                </div>
                                <br>
                                <input type="submit" value="Uložit článek" name="submit" class="btn btn-primary">
                                <br><br>
                            </form>

                            <?php
                            //var_dump($_SESSION['user_id']);
                        } else {
                            echo "<p>Pro přidávání článků se musíte nejdříve <a href='loginRegistration.php' class='underline-link'> přihlásit.</a></p>";
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include "topButton.php"; ?>
</body>

</html>