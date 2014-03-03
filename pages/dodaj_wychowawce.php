<?php
require 'config.php';
require_once 'class/wychowawca.class.php';
?>
<?php
if(!isset($_SESSION['login']) AND !isset($_SESSION['pass'])){
    header("Location:administrator.php");
}
?>
<?php
    $_SESSION['nazwaklasa']=$_POST['idklasy'];
?>
<?php
include 'header.php';
?>
<div id="wrap">
    <div class="header">
        <!-- TITLE -->
        <h5>PROJEKT <strong> SWOS</strong></h5>
        <!-- END TITLE -->
    </div>
    <div class="page">
        <div id="navbg">
            <div id="nav">
               <h3>Rejestracja Nauczyciela</h3>
            </div>
        </div>
        
        <div class="page-wrap">
            <div class="content">
            
                <!-- CONTENT -->
                       <?php

                        if ($_POST['send'] == 1) {
                            // Zabezpiecz dane z formularza przed kodem HTML i ewentualnymi atakami SQL Injection
                            $login = mysql_real_escape_string(htmlspecialchars($_POST['login']));
                            $pass = mysql_real_escape_string(htmlspecialchars($_POST['pass']));
                            $pass_v = mysql_real_escape_string(htmlspecialchars($_POST['pass_v']));
                            $imie = mysql_real_escape_string(htmlspecialchars($_POST['imie']));
                            $imie2 = mysql_real_escape_string(htmlspecialchars($_POST['imie2']));
                            $nazwisko = mysql_real_escape_string(htmlspecialchars($_POST['nazwisko']));
                            $data_urodzenia = mysql_real_escape_string(htmlspecialchars($_POST['data_urodzenia']));
                            $wyksztalcenie = mysql_real_escape_string(htmlspecialchars($_POST['wyksztalcenie']));
                            $nip = mysql_real_escape_string(htmlspecialchars($_POST['nip']));
                            $telefon = mysql_real_escape_string(htmlspecialchars($_POST['telefon']));
                            $idklasy = mysql_real_escape_string(htmlspecialchars($_POST['idklasy']));

                          
                            $existsLogin = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM wychowawca WHERE login='$login' LIMIT 1"));
                           

                            $errors = ''; 


                           
                            if (!$login ||!$pass || !$pass_v || !$imie || !$nazwisko || !$data_urodzenia || !$wyksztalcenie || !$nip || !$telefon || !$idklasy) $errors .= '<center><h4>Musisz wypełnić wszystkie pola</h4></center><br />';
                            if ($existsLogin[0] >= 1) $errors .= '<center><h4>- Ten login jest zajęty</h4></center><br />';
                            if ($pass != $pass_v)  $errors .= '<center><h4>- Hasła się nie zgadzają</h4></center><br />';

                          
                            if ($errors != '') {
                                echo '<p class="error"><center><h4>Rejestracja nie powiodła się, popraw następujące błędy:</h4></center><br /><center>'.$errors.'</center></p>';
                            }

                          
                            else {

                             
                                $pass = user::passSalter($pass);

                                
                                mysql_query("INSERT INTO wychowawca (login, pass, imie, imie2, nazwisko, data_urodzenia, wyksztalcenie, nip, telefon, idklasy) VALUES('$login', '$pass', '$imie', '$imie2', '$nazwisko', '$data_urodzenia', '$wyksztalcenie', '$nip', '$telefon', '$idklasy');") or die ('<p class="error">Wystąpił błąd w zapytaniu i nie udało się zarejestrować użytkownika.</p>');

                                echo '<p class="success"><center>Dodany został nowy Wychowawca:  <b>'.$imie.' '.$nazwisko.'</b> ,który będzie wychowawcą klasy: <b>'.$idklasy.'</b><br /></center> ';
                            }
                        }
                        ?>
                    
                    <form method="post" action="">
                    <center>
                    <label for="login"><strong>Login:</strong><input maxlength="32" type="text" name="login" id="login" /></label><br />
                    
                    <label for="pass"><strong>Hasło:</strong><input maxlength="32" type="password"  name="pass" id="pass" /></label><br />
                    
                    <label for="pass_again"><strong>Powtórz hasło:</strong><input maxlength="32" type="password" name="pass_v" id="pass_again" /></label><br />
                   
                    <label for="imie"><strong>Imię:</strong><input maxlength="15" type="text" name="imie" id="imie" /></label><br />
                    
                    <label for="imie2"><strong>Drugie imię:</strong><input maxlength="15" type="text" name="imie2" id="imie2" /></label><br />
                   
                    <label for="nazwisko"><strong>Nazwisko:</strong><input maxlength="20" type="text" name="nazwisko" id="nazwisko" /></label><br />
                    
                    <label for="data_urodzenia"><strong>Data urodzenia:</strong><input type="text" name="data_urodzenia" id="date" style="text-align: center"/>
                      <script type="text/javascript" >
                           calendar.set("date");
                      </script></label><br />
                                        
                    <label for="wyksztalcenie"><strong>Wykształcenie:</strong><br />
                    <select name="wyksztalcenie">
                    <option value="wybierz" selected="selected">Wybierz...</option>
                    <option value="Dr">Dr</option>
                    <option value="Wyższe">Wyższe</option>
                    <option value="Średnie">Średnie</option>
                    <option value="Pedagogiczne">Pedagogiczne</option>
                    </select></label><br />
                    <br />
                    
                     
                    <label for="nip"><strong>NIP:</strong><input maxlength="9" type="text" name="nip" id="nip" /> </label><br />

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
                    <br /> 

                    <input type="hidden" name="send" value="1" /> <button>Zarejestruj</button></center></form><br />
                    <br />
                    <a href="adminindex.php"><button>Zakończ dodawanie Wychowawcy</button></A><br />
                    
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