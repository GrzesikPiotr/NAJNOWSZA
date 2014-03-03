<?php
require 'config.php';
?>
<?php
if(!isset($_SESSION['login']) AND !isset($_SESSION['pass'])){
 
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
               <h3>ORGANIZACJA I PLANOWANIE ZAJĘĆ</h3>
            </div>
        </div>
        
        <div class="page-wrap">
            <div class="content">
            
                <!-- CONTENT -->
                      <?php
                        
                      
                        if ($_POST['send'] == 1) {
                            $idklasy = mysql_real_escape_string(htmlspecialchars($_POST['idklasy']));
                            $idprzedmiotu = $_POST['idprzedmiotu'];
                           
                            foreach($idprzedmiotu as $przedmiot) {
                                $q="INSERT INTO zajecia (idklasy, idprzedmiotu) VALUES('$idklasy', '$przedmiot');";
                               
                            mysql_query($q) or die ('<p class="error">Wystąpił błąd w zapytaniu i nie udało się dokonać planowania.</p>');
                            }
                                echo '<p class="success"><center>Wybrano przedmioty dla klasy: <b>'.$idklasy.'.</b></center></p>';
                        }                        
                    ?>

                      <center>
                    <form method="post" action="">
                    
                    <label for="idklasy"><strong>Wybierz klasę, do której chcesz przypisać przedmioty:</strong><br/> 
                    <?php
                        
                        $sql="SELECT klasa FROM Klasy";
                        $r=mysql_query($sql); 
                        $myHTML="<select name=\"idklasy\">";
                        while($x=mysql_fetch_assoc($r)) {
                        $myHTML.="<option value=\"{$x['klasa']}\">{$x['klasa']}";
                        }

                        $myHTML.="</select><br />";
                        print $myHTML;

                    ?></label><br />

                        <label for="idprzedmiotu"><strong>Wybierz przedmioty:</strong><br/>      
                    <?php
                        
                        $sql="SELECT przedmiot FROM przedmioty ORDER BY przedmiot";
                        $r=mysql_query($sql); 
                        $myHTML="<select multiple name=\"idprzedmiotu[]\">";

                        while($x=mysql_fetch_array($r)) {
                        $myHTML.="<option multiple value=\"{$x['przedmiot']}\">{$x['przedmiot']}";
                        }

                        $myHTML.="</select><br />";
                         print $myHTML;
                        
                    ?></label><br />
                    <br /> 
                    <input type="hidden" name="send" value="1" /> <button>Zaplanuj</button></form><br />
                    </center>
                    <br />
                    <a href="adminindex.php"><button>Zakończ planowanie zajęć</button></a><br />
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