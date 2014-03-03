<?php
require 'config.php';

require_once 'class/nauczyciel.class.php';
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
               <h3>Dziennik uwag uczniów</h3>
            </div>
        </div>
        
        <div class="page-wrap">
            <div class="content">
            
                <!-- CONTENT -->
                <h3><center>Uwagi Klasy:  
                   <?php
                        echo "<font color=\"red\">" . $_SESSION['klasa'] . "</font>";                           
                   ?>
                </center></h3><br />

                       <?php                       
                           //Definiujemy zapytanie pobierające wszystkie wiersze z wszystkimi
                           $zapytanie = "SELECT * FROM uwaga WHERE idklasy='{$_SESSION['klasa']}' order by data_dodania DESC";
                           //wykonujemy zdefiniowane zapytanie na bazie mysql
                           $wynik = mysql_query($zapytanie);
                           
                           //Wyświetlamy w tabeli html dane pobrane 
                           //Najpierw definiujemy nagłówek tabeli html
                           echo "<p>";
                           echo "<table><tr>";
                           echo "<th ><strong>Dla kogo uwaga</strong></th>";
                           echo "<th ><strong>Z jakiego przedmiotu</strong></th>";
                           echo "<th ><strong>Data wystawienia</strong></th>";
                           echo "<th ><strong>Nauczyciel wystawiający</strong></th>";
                           echo "<th ><strong>Treść uwagi</strong></th>";

                           //Teraz wyowietlamy kolejne wiersze z tabeli
                           while ( $row = mysql_fetch_row($wynik) ) {
                              echo "</tr>";
                              echo "<td >" . $row[2] . "</td>";
                              echo "<td >" . $row[4] . "</td>";
                              echo "<td >" . $row[6] . "</td>"; 
                              echo "<td >" . $row[1] . "</td>";
                              echo "<td >" . $row[5] . "</td>";
                              echo "</tr>";
                           }
                           echo "</table>";
                           
                           
                           //Zamykamy połączenie z bazą danych
                           if ( !mysql_close() ) {
                              echo 'Nie moge zakonczyc polaczenia z baza danych';
                              exit (0);
                           }
                           ?>
                          <br />
                          <a href="javascript:history.back();"><button>Wstecz</button></a><br />
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