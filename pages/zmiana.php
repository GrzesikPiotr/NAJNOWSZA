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
               <h3>PANEL ADMINISTRATORA - edycja ucznia</h3>
            </div>
        </div>
        
        <div class="page-wrap">
            <div class="content">
            
                <!-- CONTENT -->
                          <?
                              session_start();

                              require("config.php");
                              $rezultat = mysql_query("SELECT * FROM uczen order by idklasy") or die(mysql_error());
                              $wykonaj = mysql_num_rows($rezultat);

                              
                              //if(mysql_num_rows($sql) > 0) 
                              //{
                                while ($wynik = mysql_fetch_assoc($rezultat))
                                {
                                  echo "Imię: ".$wynik['imie']. ".<br />";
                                  echo "Nazwisko: ".$wynik['nazwisko']. ".<br />";
                                  echo "Data urodzenia: ".$wynik['data_urodzenia']. ".<br />";
                                  echo "GSM: ".$wynik['telefon']. ".<br />";
                                  echo "Klasa: ".$wynik['Idklasy']. ".<br />";

                                }
                              
                                echo "<form action = 'edytuj.php' method = 'post'>";
                                  echo "<table>";
                                    echo "Imię:<input type='text' name='imie' value='".$wynik['imie']."' />";
                                    echo "Nazwisko:<input type='text' name='nazwisko' value='".$wynik['nazwisko']."' />";
                                    echo "Data urodzenia:<input type='text' name='data_urodzenia' value='".$wynik['data_urodzenia']."' />";
                                    echo "GSM:<input type='text' name='telefon' value='".$wynik['telefon']."' />";
                                    echo "Klasa:<input type='text' name='miasto' value='".$wynik['idklasy']."' />";
        
                                  echo "</table>";
                                  echo "<input type = 'submit' value = 'Zmień swoje dane' name='wyslany' />";
                                echo "</form>"; 
                              //}
                              //else { echo "Brak rekordów w tabeli.<br />"; }
                              
                              if(isset($_POST['wyslany'])) 
                              {
                                $sql2 = "UPDATE uczen SET imie='".$_POST['imie']."' AND nazwisko='".$_POST['nazwisko']."' AND data_urodzenia='".$_POST['data_urodzenia']."' AND telefon='".$_POST['telefon']."' AND idklasy='".$_POST['idklasy']."' WHERE id='$idklasy'";
                                mysql_query($sql2, $polacz) or die(mysql_error());
                              }
                            ?>  

             <br />
                       <a href="editu.php"><button>Wstecz</button></a><br />
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

 