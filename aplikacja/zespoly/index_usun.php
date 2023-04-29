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
                <span class="bigtitle">Usuwanie zespołów</span>
                <div style="height: 15px;"></div>

                <div id="form2">
                <h3><b>Wyszukaj nazwę zespołu, który chcesz usunąć:</b></h3>
                    <form method="POST">
                        <input type="text" name="szukajInput" maxlength="20" placeholder="zespół_1">
                        <input type="submit" name="szukaj" value="Szukaj"><br>
                    </form>
                </div>
                
                <?php
                    if(isset($_POST['szukaj'])){

                        $db = mysqli_connect("localhost", "root", "", "praktyki");
                        $sql_all = "SELECT * FROM zespoly";
                        $query_all = mysqli_query($db, $sql_all);
                        $searchInput = $_POST['szukajInput'];

                        if($db){
                            $sql_search =  "SELECT * FROM zespoly WHERE nazwa_zespolu = '$searchInput'";
                            $query_search = mysqli_query($db, $sql_search);
        
                            if(empty($searchInput)){
                                echo "<br>";
                                echo "<b>Wpisz nazwę zespołu.</b>";
                            }else if (mysqli_num_rows($query_search) == 0){
                                echo "<br>";
                                echo "<b>Taki zespół nie istnieje.</b>";
                            }else {
                                echo "<br>";
                                echo"<table>";
                                    echo "<tr>";
                                        echo "<td>" . '<b>ID Zespołu</b>'. "</td>";
                                        echo "<td>" . '<b>Nazwa zespołu</b>' . "</td>";
                                    echo "</tr>";

                                while($row = mysqli_fetch_array($query_search)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id_zespol'] . "</td>";
                                        echo "<td>" . $row['nazwa_zespolu'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            }
                        }else{
                            echo "<b>Błąd połączenia z bazą danych.</b>";
                        }
                            mysqli_close($db);
                    }
                ?>
                <br><br>
                <h3><b>Wpisz ID zespolu, który chcesz usunąć:</b></h3>
                    <form method="POST">
                        <input type="text" name="id_zespol" maxlength="10" placeholder="1">
                        
                <?php
                    if (isset($_POST['Usun'])){
                        
                        $db = mysqli_connect("localhost", "root", "", "praktyki");
                        
                        if($db){

                            $id = mysqli_real_escape_string($db, $_POST['id_zespol']);
                            $zapytanie = "DELETE FROM zespoly WHERE id_zespol =". $_POST['id_zespol'];
                            $query = mysqli_query($db, $zapytanie);

                            if (empty($id)){
                                echo "<b>Podaj ID zespołu do usunięcia.</b>";
                            }else{
                                echo "<b>Zespół został usunięty.</b>";
                            }
                        }else{
                            echo "<b>Błąd połączenia z bazą danych.</b>";
                        }
                        mysqli_close($db);
                    }
                    
                ?>
                    <br><br><input type="submit" name="Usun" value="Usuń">
                </form>
            </div>

            <div id="footer">
                Wiktor Patajewicz &copy; Wszelkie prawa zastrzeżone
            </div>

        </div>
        
        <script src="https://skrypt-cookies.pl/id/3b47e7b0756f8746.js"></script>

    </body>
</html>