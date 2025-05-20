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

if (isset($_REQUEST['deleteID'])) {
    $deleteID = $_REQUEST['deleteID'];
    $deleteQuery = mysqli_query($idSpojeni, "DELETE FROM article WHERE id ='$deleteID'");
}

if (isset($_REQUEST['updateID'])) {
    $updateID = $_REQUEST['updateID'];
    $updateSelect = mysqli_query($idSpojeni, "SELECT name, author, title, category, subcategory, description FROM article WHERE id ='$updateID'");
    $updateCound = mysqli_num_rows($updateSelect);
    $updateDetail = mysqli_fetch_array($updateSelect);
}

if (isset($_REQUEST['submit'])) {
    $name = $_REQUEST['name'];
    $author = $_REQUEST['author'];
    $title = $_REQUEST['title'];
    $category = $_REQUEST['category'];
    $subcategory = $_REQUEST['subcategory'];
    $description = $_REQUEST['description'];

    $updateQuery = mysqli_query($idSpojeni, "UPDATE article SET name='$name', author='$author', title='$title', category='$category', subcategory='$subcategory', description='$description' WHERE id='$updateID'");

    header('location: updateDeleteArticle.php');
}
?>
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
                    <h1>Úprava článku</h1>
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

                <?php
                if (isset($_SESSION['loggedUser'])) {
                    $login = $_SESSION['loggedUser'];
                    $admin = $_SESSION['admin'];
                    if ($admin == 1 && isset($_SESSION['loggedUser'])) {
                        printf("<p>Jste přihlášen jako <b> $login </b>, můžete mazat a upravovat všechny příspěvky i příspěvky ostatních uživatelů.</p>");
                    } else {
                        printf("<p>Jste přihlášen jako <b> $login </b>, můžete editovat a mazat své články.</p>");
                    }
                } else {
                    printf("<p>Nejste přihlášen, pro přidávání nebo editování článků se prosím <a href='loginRegistration.php' class='underline-link'> přihlašte.</a></p>");
                }

                if (isset($_REQUEST['updateID'])) {
                    ?>
                    <hr>
                    <form method="post">
                        <p>ID editovaného článku: <?php echo ($updateID); ?>
                        <p>Počet nalezených záznamů: <?php echo ($updateCound); ?>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="name" id="name"
                                value="<?php echo ($updateDetail['name']); ?>">
                            <label for="name">Název článku (*)</label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" name="author" id="author"
                                value="<?php echo ($updateDetail['author']); ?>">
                            <label for="author" class="form-label">Autor článku</label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" name="title" id="title"
                                value="<?php echo ($updateDetail['title']); ?>">
                            <label for="title" class="form-label">Titulek článku</label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" name="category" id="category"
                                value="<?php echo ($updateDetail['category']); ?>">
                            <label for="category" class="form-label">Kategorie článku</label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" name="subcategory" id="subcategory"
                                value="<?php echo ($updateDetail['subcategory']); ?>">
                            <label for="subcategory" class="form-label">Podkategorie článku</label>
                        </div>

                        <p>Obsah článku (*)</p>
                        <div class="form-floating">
                            <textarea type="text" name="description" id="description" class="form-control"
                                style="height: 12rem" required
                                data-sb-validations="required"><?php echo ($updateDetail['description']); ?></textarea>
                            <label for="description" class="form-label"></label>
                        </div>

                        <br>
                        <input type="submit" class="btn btn-outline-success" value="Aktualizovat údaje" name="submit">
                        <br><br>
                    </form>

                    <?php
                }
                ?>
                <?php
                if (isset($_SESSION['loggedUser'])) {
                    $login = $_SESSION['loggedUser'];
                    $admin = $_SESSION['admin'];
                    $userID = $_SESSION['userID'];

                    if ($admin == 0) {
                        $insertQuery = "SELECT id, name, author, title, category, subcategory, description FROM article WHERE user_id = '$userID'";
                    } else {
                        $insertQuery = "SELECT id, name, author, title, category, subcategory, description FROM article";
                    }

                    $sendQuery = mysqli_query($idSpojeni, $insertQuery);

                    printf("<table  id='moje-article' class='table table-striped table-hover table-bordered'>
                            <thead class='table-warning'>
                                <tr>
                                    <th>ID</th>
                                    <th>Název</th>
                                    <th>Autor</th>
                                    <th>Titulek</th>
                                    <th>Kategorie</th>
                                    <th>Podkategorie</th>
                                    <th>Popisek</th>
                                    <th>Upravit</th>
                                    <th>Odstranit</th>         
                                </tr>
                            </thead>
                        ");

                    while ($radek = mysqli_fetch_row($sendQuery)) {
                        printf("<tr>");
                        for ($i = 0; $i < 7; $i++) {
                            printf("<td>" . $radek[$i] . "</td>");
                        }
                        ?>
                        <td><a href="updateDeleteArticle.php?updateID=<?php echo ($radek[0]); ?>">Upravit</a></td>
                        <td><a href="updateDeleteArticle.php?deleteID=<?php echo ($radek[0]); ?>"
                                onclick="return confirm('Skutečně chcete smazat tento článek: <b><?php echo ($radek[1]); ?></b>?')">Odstranit</a>
                        </td>

                        <?php
                        printf("</tr>");
                    }
                    printf("</table>");
                }
                mysqli_close($idSpojeni);
                ?>
            </div>
        </div>
        </div>
        </div>
        </div>
    </main>
    <?php include "topButton.php"; ?>
</body>

</html>