<?php
    require 'config.php';
    require_once 'class/nauczyciel.class.php';
?>

<?php
    if(!isset($_SESSION['login']) AND !isset($_SESSION['pass'])){
        header("Location:nauczyciel.php");
    }
?>

<?php
    include 'header.php';
?>

<?php
    $_SESSION['klasa']=$_POST['idklasy'];
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
               <h3>Panel Nauczyciela</h3>
            </div>
        </div>
        
        <div class="page-wrap">
            <div class="content">
            
                <!-- CONTENT -->
                <?php
                        if (user::isLogged()) {
                            // Widok dla użytkownika zalogowanego
                            
                            // Pobierz dane o użytkowniku i zapisz je do zmiennej $user
                            $user = user::getData('', '');
                            
                            echo '<p><center>Zalogowałeś się jako: <b>'.$user['imie'].' '.$user['nazwisko'].'</b>. Możesz <a href="logoutnauczyciel.php"><button>wylogować się</button></a>.<br /><br />
                            Przedmiot nauczania: <b>'.$user['idprzedmiotu'].'</b></center><br />';
                        }

                        ?>
   
                    <?php
                        if ($_POST['send'] == 1) {
                            // Zabezpiecz dane z formularza przed kodem HTML i ewentualnymi atakami SQL Injection                                   
                            $klasa = mysql_real_escape_string(htmlspecialchars($_POST['klasa']));

                            $errors = ''; // Zmienna przechowująca listę błędów które wystąpiły

                            if (!$klasa) $errors .= '<h4><center> Musisz wybrać klasę!</h4></center><br />';

                            if ($errors != '') {
                                echo '<center><p class="error"><center><h4>Popraw błąd: </h4></center><br />'.$errors.'</p></center>';
                            }

                            else {                      
                                 header("Location: nauczyciel/nauczyciellog.php\n\n");                                 
                            }
                        }
                    
                    ?>

                    <center><form action="nauczyciel/nauczyciellog.php" method="post">
                    <label for="klasa">Proszę wybrać klasę:<br/> 
                    <?php                 
                        $sql="SELECT klasa FROM Klasy";
                        $r=mysql_query($sql);
                        $myHTML="<select name=\"idklasy\">";
                        while($x=mysql_fetch_assoc($r)) {
                        $myHTML.="<option value=\"{$x['klasa']}\">{$x['klasa']}";                      
                        }

                        $myHTML.="</select><br />";
                        print $myHTML;
                    ?>
                    </label><br />                    
                    <input type="hidden" name="send" value="1" /> <button>Przejdź do panelu klasy</button></form><br />
                    </center>

      
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