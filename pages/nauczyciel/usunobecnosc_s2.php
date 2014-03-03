<?php
    require '../config.php';
    require_once '../class/nauczyciel.class.php';
?>

<?php
    if(!isset($_SESSION['login']) AND !isset($_SESSION['pass'])){
        header("Location: ../nauczyciel.php");
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="pl" lang="pl" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="generator" content="HTML Tidy for Linux (vers 25 March 2009), see www.w3.org" />
<title>iSWOS</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../styles.css" />
<link rel="shortcut icon" href="../../images/ico/favicon.ico" />
<meta name="Description" content="SWOS" />
<meta name="keywords" content="SWOS" />
<meta name="Author" content="Piotr Grzesik" />
<meta name="copyright" content="Grzesik Piotr" />
<meta name="Robots" content="ALL" />

<SPAN id="Data" style="POSITION: absolute; LEFT: 0; TOP: 0; FONT-SIZE: 10pt;
FONT-WEIGHT: bold; COLOR: white; FONT-FAMILY: Verdana, Arial;"></SPAN>
<script>

function czas() {

 if (!document.layers&&!document.getElementById&&!document.all)
 return

  var godzina, minuty, sekundy, dzien, licz_dzien, miesiac, dzisiaj, rok, tekst_miesiac, tekst_dzien;
  dzisiaj = new Date();
  godzina=dzisiaj.getHours();
  minuty=dzisiaj.getMinutes();
  sekundy=dzisiaj.getSeconds();
  rok=dzisiaj.getYear();
  dzien=dzisiaj.getDate();
  licz_dzien=dzisiaj.getDay();
  if (licz_dzien==0) {tekst_dzien="Niedziela"}
  if (licz_dzien==1) {tekst_dzien="Poniedziałek"}
  if (licz_dzien==2) {tekst_dzien="Wtorek"}
  if (licz_dzien==3) {tekst_dzien="Środa"}
  if (licz_dzien==4) {tekst_dzien="Czwartek"}
  if (licz_dzien==5) {tekst_dzien="Piątek"}
  if (licz_dzien==6) {tekst_dzien="Sobota"}
  miesiac=dzisiaj.getMonth()+1;
  if (miesiac==1) {tekst_miesiac="stycznia"}
  if (miesiac==2) {tekst_miesiac="lutego"}
  if (miesiac==3) {tekst_miesiac="marca"}
  if (miesiac==4) {tekst_miesiac="kwietnia"}
  if (miesiac==5) {tekst_miesiac="maja"}
  if (miesiac==6) {tekst_miesiac="czerwca"}
  if (miesiac==7) {tekst_miesiac="lipca"}
  if (miesiac==8) {tekst_miesiac="sierpnia"}
  if (miesiac==9) {tekst_miesiac="września"}
  if (miesiac==10) {tekst_miesiac="października"}
  if (miesiac==11) {tekst_miesiac="listopada"}
  if (miesiac==12) {tekst_miesiac="grudnia"}
         if ((rok>=00) && (rok<=1900)) {rok=1900+rok;}
         if (miesiac < 10) {miesiac="0"+miesiac;}
   if (dzien < 10) {dzien="0"+dzien;}
   if (godzina < 10) {godzina="0"+godzina;}
         if (minuty < 10) {minuty="0"+minuty;}
   if (sekundy < 10) {sekundy="0"+sekundy;}
  pelnyczas=tekst_dzien + ", " + dzien + " " + tekst_miesiac + " "+rok+"<br>"
    + godzina+":"+minuty+":"+sekundy;


if (document.getElementById){
document.getElementById("Data").innerHTML=pelnyczas
}
else if (document.layers){
document.layers.Data.document.write(pelnyczas)
}
else if (document.all)
Data.innerHTML=pelnyczas

// Czestotliwosc odswiezania
setTimeout("czas()",500)

}

</script>
</head>

<body onLoad="czas()">

<div id="wrap">
    <div class="header">
        <!-- TITLE -->
        <h5>PROJEKT <strong> iSWOS</strong></h5>
        <!-- END TITLE -->
    </div>
    <div class="page">
        <div id="navbg">
            <div id="nav">
               <h3>Panel Nauczyciela - Dziennik Obecności</h3>
            </div>
        </div>
        
        <div class="page-wrap">
            <div class="content">
            
                <!-- CONTENT -->
                <h3><center>
                 <?php
                    if (user::isLogged()) {
                            $user = user::getData('', '');
                        }
                ?>

                 <?php
                      echo "Usuwanie obecności - Semestr II<br/>";
                      echo "Klasa: <font color=\"red\">" . $_SESSION['klasa'] . "</font><br/>";
                      echo "Uczeń: <font color=\"red\">" . $_SESSION['uczen2'] . "</font><br/>";
                      echo "Przedmiot: <font color=\"red\">".$user['idprzedmiotu']."</font><br/><br/>";
                      echo "Dzień: <font color=\"red\">" . $_SESSION['dzien2'] . "</font>";                    
                 ?>
                </center></h3><br />

                            <?php
                                $q="DELETE FROM `obecnosc_s2` WHERE `idobecnosci` = '{$_GET['usun']}'";
                                mysql_query($q);
                                $rezultat = mysql_query("SELECT * FROM obecnosc_s2 WHERE idklasy='{$_SESSION['klasa']}' and iducznia='{$_SESSION['uczen2']}' and idprzedmiotu='{$user['idprzedmiotu']}' and data_obecnosci='{$_SESSION['dzien2']}' order by idobecnosci ASC") or die(mysql_error());
                                $wykonaj = mysql_num_rows($rezultat);

                                echo "<center>";
                                echo "<table style=\"width: 50%\">";
                                echo "<tr style=\"text-align: center\">";
                                echo "<th>Uczeń</th>";
                                echo "<th>Obecność</th>";
                                echo "<th>Usuń</th>";
                                echo "</tr>";
                                $i = 0;

                                while ($record = mysql_fetch_array($rezultat, MYSQL_ASSOC))  {
                                    echo "<tr style=\"text-align: center\">";
                                    echo "<td>" . $record['iducznia'] . "</td>";
                                    echo "<td>" . $record['obecnosc'] . "</td>";
                                    echo "<td>  <h4><a href=\"../nauczyciel/usunobecnosc_s2.php?usun={$record['idobecnosci']}\"><img src=\"../../images/del.png\" alt=\"Usuń\" name=\"Usuń\" title=\"Usuń\"></a></h4></td>";
                                    echo "</tr>";
                                    $i++;
                                }
                                echo "</table>";
                                echo "Wystawiono łącznie: ".$wykonaj." obecności";
                                echo "</center>";
                                   
                                if ( !mysql_close() ) {
                                    echo 'Nie moge zakonczyc polaczenia z baza danych';
                                    exit (0);
                                   }
                            ?>

                <br/>
                    <a href="../nauczyciel/nauczycielindex.php"><button>Panel Nauczyciela</button></a>
                    <a href="../nauczyciel/editobecnosc_wu2.php"><button>Zmień ucznia</button></a><br />
                <br/>
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