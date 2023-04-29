<?php
    session_start();
    if (@$_SESSION['zalogowany']){
        header("Location: ../panel/index.php");
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <title>XYZ Data</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../logo/logo.png" type="image/x-icon" />
    <meta name="description" content="Najlepsi w branży projektowej!" />
    <meta name="keywords" content="projekt" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Wiktor Patajewicz" />
    <meta name="reply-to" content="wg833@zs1.lublin.eu" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="../style/style.css" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
    <body>
        
        <div id="container">

            <div id="logo">
                XYZ DATA
            </div>

            <div id="menu">
                <div class="option">
                    <a href="../wycena/index.php">Wycena</a>
                </div>
                <div class="option">
                    <a href="../main/index.php">Strona główna</a>
                </div> 
                <div class="option">
                    <a href="../logowanie/index.php">ZALOGUJ</a>
                </div>
                <div style="clear:both"></div>
            </div>

            <div id="topbar">
                <div id="topbarL">
                    <img src="../logo/logo.png" width="200" height="200" alt="logo firmy, XYZ DATA"/>
                </div>
                <div id="topbarR">
                    Zaufaj nam, a my dołożymy wszelkich starań, by Twój projekt był tym najlepszym!
                </div>
                <div style="clear:both"></div>
            </div>

            <div id="sidebar">
                <div class="optionL">
                    <a href="../main/index.php">Strona główna</a>
                </div> 
                <div class="optionL">
                    <a href="../wycena/index.php">Wycena</a>
                </div>
                <div class="optionL">
                    <a href="../logowanie/index.php">ZALOGUJ</a>
                </div> 
                <div style="clear:both"></div>
            </div>
            
            <div id="content">
            <span class="bigtitle">Logowanie do Panelu Pracownika</span>
            <div style="height: 15px;"></div>
            <div id="form">
                <form method="post">
                    <label><b>Login: </b><input type="text" name="login" maxLength="20" placeholder="login"></label><br>
                    <label><b>Hasło: <b><input type="password" name="haslo" maxLength="50" placeholder="hasło"></label>
                        <br>
                    <input type="submit" name="zaloguj" value="Zaloguj">
                </form>
            </div>
            <div id="komunikat">
                <?php
                    if (isset($_POST['zaloguj'])){
                        $db = mysqli_connect("localhost", "root", "", "praktyki");
                        $login = mysqli_real_escape_string($db, $_POST['login']);
                        $haslo = mysqli_real_escape_string($db, $_POST['haslo']);
                        $haslo = sha1($haslo);

                        $zapytanie = "SELECT * FROM uzytkownik WHERE login = '$login' and haslo = '$haslo'";
                        $query = mysqli_query($db, $zapytanie);
                        
                        
                        if (mysqli_num_rows($query)>0){
                            $_SESSION['zalogowany'] = $login;
                            header("Location:../panel/index.php");
                        }else{
                            echo "<br>";
                            echo "<b>Błędny login lub hasło!</b>";
                        }
                        mysqli_close($db);
                    }
                ?>
            </div>
            </div>

            <div id="footer">
                Wiktor Patajewicz &copy; Wszelkie prawa zastrzeżone
            </div>

        </div>
        
        <script src="https://skrypt-cookies.pl/id/3b47e7b0756f8746.js"></script>

    </body>
</html>