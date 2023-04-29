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
                <span class="bigtitle">Formularz wyceny projektu</span>
                <div style="height: 15px;"></div>
                
                    <form action="*">
                        <label><b>Projekt graficzny: </b></label>
                            <input type="radio" id="Proj_graf_t" name="PROJEKT" /> Tak (500,00 zł)
                            <input type="radio" id="Proj_graf_n" name="PROJEKT" /> Nie
                    <br><br>
                        <label><b>Ilość podstron statycznych: </b></label> 
                            <input type="number" id="podstrony" min="1" max="20" placeholder="(50,00zł/szt)" required/> 
                    <br>
                        <label><b>System zarządzania treścią CMS: </b></label>
                            <input type="radio" id="CMS_t" name="CMS" /> Tak (1200,00 zł)
                            <input type="radio" id="CMS_n" name="CMS" /> Nie (600,00 zł)
                    <br><br>
                        <label><b>Optymalizacja SEO: </b></label>
                            <input type="radio" id="SEO_t" name="SEO" /> Tak (600,00 zł)
                            <input type="radio" id="SEO_n" name="SEO" /> Nie
                    <br><br>
                        <label><b>Czas wykonania: </b></label>
                            <input type="radio" id="CZAS_e" name="CZAS"/> Ekspres (+20%)
                            <input type="radio" id="CZAS_s" name="CZAS"/> Standard
                    <br><br>
                            <input type="button" value ="Oblicz" id="przycisk">
                    </form>
                    <p id="wynik"></p>
                    <script src="wycena.js"></script>
                    
                </div>
            
            

            <div id="footer">
                Wiktor Patajewicz &copy; Wszelkie prawa zastrzeżone
            </div>

        </div>
        
        <script src="https://skrypt-cookies.pl/id/3b47e7b0756f8746.js"></script>

    </body>
</html>