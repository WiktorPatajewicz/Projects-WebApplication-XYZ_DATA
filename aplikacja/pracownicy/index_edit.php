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
                    <a href="../pracownicy/index_dodaj.php">Dodawanie pracowników</a>
                </div>
                <div class="optionL">
                    <a href="../pracownicy/index_wyswietl.php">Wyświetlanie pracowników</a>
                </div>
                <div class="optionL">
                    <a href="../pracownicy/index_edit.php">Edycja pracowników</a>
                </div>
                <div class="optionL">
                    <a href="../pracownicy/index_usun.php">Usuwanie pracowników</a>
                </div>
                <div class="optionL">
                    <a href="../wyloguj/index.php">WYLOGUJ</a>
                </div>
                <div style="clear:both"></div>
            </div>
            
            <div id="content">
                <span class="bigtitle">Edytowanie pracowników</span>
                <div style="height: 15px;"></div>
            <div id="form1">
            <form method="POST">
                    <label><b>ID Pracownika </b><input type="text" name="id_pracownik" maxlength="10" placeholder="1" required></label><br>
                    <label><b>Nazwisko: </b><input type="text" name="nazwisko" placeholder="Kowalski" maxlength="20" ></label><br>
                    <label><b>Imię: </b><input type="text" name="imie" maxlength="20" placeholder="Jan" ></label><br>
                    <label><b>PESEL: </b><input type="text" name="pesel" pattern="[0-9]{11}"  maxlength="11" placeholder="000000000"></label><br>
                    <label><b>ID Stanowiska: </b><input type="text" name="id_stanowisko" maxlength="10" placeholder="1" ></label><br>
                    <label><b>ID Zespołu: </b><input type="text" name="id_zespol"  maxlength="10" placeholder="1" r></label>

                    <?php
                        if (isset($_POST['Edytuj'])){
                            $db = mysqli_connect("localhost", "root", "", "praktyki");
                            
                            $i = 0;
                            $id_pracownik = mysqli_real_escape_string($db, $_POST['id_pracownik']);
                            $nazwisko = mysqli_real_escape_string($db, $_POST['nazwisko']);
                            $imie = mysqli_real_escape_string($db, $_POST['imie']);
                            $pesel = mysqli_real_escape_string($db, $_POST['pesel']);
                            $id_stanowisko = mysqli_real_escape_string($db, $_POST['id_stanowisko']);
                            $id_zespol = mysqli_real_escape_string($db, $_POST['id_zespol']);
                            
                            
                            if($db){
                                $zapytanie1 = "SELECT * FROM pracownik";
                                $query2 = mysqli_query($db,$zapytanie1);

                                while ($row = mysqli_fetch_array($query2)){

                                    if($row['id_pracownik'] == $id_pracownik){

                                        if (!empty($_POST['nazwisko'])){
                                            $nazwisko = $_POST['nazwisko'];
                                        }else{
                                            $nazwisko = $row['nazwisko'];
                                        }

                                        if (!empty($_POST['imie'])){
                                            $imie = $_POST['imie'];  
                                        }else{
                                            $imie = $row['imie'];
                                        }

                                        if(!empty($_POST['pesel'])){
                                            $pesel = $_POST['pesel'];
                                        }else{
                                            $pesel = $row['pesel'];
                                        }
                                        
                                        if(!empty($_POST['id_stanowisko'])){
                                            $id_stanowisko = $_POST['id_stanowisko'];
                                        }else{
                                            $id_stanowisko = $row['id_stanowisko'];
                                        }
                                        
                                        if(!empty($_POST['id_zespol'])){
                                            $id_zespol = $_POST['id_zespol'];
                                        }else{
                                            $id_zespol = $row['id_zespol'];
                                        }
                                        
                                        
                                        $i += 1;

                                        $zapytanie = "UPDATE pracownik SET  nazwisko = '$nazwisko', imie ='$imie', pesel ='$pesel', id_stanowisko = '$id_stanowisko', id_zespol = '$id_zespol' WHERE id_pracownik = '$id_pracownik'";
                                        $query = mysqli_query($db, $zapytanie);
                                        echo "<b>Dane pracownika zostały zmodyfikowane</b>";
                                    } 
                                }  
                                if ($i == 0){
                                    echo "<b>W bazie nie ma pracownika o podanym ID</b>";
                                }             
                            }else{
                                echo "Błąd połączenia z bazą danych";
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