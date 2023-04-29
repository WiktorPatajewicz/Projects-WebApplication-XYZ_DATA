<?php
    session_start();
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
        <script src="../main/okno.js"></script>
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
                <span class="bigtitle">Czym się zajmujemy?</span>
                <div style="height: 15px;"></div>
                <div id="mainContentPhotos">
                    <div id="first">
                        <img src="main_first.jpg" width="300" height="175" alt="Konferencja, jedna osoba stoi przy tablicy, trzy osoby siedzą przy stole, na stole dokumenty i laptopy"/>
                    </div>
                    <div id="second">
                        <img src="main_second.jpg" width="300" height="175" alt="Mężczyzna siedzi przy biurku, programuje na laptopie, obok laptopa jest tablet graficzny i kwiat."/>
                    </div>
                    <div id="third">
                        <img src="main_third.jpg" width="300" height="175" alt="Zbliżenie na ekran i klawiaturę laptopa, na ekranie kod programowania, obok laptopa leży telefon"/>
                    </div>

                </div>

                <div id="contentText1">
                    <br><br>
                    Jesteśmy firmą z wieloletnim doświadczeniem. Wykonujemy projekty od A do Z wedle wymagań klienta
                    <ul>
                        <li>Wykonywanie projektów graficznych</li>
                        <li>Tworzenie stron statycznych</li>
                        <li>Systemy zarządzania treścią CMS</li>
                        <li>Optymalizacje SEO</li>
                    </ul>
                    <button class="button"  onclick="window.location=('../wycena/index.php')">
                        Wycena projektu
                    </button>
                </div>
                
            </div>

            <div id="footer">
                Wiktor Patajewicz &copy; Wszelkie prawa zastrzeżone
            </div>

        </div>
        
        <script src="https://skrypt-cookies.pl/id/3b47e7b0756f8746.js"></script>

    </body>
</html>