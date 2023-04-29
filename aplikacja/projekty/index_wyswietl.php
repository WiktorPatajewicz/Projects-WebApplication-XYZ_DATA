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
    <style>
        table, td
        {
            font-size: 15px;
            border: 1px solid #000;
            border-collapse: collapse;
            padding: 4px;
            text-align: left;
            margin: auto;
        }
    </style>
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
                <span class="bigtitle">Wyświetlanie projektów</span>
                <div style="height: 15px;"></div>

                <form method="POST">
                    <input type="submit" name="Wyswietl_all" value="Wyświetl wszystkie projekty">
                </form>
                <br><br>
                <?php
                    if (isset($_POST['Wyswietl_all'])){
                        $db = mysqli_connect("localhost", "root", "", "praktyki");

                        if($db){
                            $zapytanie = "SELECT * FROM projekt";
                            $query = mysqli_query($db, $zapytanie);
                            echo"<table>";
                                echo "<tr>";
                                    echo "<td>" . '<b>ID Projektu</b>'. "</td>";
                                    echo "<td>" . '<b>Nazwa</b>' . "</td>";
                                    echo "<td>" . '<b>Status</b>' . "</td>";
                                    echo "<td>" . '<b>Data rozpoczęcia</b>' . "</td>";
                                    echo "<td>" . '<b>Data zakończenia</b>' . "</td>";
                                    echo "<td>" . '<b>Opis</b>' . "</td>";
                                    echo "<td>" . '<b>ID Klienta</b>' . "</td>";
                                    echo "<td>" . '<b>ID Zespołu</b>' . "</td>";
                                echo "</tr>";

                            while($row = mysqli_fetch_array($query)){
                                echo "<tr>";
                                    echo "<td>" . $row['id_projekt'] . "</td>";
                                    echo "<td>" . $row['nazwa'] . "</td>";
                                    echo "<td>" . $row['statusy'] . "</td>";
                                    echo "<td>" . $row['data_rozpoczecia'] . "</td>";
                                    echo "<td>" . $row['data_zakonczenia'] . "</td>";
                                    echo "<td>" . $row['opis'] . "</td>";
                                    echo "<td>" . $row['id_klient'] . "</td>";
                                    echo "<td>" . $row['id_zespol'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        }else{
                            echo "<b>Błąd połączenia z bazą danych</b>";
                        }
                        mysqli_close($db);
                    }
                ?>
                <br><br>
                <div id="form2">
                <span class="bigtitle">Wyszukiwanie projektów</span>
                <h3><b>Wpisz nazwę projektu, który chcesz wyszukać:</b></h3>
                <form method="POST">
                    <input type="text" name="szukajInput" maxLength="30" placeholder="Baza danych">
                    <input type="submit" name="szukaj" value="Szukaj"><br>
                </form>
                </div>
                
                <?php
                    if(isset($_POST['szukaj'])){

                        $db = mysqli_connect("localhost", "root", "", "praktyki");
                        $sql_all = "SELECT * FROM projekt";
                        $query_all = mysqli_query($db, $sql_all);
                        $searchInput = $_POST['szukajInput'];

                        if($db){
                            $sql_search =  "SELECT * FROM projekt WHERE nazwa = '$searchInput'";
                            $query_search = mysqli_query($db, $sql_search);
        
                            if(empty($searchInput)){
                                echo "<br>";
                                echo "<b>Wpisz nazwę projektu</b>";
                            }else if (mysqli_num_rows($query_search) == 0){
                                echo "<br>";
                                echo "<b>Taki projekt nie istnieje</b>";
                            }else {
                                echo "<br>";
                                echo"<table>";
                                    echo "<tr>";
                                        echo "<td>" . '<b>ID Projektu</b>'. "</td>";
                                        echo "<td>" . '<b>Nazwa</b>' . "</td>";
                                        echo "<td>" . '<b>Status</b>' . "</td>";
                                        echo "<td>" . '<b>Data rozpoczęcia</b>' . "</td>";
                                        echo "<td>" . '<b>Data zakończenia</b>' . "</td>";
                                        echo "<td>" . '<b>Opis</b>' . "</td>";
                                        echo "<td>" . '<b>ID Klienta</b>' . "</td>";
                                        echo "<td>" . '<b>ID Zespołu</b>' . "</td>";
                                    echo "</tr>";

                                while($row = mysqli_fetch_array($query_search)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id_projekt'] . "</td>";
                                        echo "<td>" . $row['nazwa'] . "</td>";
                                        echo "<td>" . $row['statusy'] . "</td>";
                                        echo "<td>" . $row['data_rozpoczecia'] . "</td>";
                                        echo "<td>" . $row['data_zakonczenia'] . "</td>";
                                        echo "<td>" . $row['opis'] . "</td>";
                                        echo "<td>" . $row['id_klient'] . "</td>";
                                        echo "<td>" . $row['id_zespol'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            }    
                        }else{
                            echo "<br>";
                            echo "<b>Błąd połączenia z bazą danych</b>";
                        }
                        mysqli_close($db);
                    }
                ?>

                <br><br>
                <div id="form2">
                <span class="bigtitle">Projekty przyszłe/bieżące/archiwalne</span>
                <h3><b>Wybierz status projektu, by zobaczyć ich liczbę:</b></h3>
                <form method="POST">
                    <select id="select" name="szukajInput2">
                        <option value="przyszły">przyszły</option>
                        <option value="bieżący">bieżący</option>
                        <option value="archiwalny">archiwalny</option>
                    </select>
                    <input type="submit" name="szukaj2" value="Wyświetl liczbę projektów"><br><br>
                </form>
                </div>
                
                <?php
                    if(isset($_POST['szukaj2'])){
                
                    $liczenie = 0;
                    $value = $_POST['szukajInput2'];

                    $db =  mysqli_connect("localhost","root","","praktyki");

                    if($db){
                        $zap = "SELECT * FROM projekt";
                        $query = mysqli_query($db,$zap);
                        if ($value == "bieżący"){
                            while($row = mysqli_fetch_array($query)){
                                if($row['statusy'] == "bieżący"){
                                    $liczenie += 1; 
                                }
                            }
                        }elseif ($value == "archiwalny"){
                            while($row = mysqli_fetch_array($query)){
                                if($row['statusy'] == "archiwalny"){
                                    $liczenie += 1;
                                }
                            }
                        }elseif ($value == "przyszły"){
                            while($row = mysqli_fetch_array($query)){
                                if($row['statusy'] == "przyszły"){
                                    $liczenie += 1;
                                }
                            }
                        }
                        echo "<table>";
                        echo "<tr><td><b>Status</b></td><td><b>Liczba</b></td></tr>";
                        echo "<tr><td>". $value."</td>";
                        echo "<td>". $liczenie ."</td></tr>";
                        echo "</table>";
                    }else{
                        echo "Błąd polaczenia z baza danych";
                    }
                    mysqli_close($db);

                }
                    
                ?>
                
            </div>

            <div id="footer">
                Wiktor Patajewicz &copy; Wszelkie prawa zastrzeżone
            </div>

        </div>
        
        <script src="https://skrypt-cookies.pl/id/3b47e7b0756f8746.js"></script>

    </body>
</html>