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
               <h3>Zarejestrowani Uczniowie</h3>
            </div>
        </div>
        
        <div class="page-wrap">
            <div class="content">
            
                <!-- CONTENT -->
                       <?php 
                           
                            $rezultat = mysql_query("SELECT * FROM uczen ORDER BY idklasy") or die(mysql_error());
                                    $wykonaj = mysql_num_rows($rezultat);

                                    echo "<p>Ilość Uczniów: <b>".$wykonaj."</b></p>";

                           echo "<p>";
                           echo "<table boder=\"1\"><tr>";
                           echo "<th ><strong>Imię</strong></th>";
                           echo "<th ><strong>Drugie imię</strong></th>";
                           echo "<th ><strong>Nazwisko</strong></th>";
                           echo "<th ><strong>Data urodzenia</strong></th>";
                           echo "<th ><strong>Klasa</strong></th>";
                           echo "<th ><strong>Opiekun prawny</strong></th>";
                            echo "<th ><strong>Numer telefonu</strong></th>";

                           while ($record = mysql_fetch_array($rezultat))  {
                              echo "</tr>";
                              echo "<td >" . $record[1] . "</td>";
                              echo "<td >" . $record[2] . "</td>";
                              echo "<td >" . $record[3] . "</td>";
                              echo "<td >" . $record[4] . "</td>";
                              echo "<td >" . $record[6] . "</td>";
                              echo "<td >" . $record[9] . " " . $record[10] . "</td>";
                              echo "<td >" . $record[5] . "</td>";
                              echo "</tr>";
                           }
                           echo "</table>";
                           
                           
                           if ( !mysql_close() ) {
                              echo 'Nie moge zakonczyc polaczenia z baza danych';
                              exit (0);
                           }
                           ?>
                          <br />
                          <a href="zalogowanydyrektor.php"><button>Wstecz</button></a><br />
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