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
                    <a href="../zespoly/index_dodaj.php">Dodawanie zespołów</a>
                </div>
                <div class="optionL">
                    <a href="../zespoly/index_wyswietl.php">Wyświetlanie zespołów</a>
                </div>
                <div class="optionL">
                    <a href="../zespoly/index_edit.php">Edycja zespołów</a>
                </div>
                <div class="optionL">
                    <a href="../zespoly/index_usun.php">Usuwanie zespołów</a>
                </div>
                <div class="optionL">
                    <a href="../wyloguj/index.php">WYLOGUJ</a>
                </div>
                <div style="clear:both"></div>
            </div>
            
            <div id="content">
                <span class="bigtitle">Wyświetlanie zespołów</span>
                <div style="height: 15px;"></div>
                <form method="POST">
                    <input type="submit" name="Wyswietl_all" value="Wyświetl wszystkie zespoły">
                </form>
                <br><br>
                <?php
                    if (isset($_POST['Wyswietl_all'])){
                        $db = mysqli_connect("localhost", "root", "", "praktyki");
                        
                        if($db){
                            $zapytanie = "SELECT * FROM zespoly";
                            $query = mysqli_query($db, $zapytanie);
                            
                            echo"<table>";
                            echo "<tr>";
                                    echo "<td>" . '<b>ID Zespołu</b>'. "</td>";
                                    echo "<td>" . '<b>Nazwa zespołu</b>' . "</td>";
                                echo "</tr>";

                            while($row = mysqli_fetch_array($query)){
                                echo "<tr>";
                                    echo "<td>" . $row['id_zespol'] . "</td>";
                                    echo "<td>" . $row['nazwa_zespolu'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        }else{
                            echo "<b>Błąd połączenia z bazą danych</b>";
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