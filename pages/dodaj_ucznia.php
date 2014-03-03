<?php
require 'config.php';

require_once 'class/uczen.class.php';
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
               <h3>Rejestracja Ucznia</h3>
            </div>
        </div>
        
        <div class="page-wrap">
            <div class="content">
            
                <!-- CONTENT -->
                       <?php

                        /**
                         * Sprawdź czy formularz został wysłany
                         */
                        if ($_POST['send'] == 1) {
                            // Zabezpiecz dane z formularza przed kodem HTML i ewentualnymi atakami SQL Injection
                            $imie = mysql_real_escape_string(htmlspecialchars($_POST['imie']));
                            $imie2 = mysql_real_escape_string(htmlspecialchars($_POST['imie2']));
                            $nazwisko = mysql_real_escape_string(htmlspecialchars($_POST['nazwisko']));
                            $data_urodzenia = mysql_real_escape_string(htmlspecialchars($_POST['data_urodzenia']));
                            $telefon = mysql_real_escape_string(htmlspecialchars($_POST['telefon']));
                            $idklasy = mysql_real_escape_string(htmlspecialchars($_POST['idklasy']));
                            $email = mysql_real_escape_string(htmlspecialchars($_POST['email']));
                            $imieopiekun = mysql_real_escape_string(htmlspecialchars($_POST['imieopiekun']));
                            $nazwiskoopiekun = mysql_real_escape_string(htmlspecialchars($_POST['nazwiskoopiekun']));

                            /**
                             * Sprawdź czy podany przez użytkownika login już istnieje
                             */
                            $existsLogin = mysql_fetch_array(mysql_query("SELECT COUNT(iducznia) FROM uczen WHERE login='$login'"));
                           

                            $errors = ''; // Zmienna przechowująca listę błędów które wystąpiły


                            // Sprawdź, czy nie wystąpiły błędy
                            if (!$imie || !$nazwisko || !$data_urodzenia || !$telefon || !$idklasy || !$email || !$imieopiekun || !$nazwiskoopiekun) $errors .= '<h4><center> Musisz wypełnić wszystkie pola</h4></center><br />';


                            /**
                             * Jeśli wystąpiły jakieś błędy, to je pokaż
                             */
                            if ($errors != '') {
                                echo '<center><p class="error"><center><h4>Rejestracja nie powiodła się, popraw następujące błędy:</h4></center><br />'.$errors.'</p></center>';
                            }

                            /**
                             * Jeśli nie ma żadnych błędów - kontynuuj rejestrację
                             */
                            else {

                                // Zapisz dane do bazy
                                mysql_query("INSERT INTO uczen (imie, imie2, nazwisko, data_urodzenia, telefon, idklasy, email, imieopiekun, nazwiskoopiekun) VALUES('$imie', '$imie2', '$nazwisko', '$data_urodzenia', '$telefon', '$idklasy', '$email', '$imieopiekun', '$nazwiskoopiekun');") or die ('<p class="error">Wystąpił błąd w zapytaniu i nie udało się zarejestrować użytkownika.</p>');

                                
                                echo '<p class="success"><center>Dodano nowego ucznia: <b>'.$imie.' '.$nazwisko.'</b>, który znajduje się w klasie: <b>'.$idklasy.'</b></center></p>';

                                header('Location: dodaj_ucznia.php');
                                exit;
                            }
                        }
                    ?>
                    <center>
                    <form method="post" action="">
                    <label for="imie"><strong>Imię:</strong><input maxlength="15" type="text" name="imie" id="imie" /></label><br />
                    
                    <label for="imie2"><strong>Drugie imię:</strong><input maxlength="15" type="text" name="imie2" id="imie2" /></label><br />
                    
                    <label for="nazwisko"><strong>Nazwisko:</strong><input maxlength="20" type="text" name="nazwisko" id="nazwisko" /></label><br />
                    
                    <label for="data_urodzenia"><strong>Data urodzenia:</strong><input type="text" name="data_urodzenia" id="date" style="text-align: center"/>
                      <script type="text/javascript" >
                           calendar.set("date");
                      </script></label><br />
                    
                    <label for="telefon"><strong>GSM:</strong><input maxlength="9" type="tel" name="telefon" id="telefon" /></label><br />
                    
                    <label for="idklasy"><strong>KLASA:</strong><br/> 
                    <?php
                        
                        $sql="SELECT klasa FROM Klasy";
                        $r=mysql_query($sql); //zakladam ze masz utworzone aktywne polaczenie do bazy
                        $myHTML="<select name=\"idklasy\">";
                        while($x=mysql_fetch_assoc($r)) {
                        $myHTML.="<option value=\"{$x['klasa']}\">{$x['klasa']}";
                        }

                        $myHTML.="</select><br />";
                        print $myHTML;

                        ?></label><br />
                     
                    <label for="email"><strong>Adres mailowy Rodzica:</strong><input maxlength="30" type="email" name="email" id="email" /></label><br />
                    <label for="imieopiekun"><strong>Imię opiekuna prawnego:</strong><input maxlength="30" type="text" name="imieopiekun" id="imieopiekun" /></label><br />
                    <label for="nazwiskoopiekun"><strong>Nazwisko opiekuna prawnego:</strong><input maxlength="30" type="text" name="nazwiskoopiekun" id="nazwiskoopiekun" /></label><br />
                    <input type="hidden" name="send" value="1" /> <button>Zarejestruj</button></form><br />
                    </center>
                    <br />
                    <a href="adminindex.php"><button>Zakończ dodawanie Ucznia</button></A><br />
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