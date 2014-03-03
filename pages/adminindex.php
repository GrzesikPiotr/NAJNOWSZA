<?php
require 'config.php';
require_once 'class/user.class.php';
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
               <h3>PANEL ADMINISTRATORA</h3>
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
                            
                            echo '<p><center>Jesteś zalogowany jako administrator: <b>'.$user['login'].'</b>.</center>';
                            echo ' <center>Możesz zobaczyć swój <a href="profile.php?id='.$user['id'].'"><button>Profil</button></a> albo <a href="logout.php"><button>Wylogować się</button></a>.</center></p>';
                        }

                        ?>
					
                        <br /><center>
                        <table style="width: 95%">

                        <tr align="center">
                            <th><font size="4"><b>Uczeń</b></font></th>
                            <th><font size="4"><b>Nauczyciel</b></font></th>
                            <th><font size="4"><b>Dyrektor</b></font></th>
                            <th><font size="4"><b>Wychowawcy</b></font></th>
                            <th><font size="4"><b>Przedmioty, klasy</b></font></th> 
                            <th><font size="4"><b>Organizacja</b></font></th> 
                        </tr>

                        <tr align="center">
                            <td><a href="dodaj_ucznia.php"><button>Dodaj Ucznia</button></a></td>
                            <td><a href="dodaj_nauczyciela.php"><button>Dodaj Nauczyciela</button></a></td>
                            <td><a href="dodaj_dyrektora.php"><button>Dodaj Dyrektora</button></a></td>
                            <td><a href="dodaj_wychowawce.php"><button>Dodaj Wychowawcę</button></a></td>
                            <td><a href="register.php"><button>Dodaj ADMINA</button></a></td>
                            <td><a href="orgzaj.php"><button>Planowanie zajęć</button></a></td>
                        </tr>

                        <tr align="center">
                            <td><a href="seeuczen.php"><button>Wyświetl Uczniów</button></a></td>
                            <td><a href="seenauczyciel.php"><button>Wyświetl Nauczycieli</button></a></td>
                            <td><a href="seedyrektor.php"><button>Wyświetl Dyrektorów</button></a></td>
                            <td><a href="seewychowawca.php"><button>Wyswietl Wychowawców</button></a></td>
                            <td><a href="dodaj_klase.php"><button>Dodaj KLASĘ oraz SEMESTR</button></a></td>
                            <td><a href="seeorgzaj.php"><button>Zobacz zaplanowane zajęcia</button></a></td>
                        </tr>
                            
                        <tr align="center">
                            <td><a href="editu.php"><button>Usuń Ucznia</button></a></td>
                            <td><a href="editn.php"><button>Usuń Nauczyciela</button></a></td>
                            <td><a href="editd.php"><button>Usuń Dyrektora</button></a></td>
                            <td><a href="editwych.php"><button>Usuń Wychowawców</button></a></td>
                            <td><a href="editks.php"><button>Usuń Klasę lub Semestr</button></a></td>
                            <td><a href="editorgzaj.php"><button>Usuwanie zaplanowanych zajęć</button></a></td>
                        </tr>

                        <tr align="center">
                            <td><a href="edycja/edycja.php"><button>Edytuj Ucznia</button></a></td>
                            <td><a href="edycja/edycjan.php"><button>Edytuj Nauczyciela</button></a></td>
                            <td><a href="edycja/edycjad.php"><button>Edytuj Dyrektora</button></a></td>
                            <td><a href="edycja/edycjaw.php"><button>Edytuj Wychowawcę</button></a></td>
                            <td><a href="dodaj_przedmiot.php"><button>Dodaj Przedmiot</button></a></td>
                        </tr>

                        <tr align="center">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><a href="editp.php"><button>Edytuj Przedmiot</button></a></td>
                        </tr>

                        </table></center>
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

