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
                    <a href="../spotkania/index_dodaj.php">Dodawanie spotkań</a>
                </div>
                <div class="optionL">
                    <a href="../spotkania/index_wyswietl.php">Wyświetlanie spotkań</a>
                </div>
                <div class="optionL">
                    <a href="../spotkania/index_edit.php">Edycja spotkań</a>
                </div>
                <div class="optionL">
                    <a href="../spotkania/index_usun.php">Usuwanie spotkań</a>
                </div>
                <div class="optionL">
                    <a href="../wyloguj/index.php">WYLOGUJ</a>
                </div>
                <div style="clear:both"></div>
            </div>
            
            <div id="content">
                <span class="bigtitle">Dodawanie spotkań</span>
                <div style="height: 15px;"></div>
            <div id="form1">
                <form method="POST">
                    <label><b>ID_Klienta </b><input type="text" name="id_klient" maxlength="10" placeholder="1" required></label><br>
                    <label><b>ID_Pracownika: </b><input type="text" name="id_pracownik" maxlength="10" placeholder="1" required></label><br>
                    <label><b>Data/godzina: </b><input type="datetime-local" name="daty"required></label><br>
                    <label><b>Status: </b>
                        <select id="select" name="statusy" required>
                                <option value="przyszłe">przyszłe</option>
                                <option value="zakończone">zakończone</option>
                        </select>
                    </label><br>
                    <label><b>ID_Projektu </b><input type="text" name="id_projekt" maxlength="10" placeholder="1" required></label>
                    
                        <?php
                            if (isset($_POST['Dodaj'])){
                                $db = mysqli_connect("localhost", "root", "", "praktyki");

                                $id_klient = mysqli_real_escape_string($db, $_POST['id_klient']);
                                $id_pracownik = mysqli_real_escape_string($db, $_POST['id_pracownik']);
                                $daty = mysqli_real_escape_string($db, $_POST['daty']);
                                $statusy = mysqli_real_escape_string($db, $_POST['statusy']);
                                $id_projekt = mysqli_real_escape_string($db, $_POST['id_projekt']);
                                
                                if($db){
                                    $zapytanie = "INSERT INTO spotkanie VALUES (null,'$id_klient', '$id_pracownik', '$daty', '$statusy', '$id_projekt')";
                                    $query = mysqli_query($db, $zapytanie);
                                    
                                    if (mysqli_affected_rows($db)>0){
                                        echo "<b>Spotkanie zostało zapisane w bazie danych.</b>";
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