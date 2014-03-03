<?php
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
        <h5>PROJEKT <strong> iSWOS</strong></h5>
        <!-- END TITLE -->
    </div>
    <div class="page">
        <div id="navbg">
            <div id="nav">
               <h3>Panel Nauczyciela - Dziennik</h3>
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
                            
                            echo '<p><center>Zalogowałeś się jako: <b>'.$user['imie'].' '.$user['nazwisko'].'</b>. Możesz <a href="../logoutnauczyciel.php"><button>Wylogować się</button></a>.<br /><br />
                            Przedmiot nauczania: <b>'.$user['idprzedmiotu'].'</b></center>';
                        }

                ?>

                <br />
                <h3><center>Dziennik klasy: 
                    <?php
                        echo "<font color=\"red\">" . $_SESSION['klasa'] . "</font>"; 
                    ?>
                </center></h3><br />

                <center>
                <table style="width: 95%">
                <tr align="center">
                    <th><font size="4">Klasa</font></th>
                    <th colspan="2"><font size="4">Oceny</font></th>
                    <th colspan="2"><font size="4">Obecności</font></th>
                    <th><font size="4">Uwagi</font></th>
                    <th><font size="4">Lista uczniów</font></th>
                    <th><font size="4">Ocena końcowa</font></th>
                </tr>
                <tr align="center">
                    <td><a href="../zalogowanynauczyciel.php"><button>Zmień klase</button></a></td>
                    <td>Semestr I</td>
                    <td>Semestr II</td>
                    <td>Semestr I</td>
                    <td>Semestr II</td>
                    <td><a href="../nauczyciel/dodaj_uwage.php"><button>Dodaj uwagę</button></a></td>
                    <td><a href="../nauczyciel/seeuczen.php"><button>Wyświetl</button></a></td>
                    <td><a href="../nauczyciel/ocenakoncowa_s1.php"><button>Wprowadż - Semestr I</button></a></td> 
                </tr>

                <tr align="center">
                    <td></td>
                    <td><a href="../nauczyciel/ocena_s1.php"><button>Dodaj Ocenę</button></a></td>
                    <td><a href="../nauczyciel/ocena_s2.php"><button>Dodaj Ocenę</button></a></td>
                    <td><a href="../nauczyciel/obecnosc_s1.php"><button>Wprowadź Obecność</button></a></td>
                    <td><a href="../nauczyciel/obecnosc_s2.php"><button>Wprowadź Obecność</button></a></td>
                    <td><a href="../nauczyciel/seeuwaga.php"><button>Wyświetl uwagi</button></a></td>
                    <td></td>
                    <td><a href="../nauczyciel/seeocenakoncowa_s1.php"><button>Wyświetl - Semestr I</button></a></td>
                </tr>

                <tr align="center">
                    <td></td>
                    <td><a href="../nauczyciel/seeocena_s1.php"><button>Wyświetl Oceny</button></a></td>
                    <td><a href="../nauczyciel/seeocena_s2.php"><button>Wyświetl Oceny</button></a></td>
                    <td><a href="../nauczyciel/seeobecnosc_s1wb.php"><button>Wyświetl Obecność</button></a></td>
                    <td><a href="../nauczyciel/seeobecnosc_s2wb.php"><button>Wyświetl Obecność</button></a></td>
                    <td><a href="../nauczyciel/edycjauwaga.php"><button>Edytuj uwagę</button></a></td>
                    <td></td>
                    <td><a href="../nauczyciel/ocenakoncowa_s2.php"><button>Wprowadż - Semestr II</button></a></td>
                </tr>

                <tr align="center">
                    <td></td>
                    <td><a href="../nauczyciel/editocena_wu1.php"><button>Edytuj Ocenę</button></a></td>
                    <td><a href="../nauczyciel/editocena_wu2.php"><button>Edytuj Ocenę</button></a></td>
                    <td><a href="../nauczyciel/editobecnosc_wu1.php"><button>Edytuj Obecność</button></a></td>
                    <td><a href="../nauczyciel/editobecnosc_wu2.php"><button>Edytuj Obecność</button></a></td>
                    <td><a href="../nauczyciel/usunuwaga.php"><button>Usuń uwagę</button></a></td>
                    <td></td>
                    <td><a href="../nauczyciel/seeocenakoncowa_s2.php"><button>Wyświetl - Semestr II</button></a></td>
                </tr>

                </table>
                </center><br/>

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