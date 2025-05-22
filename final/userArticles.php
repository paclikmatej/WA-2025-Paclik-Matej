<?php
class Database {
    private $host = "localhost";
    private $dbname = "matej_paclik";
    private $user = "root";
    private $password = "";
    public $conn;

    public function connect() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password);
        mysqli_select_db($this->conn, $this->dbname);
        return $this->conn;
    }

    public function close() {
        mysqli_close($this->conn);
    }
}

class Article {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection;
    }

    public function getAllArticles() {
        $query = "SELECT * FROM article";
        return mysqli_query($this->conn, $query);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include "head.php"; ?>

<body>
    <?php include "navbar.php"; ?>

    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <br>
                    <h1>Články našich uživatelů</h1>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7 bg-light rounded">

                    <?php
                    $db = new Database();
                    $conn = $db->connect();

                    $articleObj = new Article($conn);
                    $articles = $articleObj->getAllArticles();

                    while ($row = mysqli_fetch_assoc($articles)) {
                        echo "<div class='post-preview'>
                                <div class='inner'>
                                    <header class='align-center'>
                                        <h3 class='post-title'><b>" . htmlspecialchars($row['name']) . "</b></h3>
                                        <p class='post-subtitle'><b>Podnadpis: </b>" . htmlspecialchars($row['title']) . "</p>
                                        <p><b>Autor:</b> <span class='post-meta'>" . htmlspecialchars($row['author']) . "</span></p>
                                        <p><b>Obsah: </b>" . nl2br(htmlspecialchars($row['description'])) . "</p>
                                        <hr>
                                    </header>
                                </div>
                              </div>";
                    }

                    $db->close();
                    ?>

                    <p><a href="index.php">Zpět na domovskou stránku</a></p>

                </div>
            </div>
        </div>
    </main>

    <?php include "topButton.php"; ?>
</body>
</html>
