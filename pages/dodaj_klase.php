<?php
require 'config.php';
?>
<?php
if(!isset($_SESSION['login']) AND !isset($_SESSION['pass'])){
    header("Location:administrator.php");
}
?>
<?php
include 'header.php';
?>
<div id="wrap">
    <div class="header">
        <!-- TITLE -->
        <h5>PROJEKT <strong> iSWOS</strong></h5>
        <!-- END TITLE -->
    </div>
    <div class="page">
        <div id="navbg">
            <div id="nav">
               <h3>Dodawanie klasy i roku skzolnego</h3>
            </div>
        </div>
        
        <div class="page-wrap">
            <div class="content">
            
                <!-- CONTENT -->
                       <?php
                             if ($_POST['send'] == 1) {
                            // Zabezpiecz dane z formularza przed kodem HTML i ewentualnymi atakami SQL Injection
                            $klasa = mysql_real_escape_string(htmlspecialchars($_POST['klasa']));
                            $RokSzkolny = mysql_real_escape_string(htmlspecialchars($_POST['RokSzkolny']));

                            $errors = ''; // Zmienna przechowująca listę błędów które wystąpiły

                            // Sprawdź, czy nie wystąpiły błędy
                            if (!$klasa || !$RokSzkolny) $errors .= '<center><h4>Musisz wypełnić wszystkie pola</h4></center><br />';
                            /**
                             * Jeśli wystąpiły jakieś błędy, to je pokaż
                             */
                            if ($errors != '') {
                                echo '<p class="error"><center><h4>Dodawanie Klasy i Roku Szkolnego nie powiodła się, popraw następujące błędy:</h4></center><br /><center>'.$errors.'</center></p>';
                            }
                            else {

                            mysql_query("INSERT INTO klasy (klasa, RokSzkolny) VALUES('$klasa', '$RokSzkolny');") or die ('<p class="error">Wystąpił błąd w zapytaniu i nie udało się zarejestrować użytkownika.</p>');

                            echo '<p class="success"><center>Dodano klasę:<b>'.$klasa.'</b> oraz rok szkolny: <b>'.$RokSzkolny.'</b>.</center></p>';
                            
                        }
                    }
                          
                        ?>
                    <form method="post" action="">
                    <center>
                    <label for="klasa"><strong>Wpisz numer klasy (np 1A):</strong><input maxlength="2" type="text" name="klasa" id="klasa" /></label><br />
                    
                    <label for="RokSzkolny"><strong>Rok Szkolny (np 2012/2013):</strong><input maxlength="4" type="text"  name="RokSzkolny" id="RokSzklny" /></label><br />

                    <input type="hidden" name="send" value="1" /> <button>Zarejestruj</button></center></form><br />
                    <br />
                    <a href="adminindex.php"><button>Zakończ dodawanie Klasy i Roku Szkolnego</button></A><br />
                    
                    <br />
                <!-- END CONTENT -->
                
            </div>
        
            <div class="footer-navigation">
            
                <ul>
                    <li><a href="http://www.men.gov.pl" title="MEN - Ministerstwo Edukacji Narodowej" onclick="this.target='_blank'">MEN - Ministerstwo Edukacji Narodowej</a></li>
                    <li><a href="http://pl.wikipedia.org/wiki/Ministerstwo_Edukacji_Narodowej" title="MEN w Wikipedii" onclick="this.target='_blank'">MEN w Wikipedii</a></li>
                    <li><a href="http://www.mnisw.gov.pl" title="Ministerstwo Nauki i Szkolnictwa Wyższego" onclick="this.target='_blank'">Ministerstwo Nauki i Szkolnictwa Wyższego</a></li>
                    <li><a href="http://www.cie.men.gov.pl/index.php/sio-wykaz-szkol-i-placowek.html" title="Wykaz szkół i placówek oświatowych">Wykaz szkół i placówek oświatowych</a></li>
                    <li><a href="http://www.men.gov.pl/podreczniki/" title="Wykaz podręczników" onclick="this.target='_blank'">Wykaz podręczników</a></li>                 
                </ul>

                
                <ul> 
                    <li><a href="http://www.wsip.pl/dla_nauczycieli/przedmioty/szkolnictwo_specjalne/aktualnosci" title="Wydawnictwo szkolne i pedagogiczne" onclick="this.target='_blank'">Wydawnictwo szkolne i pedagogiczne</a></li>
                    <li><a href="http://www.zpsb.szczecin.pl" title="Zachodniopomorska Szkoła Biznesu w Szczecinie" onclick="this.target='_blank'">Zachodniopomorska Szkoła Biznesu w Szczecinie</a></li>
                    <li><a href="http://www.edukacja.net" title="Wszystko o uczelniach wyższych oraz o maturze" onclick="this.target='_blank'">Wszystko o uczelniach wyższych oraz o maturze</a></li>
                </ul>
                
                <div class="clear"></div>
            
            </div>
            <div class="footer">
               <p>© <a href="mailto: grzesikpiotr@op.pl">Grzesik Piotr</a> and <a href="mailto: p.budniak5@gmail.com">Budniak Paweł</a> || 2013</p> 
            </div>  
        </div>
    </div>
</div>
</body>
</html>