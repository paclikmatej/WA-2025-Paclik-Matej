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
                    <h2>Přihlášení uživatele</h2>
                    <hr>
                    <form action="loginScript.php" method="post">
                        <div class="form-floating">
                            <input class="form-control" name="login" type="text" placeholder="Zadejte email..."
                                data-sb-validations="required" , pattern="[A-Za-z0-9]{5,255}"
                                title="libovolná kombinace anglických písmen a číslic, min 5 znaků"
                                placeholder="Váš login" required />
                            <label for="login" class="form-label">Login (*)</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" type="password" name="password" id="password"
                                placeholder="Zadejte heslo" data-sb-validations="required"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="alespoň 8 znaků (alespoň 1 číslo, alespoň 1 malé písmeno, alespoň 1 VELKÉ PÍSMENO"
                                required />
                            <label for="password" class="form-label">Heslo (*)</label>
                        </div>
                        <br />
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <input type="submit" value="Přihlásit" name="submit" class="btn btn-primary">
                                </div>
                                <div class="col-sm">
                                    <p>Nemáte účet?</p>
                                </div>
                                <div class="col-sm">
                                    <a href="registrace.php">
                                        <button class="btn btn-primary text-uppercase disabled" id="submitButton"
                                            type="submit">Registrovat</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </main>
    <?php include "topButton.php"; ?>
</body>

</html>