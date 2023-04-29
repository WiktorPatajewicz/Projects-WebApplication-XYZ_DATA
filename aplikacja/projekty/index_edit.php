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
                    <a href="../projekty/index_dodaj.php">Dodawanie projektów</a>
                </div>
                <div class="optionL">
                    <a href="../projekty/index_wyswietl.php">Wyświetlanie projektów</a>
                </div>
                <div class="optionL">
                    <a href="../projekty/index_edit.php">Edycja projektów</a>
                </div>
                <div class="optionL">
                    <a href="../wyloguj/index.php">WYLOGUJ</a>
                </div>
                <div style="clear:both"></div>
            </div>
            
            <div id="content">
                <span class="bigtitle">Edytowanie projektów</span>
                <div style="height: 15px;"></div>
                <div id="form1">
                    <form method="POST">
                        <label><b>ID_projektu: </b><input type="text" name="id_projekt" maxlength="10" placeholder="1" required></label><br>
                        <label><b>Nazwa: </b><input type="text" name="nazwa" maxLength="30" placeholder="Baza danych"></label><br>
                        <label><b>Status: </b>
                            <select id="select" name="statusy">
                                    <option value="przyszły">przyszły</option>
                                    <option value="bieżący">bieżący</option>
                                    <option value="archiwalny">archiwalny</option>
                            </select>
                        </label><br><br>
                        <label><b>Data rozpoczęcia: </b><input type="date" name="data_rozpoczecia"></label><br>
                        <label><b>Data zakończenia </b><input type="date" name="data_zakonczenia"></label><br>
                        <label><b>Opis: </b><input type="text" name="opis" maxlength="1500" placeholder="Wpisz opis" ></label><br>
                        <label><b>ID Klienta: </b><input type="text" name="id_klient" maxlength="10" placeholder="1"></label><br>
                        <label><b>ID Zespołu: </b><input type="text" name="id_zespol" maxlength="10" placeholder="1"></label>
                <?php
                    if (isset($_POST['Edytuj'])){
                        $db = mysqli_connect("localhost", "root", "", "praktyki");
                        
                        $i = 0;
                        $id_projekt = mysqli_real_escape_string($db, $_POST['id_projekt']);
                        $nazwa = mysqli_real_escape_string($db, $_POST['nazwa']);
                        $statusy = mysqli_real_escape_string($db, $_POST['statusy']);
                        $data_rozpoczecia = mysqli_real_escape_string($db, $_POST['data_rozpoczecia']);
                        $data_zakonczenia = mysqli_real_escape_string($db, $_POST['data_zakonczenia']);
                        $opis = mysqli_real_escape_string($db, $_POST['opis']);
                        $id_klient = mysqli_real_escape_string($db, $_POST['id_klient']);
                        
                        if($db){
                            $zapytanie1 = "SELECT * FROM projekt";
                            $query2 = mysqli_query($db,$zapytanie1);

                            if($data_rozpoczecia>$data_zakonczenia){
                                echo "<b>Podaj poprawną datę!</b>";
                            }else{
                                while ($row = mysqli_fetch_array($query2)){
                                    if($row['id_projekt'] == $id_projekt){
                                        if (!empty($_POST['nazwa'])){
                                            $nazwa = $_POST['nazwa'];  
                                        }else{
                                            $nazwa = $row['nazwa'];
                                        }
                                        if (!empty($_POST['statusy'])){
                                            $statusy = $_POST['statusy'];
                                        }else{
                                            $statusy = $row['statusy'];
                                        }
                                        if(!empty($_POST['data_rozpoczecia'])){
                                            $data_rozpoczecia = $_POST['data_rozpoczecia'];
                                        }else{
                                            $data_rozpoczecia = $row['data_rozpoczecia'];
                                        }
                                        
                                        if(!empty($_POST['data_zakonczenia'])){
                                            $data_zakonczenia = $_POST['data_zakonczenia'];
                                        }else{
                                            $data_zakonczenia = $row['data_zakonczenia'];
                                        }
                                        
                                        if(!empty($_POST['opis'])){
                                            $opis = $_POST['opis'];
                                        }else{
                                            $opis = $row['opis'];
                                        }
                                        
                                        if(!empty($_POST['id_klient'])){
                                            $id_klient = $_POST['id_klient'];
                                        }else{
                                            $id_klient = $row['id_klient'];
                                        }
                                        
                                        $i += 1;

                                        $zapytanie = "UPDATE projekt SET nazwa ='$nazwa', statusy = '$statusy', data_rozpoczecia ='$data_rozpoczecia', data_zakonczenia = '$data_zakonczenia', opis = '$opis', id_klient = '$id_klient' WHERE id_projekt = '$id_projekt'";
                                        $query = mysqli_query($db, $zapytanie);
                                        echo "<b>Projekt został zmodyfikowany.</b>";
                                    }  
                                }
                                if ($i < 1){
                                    echo "<b>W bazie nie ma projektu o podanym ID.</b>";
                                }
                            }   
                                            
                            }else{
                                echo "<b>Błąd połączenia z bazą danych.</b>";
                            }
                        }
                    ?>
                        <br><br><input type="submit" name="Edytuj" value="Edytuj">
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