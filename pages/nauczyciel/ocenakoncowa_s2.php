<?php
session_start();
require '../config.php';

require_once '../class/nauczyciel.class.php';
?>
<?php
  if(!isset($_SESSION['login']) AND !isset($_SESSION['pass'])){
      header("Location:../nauczyciel.php");
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
        <h5>PROJEKT <strong> SWOS</strong></h5>
        <!-- END TITLE -->
    </div>
    <div class="page">
        <div id="navbg">
            <div id="nav">
               <h3>Panel Nauczyciela - Ocena końcowa</h3>
            </div>
        </div>
        
        <div class="page-wrap">
            <div class="content">
            
        <!-- CONTENT -->
            <h3><center>Wystawianie oceny końcowej - Semestr II<br/>Klasa:  
                 <?php
                      echo "<font color=\"red\">" . $_SESSION['klasa'] . "</font>";                       
                 ?>
            </center></h3>

            <?php
            if (user::isLogged()) {
                $user = user::getData('', '');

                echo "<h3><center>Przedmiot: <font color=\"red\">" . $user['idprzedmiotu'] . "</font></h3><br/><br/>";

            if (isset ($_POST['send'] )){
            $uczen2 = mysql_real_escape_string(htmlspecialchars($_POST['uczen2']));
            $klasa = mysql_real_escape_string(htmlspecialchars($_SESSION['klasa']));
            $idprzedmiotu = mysql_real_escape_string(htmlspecialchars($user['idprzedmiotu']));
            $idnauczyciela = mysql_real_escape_string(htmlspecialchars($_POST['idnauczyciela']));
            $imie = mysql_real_escape_string(htmlspecialchars($user['imie']));
            $nazwisko = mysql_real_escape_string(htmlspecialchars($user['nazwisko']));
            $ocena_sem2 = mysql_real_escape_string(htmlspecialchars($_POST['ocena_sem2']));
            $zachowanie2 = mysql_real_escape_string(htmlspecialchars($_POST['zachowanie2']));
            $data_wystawienia = date("d.m.Y");

            $errors = ''; // Zmienna przechowująca listę błędów które wystąpiły


                                        // Sprawdź, czy nie wystąpiły błędy
                                        if (!$uczen2 || !$ocena_sem2 || !$zachowanie2 ) $errors .= '<center><h4>Musisz wypełnić wszystkie pola</h4></center><br />';
                                        /**
                                         * Jeśli wystąpiły jakieś błędy, to je pokaż
                                         */
                                        if ($errors != '') {
                                            echo '<p class="error"><center><h4>Dodawanie oceny końcowej nie powiodło się, popraw następujące błędy:</h4></center><br /><center>'.$errors.'</center></p>';
                                        }
                                        else {
            // Zapisz dane do bazy
            mysql_query("INSERT INTO ocenakoncowa_s2 (iducznia, idklasy, idprzedmiotu, idnauczyciela, ocena_sem, zachowanie, data_wystawienia) VALUES ('$uczen2', '$klasa', '$idprzedmiotu', '$imie $nazwisko', '$ocena_sem2', '$zachowanie2', 
              NOW())") or die ('<p class="error">Wystąpił błąd w zapytaniu i nie udało się dodać oceny końcowej.</p>');
            echo "<p class=\"success\"><center><b>Uczeń <font color=\"red\" size=\"4\">".$uczen2."</font> otrzymał/a ocenę końcową:<br/> 
            Ocena: <font color=\"red\" size=\"4\">".$ocena_sem2."</font><br/> 
            Zachowanie: <font color=\"red\" size=\"4\">".$zachowanie2."</font></b></center></p>";

            }
            }
            }
            ?>

            <center>
            <table style="width: 70%">
              <tr>
                <th>Wprowadzanie</th>
                <th>Informacje dodatkowe</th>
              </tr>

              <tr>
                <td valign="top">
                    <center>
                    <form method="post" action="">
                    <table cellspacing="1" border="2" style="width: 35%">

                        <tr style="text-align: center">
                            <th>Uczeń</th>
                        </tr>               
                        <tr style="text-align: center" bgcolor="#333333">
                            <!-- Uczen -->
                            <td><label for="uczen2">
                                <?php
                                    $zapytanie = "SELECT * FROM uczen WHERE idklasy='{$_SESSION['klasa']}' order by nazwisko ASC;";
                                    $wynik=mysql_query($zapytanie); 
                                    $myHTML="<select name=\"uczen2\">";
                                    while($x=mysql_fetch_assoc($wynik)) {
                                    $myHTML.="<option value=\"{$x['nazwisko']} {$x['imie']}\">{$x['nazwisko']} {$x['imie']}";
                                    }
                                    $myHTML.="</select><br />";
                                    print $myHTML;
                                ?>
                            </label>
                        </tr>

                        <tr style="text-align: center">
                            <th>Ocena</th>
                        </tr>
                        <tr style="text-align: center" bgcolor="#333333">
                            <!-- Ocena semestralna -->
                            <td><label for="ocena_sem2">
                                <select name="ocena_sem2">
                                    <option>Wybierz ocenę</option>
                                    <option>Niedostateczny</option>
                                    <option>Dopuszczający</option>
                                    <option>Dostateczny</option>
                                    <option>Dobry</option>
                                    <option>Bardzo dobry</option>
                                    <option>Celujacy</option>
                                </select>
                            </label></td>
                        </tr>

                        <tr style="text-align: center">
                            <th>Zachowanie</th>
                        </tr>
                        <tr style="text-align: center" bgcolor="#333333">
                            <!-- Zachowanie -->
                            <td><label for="zachowanie2">
                                <select name="zachowanie2">
                                    <option>Wybierz zachowanie</option>
                                    <option>Naganne</option>
                                    <option>Nieodpowiednie</option>
                                    <option>Poprawne</option>
                                    <option>Dobre</option>
                                    <option>Bardzo dobre</option>
                                    <option>Wzorowe</option>
                                </select>
                            </label></td>
                        </tr>
                    </table>

                    <input type="hidden" name="send" value="1" /> <button>Wprowadż ocenę końcową</button>
                    </form><br />
                    </center>
                    <br />
                </td>

                <td valign="top">
                    <?php                       
                           //Definiujemy zapytanie pobierające wszystkie wiersze z wszystkimi
                           $zapytanie = "SELECT * FROM ocena_s2 WHERE idklasy='{$_SESSION['klasa']}' and idprzedmiotu='{$user['idprzedmiotu']}' order by iducznia, rodzaj_oceny DESC";
                           //wykonujemy zdefiniowane zapytanie na bazie mysql
                           $wynik = mysql_query($zapytanie);
                           
                           //Wyświetlamy w tabeli html dane pobrane 
                           //Najpierw definiujemy nagłówek tabeli html
                           echo "<center>";
                           echo "<table style=\"width: 80%\">";
                           echo "<tr style=\"text-align: center\">";
                           echo "<th><strong>Uczeń</strong></th>";
                           echo "<th><strong>Ocena</strong></th>";
                           echo "<th><strong>Ocena za</strong></th>";
                           echo "</tr>";

                           //Teraz wyowietlamy kolejne wiersze z tabeli
                           while ($row = mysql_fetch_array($wynik) ) {
                              echo "<tr style=\"text-align: center\">";
                              echo "<td>" .$row['iducznia']. "</td>";
                              echo "<td>" .$row['ocena']. "</td>";
                              echo "<td>" .$row['rodzaj_oceny']. "</td>"; 
                              echo "</tr>";
                           }
                           echo "</table>";
                           echo "</center>";
                           
                           
                           //Zamykamy połączenie z bazą danych
                           if ( !mysql_close() ) {
                              echo 'Nie moge zakonczyc polaczenia z baza danych';
                              exit (0);
                           }
                           
                      ?>
                </td>
              </tr>              
            </table>
          </center>

            


            <br/>
                <a href="../nauczyciel/nauczycielindex.php"><button>Panel Nauczyciela</button></a><br />
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