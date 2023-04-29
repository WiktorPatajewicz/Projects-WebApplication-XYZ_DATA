<?php
    session_start();
    if (!$_SESSION['zalogowany']){
        header("Location: ../logowanie/index.php");
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
                    <a href="../main/index.php">Strona główna</a>
                </div> 
                <div class="option">
                    <a href="../klient/index.php">Klienci</a>
                </div>
                <div class="option">
                    <a href="../projekty/index.php">Projekty</a>
                </div>
                <div class="option">
                    <a href="../spotkania/index.php">Spotkania</a>
                </div>
                <div class="option">
                    <a href="../pracownicy/index.php">Pracownicy</a>
                </div>
                <div class="option">
                    <a href="../zespoly/index.php">Zespoły</a>
                </div>
                <div class="option">
                    <a href="../wyloguj/index.php">WYLOGUJ</a>
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
                    <a href="../klient/index_dodaj.php">Dodawanie klientów</a>
                </div>
                <div class="optionL">
                    <a href="../klient/index_wyswietl.php">Wyświetlanie klientów</a>
                </div>
                <div class="optionL">
                    <a href="../klient/index_edit.php">Edycja klientów</a>
                </div>
                <div class="optionL">
                    <a href="../klient/index_usun.php">Usuwanie klientów</a>
                </div>
                <div class="optionL">
                    <a href="../wyloguj/index.php">WYLOGUJ</a>
                </div>
                <div style="clear:both"></div>
            </div>
            
            <div id="content">
                <span class="bigtitle">Dodawanie klienta</span>
                <div style="height: 15px;"></div>
            <div id="form1">
                <form method="POST">
                    <label><b>Nazwa: </b><input type="text" name="nazwa" maxlength="100" placeholder="Firma" required></label><br>
                    <label><b>Ulica: </b><input type="text" name="ulica" placeholder="Szkolna" maxlength="30" required></label><br>
                    <label><b>Numer: </b><input type="number" name="numer" placeholder="5" maxlength="10" required></label><br>
                    <label><b>Miejscowość: </b><input type="text" name="miejscowosc" placeholder="Warszawa" maxlength="30" required></label><br>
                    <label for="telefon"><b>Telefon: </b><input type="tel" id="telefon" name="telefon" placeholder="000-000-000" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" maxlength="11" required></label>
                <?php
                    if (isset($_POST['Dodaj'])){
                        $db = mysqli_connect("localhost", "root", "", "praktyki");

                        $nazwa = mysqli_real_escape_string($db, $_POST['nazwa']);
                        $ulica = mysqli_real_escape_string($db, $_POST['ulica']);
                        $numer = mysqli_real_escape_string($db, $_POST['numer']);
                        $miejscowosc = mysqli_real_escape_string($db, $_POST['miejscowosc']);
                        $telefon = mysqli_real_escape_string($db, $_POST['telefon']);
                        
                        if($db){
                            $zapytanie = "INSERT INTO klient VALUES (null,'$nazwa', '$ulica', '$numer', '$miejscowosc', '$telefon')";
                            $query = mysqli_query($db, $zapytanie);
                            
                            if (mysqli_affected_rows($db)>0){
                                echo "<b>Dane klienta zostały zapisane w bazie danych.</b>";
                            }else{
                                echo "<b>Błąd zapisu danych!</b>";
                            }
                        }else{
                            echo "<b>Błąd połączenia z bazą danych</b>";
                        }   
                        mysqli_close($db);
                    }
                ?>
                    <br><br><input type="submit" name="Dodaj" value="Dodaj">     
                </form>
            </div> 
            </div>

            <div id="footer">
                Wiktor Patajewicz &copy; Wszelkie prawa zastrzeżone
            </div>

        </div>
        
        <script src="https://skrypt-cookies.pl/id/3b47e7b0756f8746.js"></script>

    </body>
</html>