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
                <span class="bigtitle">Edytowanie klientów</span>
                <div style="height: 15px;"></div>
            <div id="form1">
                <form method="POST">
                    <label><b>ID_klienta: </b><input type="text" name="id_klient" maxLength="10" placeholder="1" required></label><br>
                    <label><b>Nazwa: </b><input type="text" name="nazwa" maxlength="100" placeholder="Firma" ></label><br>
                    <label><b>Ulica: </b><input type="text" name="ulica" placeholder="Szkolna" maxlength="30" ></label><br>
                    <label><b>Numer: </b><input type="number" name="numer" placeholder="5" maxlength="10" ></label><br>
                    <label><b>Miejscowość: </b><input type="text" name="miejscowosc" placeholder="Warszawa" maxlength="30" ></label><br>
                    <label for="telefon"><b>Telefon: </b><input type="tel" id="telefon" name="telefon" placeholder="000-000-000" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" maxlength="11"></label>
                    
                    
                    <?php
                        if (isset($_POST['Edytuj'])){
                            $db = mysqli_connect("localhost", "root", "", "praktyki");
                            
                            $i = 0;
                            $id_klient = mysqli_real_escape_string($db, $_POST['id_klient']);
                            $nazwa = mysqli_real_escape_string($db, $_POST['nazwa']);
                            $ulica = mysqli_real_escape_string($db, $_POST['ulica']);
                            $numer = mysqli_real_escape_string($db, $_POST['numer']);
                            $miejscowosc = mysqli_real_escape_string($db, $_POST['miejscowosc']);
                            $telefon = mysqli_real_escape_string($db, $_POST['telefon']);
                            
                            
                            if($db){
                                $zapytanie1 = "SELECT * FROM klient";
                                $query2 = mysqli_query($db,$zapytanie1);

                                while ($row = mysqli_fetch_array($query2)){

                                    if($row['id_klient'] == $id_klient){
                                        if (!empty($_POST['nazwa'])){
                                            $nazwa = $_POST['nazwa'];  
                                        }else{
                                            $nazwa = $row['nazwa'];
                                        }
                                        if (!empty($_POST['ulica'])){
                                            $ulica = $_POST['ulica'];
                                        }else{
                                            $ulica = $row['ulica'];
                                        }
                                        if(!empty($_POST['numer'])){
                                            $numer = $_POST['numer'];
                                        }else{
                                            $numer = $row['numer'];
                                        }
                                        
                                        if(!empty($_POST['miejscowosc'])){
                                            $miejscowosc = $_POST['miejscowosc'];
                                        }else{
                                            $miejscowosc = $row['miejscowosc'];
                                        }
                                        
                                        if(!empty($_POST['telefon'])){
                                            $telefon = $_POST['telefon'];
                                        }else{
                                            $telefon = $row['telefon'];
                                        }
                                        
                                        $i += 1;

                                        $zapytanie = "UPDATE klient SET nazwa ='$nazwa', ulica = '$ulica', numer ='$numer', miejscowosc = '$miejscowosc', telefon = '$telefon' WHERE id_klient = '$id_klient'";
                                        $query = mysqli_query($db, $zapytanie);
                                        echo "<b>Dane klienta zostały zmodyfikowane.</b>";
                                    }
                                }
                                if ($i < 1){
                                    echo "<b>W bazie nie ma klienta o podanym ID.</b>";
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