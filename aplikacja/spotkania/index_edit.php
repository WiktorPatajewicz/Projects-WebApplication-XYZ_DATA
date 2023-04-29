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
                <span class="bigtitle">Edytowanie spotkań</span>
                <div style="height: 15px;"></div>
            <div id="form1">
                <form method="POST">
                    <label><b>ID_Spotkania </b><input type="text" name="id_spotkanie" maxlength="10" placeholder="1" required></label><br>
                    <label><b>ID_Klienta </b><input type="text" name="id_klient" maxlength="10" placeholder="1"></label><br>
                    <label><b>ID_Pracownika: </b><input type="text" name="id_pracownik" maxlength="10" placeholder="1"></label><br>
                    <label><b>Data/godzina: </b><input type="datetime-local" name="daty"></label><br>
                    <label><b>Status: </b>
                        <select id="select" name="statusy">
                                <option value="przyszłe">przyszłe</option>
                                <option value="zakończone">zakończone</option>
                        </select>
                    </label><br>
                    <label><b>ID_Projektu </b><input type="text" name="id_projekt" maxlength="10" placeholder="1"></label>    
                
                        <?php
                            if (isset($_POST['Edytuj'])){
                                $db = mysqli_connect("localhost", "root", "", "praktyki");
                                
                                $i = 0;
                                $id_spotkanie = mysqli_real_escape_string($db, $_POST['id_spotkanie']);
                                $id_klient = mysqli_real_escape_string($db, $_POST['id_klient']);
                                $id_pracownik = mysqli_real_escape_string($db, $_POST['id_pracownik']);
                                $daty = mysqli_real_escape_string($db, $_POST['daty']);
                                $statusy = mysqli_real_escape_string($db, $_POST['statusy']);
                                $id_projekt = mysqli_real_escape_string($db, $_POST['id_projekt']);
                                
                                if($db){
                                    $zapytanie1 = "SELECT * FROM spotkanie";
                                    $query2 = mysqli_query($db,$zapytanie1);

                                    while ($row = mysqli_fetch_array($query2)){

                                        if($row['id_spotkanie'] == $id_spotkanie){
                                            if (!empty($_POST['id_klient'])){
                                                $id_klient = $_POST['id_klient'];  
                                            }else{
                                                $id_klient = $row['id_klient'];
                                            }

                                            if (!empty($_POST['id_pracownik'])){
                                                $id_pracownik = $_POST['id_pracownik'];
                                            }else{
                                                $id_pracownik = $row['id_pracownik'];
                                            }

                                            if(!empty($_POST['daty'])){
                                                $daty = $_POST['daty'];
                                            }else{
                                                $daty = $row['daty'];
                                            }
                                            
                                            if(!empty($_POST['statusy'])){
                                                $statusy = $_POST['statusy'];
                                            }else{
                                                $statusy = $row['statusy'];
                                            }
                                            
                                            if(!empty($_POST['id_projekt'])){
                                                $id_projekt = $_POST['id_projekt'];
                                            }else{
                                                $id_projekt = $row['id_projekt'];
                                            }
                                            
                                            $i += 1;

                                            $zapytanie = "UPDATE spotkanie SET id_klient ='$id_klient', id_pracownik = '$id_pracownik', daty ='$daty', statusy = '$statusy', id_projekt = '$id_projekt' WHERE id_spotkanie = '$id_spotkanie'";
                                            $query = mysqli_query($db, $zapytanie);
                                            echo "<b>Spotkanie zostało zmodyfikowane</b>";
                                        }
                                    }   
                                    if ($i < 1){
                                        echo "<b>W bazie nie ma spotkania o podanym ID</b>";
                                    }
                                                
                                }else{
                                    echo "<b>Błąd połączenia z bazą danych</b>";
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