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

$deleteID = @$_SESSION['userID'];
$deleteSelect = mysqli_query($idSpojeni, "SELECT login, password, email, name, surname, admin FROM users WHERE user_id ='$deleteID'");
$deleteCount = mysqli_num_rows($deleteSelect);
$deleteDetail = mysqli_fetch_array($deleteSelect);

if (isset($_REQUEST['delete'])) {
    $deleteID = @$_SESSION['userID'];
    $login = $_REQUEST['login'];
    //$author = $_REQUEST['password'];
    $email = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $surname = $_REQUEST['surname'];
    $admin = $_REQUEST['admin'];

    $deleteQuery = mysqli_query($idSpojeni, "DELETE FROM users WHERE user_id ='$deleteID'");

    header("Location: index.php");
}

$updateID = @$_SESSION['userID'];
$updateSelect = mysqli_query($idSpojeni, "SELECT login, password, email, name, surname, admin FROM users WHERE user_id ='$updateID'");
$updateCound = mysqli_num_rows($updateSelect);
$updateDetail = mysqli_fetch_array($updateSelect);

if (isset($_REQUEST['submit'])) {
    $login = $_REQUEST['login'];
    //$author = $_REQUEST['password'];
    $email = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $surname = $_REQUEST['surname'];
    $admin = $_REQUEST['admin'];

    $updateQuery = mysqli_query($idSpojeni, "UPDATE users SET login='$login', email='$email', name='$name', surname='$surname' WHERE user_id='$updateID'");

    header('location: changeInfo.php?zmeneno=pravda');
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
                    <h1>Úprava údajů</h1>
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
                    $id = @$_SESSION['userID'];
                    $login = $_SESSION['loggedUser'];
                    $admin = $_SESSION['admin'];
                    if ($admin == 1 && isset($_SESSION['loggedUser'])) {
                    }

                    ?>
                    <?php
                    if (isset($_REQUEST['delete'])) {
                        printf("<p>Účet byl úspěšně odstraněn.</p>");
                        printf("<a href='index.php' style='text-decoration: underline;'>Zpět na úvodní stránku.</a>");
                    }
                    if (isset($_REQUEST['zmeneno'])) {
                        printf("<p>Údaje byly úspěšně změněny.</p>");
                        printf("<a href='index.php' style='text-decoration: underline;'>Zpět na úvodní stránku.</a>");
                    } else {
                        ?>
                        <p>ID uživatele: <?php echo ($updateID); ?>

                        <form method="post">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="login" id="login" pattern="[A-Za-z0-9]{5,255}"
                                    title="libovolná kombinace anglických písmen a číslic, min 5 znaků"
                                    value="<?php echo ($updateDetail['login']); ?>" required>
                                <label for="login">Login (*)</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" name="password" id="password"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    title="alespoň 8 znaků (alespoň 1 číslo, alespoň 1 malé písmeno, alespoň 1 VELKÉ PÍSMENO">
                                <label for="password">Heslo (*)</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" name="password2" id="password2"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    title="alespoň 8 znaků (alespoň 1 číslo, alespoň 1 malé písmeno, alespoň 1 VELKÉ PÍSMENO">
                                <label for="password2">Zopakujte heslo (*)</label>
                            </div>
                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" id="email" required
                                    value="<?php echo ($updateDetail['email']); ?>">
                                <label for="email">Email (*)</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="name" id="name"
                                    value="<?php echo ($updateDetail['name']); ?>">
                                <label for="name">Jméno</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="surname"
                                    value="<?php echo ($updateDetail['surname']); ?>" id="surname">
                                <label for="surname">Příjmení</label>
                            </div>
                            <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <input type="submit" value="Aktualizovat" name="submit" class="btn btn-primary">
                                        <button type="delete" name="delete" class="btn btn-danger"
                                            onclick="return confirm('Skutečně chcete smazat Váš účet <?php echo $login; ?>?')">Smazat
                                            účet</button>
                                    </div>
                        </form>
                        <?php
                    }
                    ?>
                </div>
                <br>
                <br>
            <?php
                } else {
                    printf("<p>Nejste přihlášen, pro odstranění účtu nebo editování údajů se prosím <a href='loginRegistration.php'>přihlašte.</a></p>");
                }
                ?>

            <!--<a href="#" class="top">&#8593;</a>-->
        </div>
        </div>
        </div>
        </div>
        </div>
        <!-- Back to top button -->
    </main>
    <?php include "topButton.php"; ?>
</body>

</html>