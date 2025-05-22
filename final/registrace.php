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
                    <h2>Registrace uživatele</h2>
                    <hr>
                    <form action="registrationScript.php" method="post" onsubmit="return validaceHesla()">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="login" id="login" pattern="[A-Za-z0-9]{5,255}"
                                title="libovolná kombinace anglických písmen a číslic, min 5 znaků"
                                placeholder="Login (*)" required>
                            <label for="login">Login (*)</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" name="password" id="password"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="alespoň 8 znaků (alespoň 1 číslo, alespoň 1 malé písmeno, alespoň 1 VELKÉ PÍSMENO"
                                placeholder="Heslo (*)" required>
                            <label for="password">Heslo (*)</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" name="password2" id="password2"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="alespoň 8 znaků (alespoň 1 číslo, alespoň 1 malé písmeno, alespoň 1 VELKÉ PÍSMENO"
                                placeholder="Heslo (*)" required>
                            <label for="password2">Zopakujte heslo (*)</label>
                        </div>
                        <div class="form-floating">
                            <input type="email" class="form-control" name="email" id="email" required
                                placeholder="Email (*)">
                            <label for="email">Email (*)</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Jméno">
                            <label for="name">Jméno</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="surname" placeholder="Příjmení" id="surname">
                            <label for="surname">Příjmení</label>
                        </div>
                        <br>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <input type="submit" value="Registrovat" name="submit" class="btn btn-primary">
                                </div>
                    </form>
                    <div class="col-sm">
                        <p>Již u nás máte účet?</p>
                    </div>
                    <div class="col-sm">
                        <a href="loginRegistration.php">
                            <button class="btn btn-primary text-uppercase disabled">Přihlásit</button></a>
                    </div>
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