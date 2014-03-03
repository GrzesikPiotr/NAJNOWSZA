<?php
    require 'config.php';
    require_once 'class/wychowawca.class.php';
?>

<?php
    if(!isset($_SESSION['login']) AND !isset($_SESSION['pass'])){
        header("Location:wychowawca.php");
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
               <h3>Panel Wychowawcy</h3>
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
                        $_SESSION['wklasa']=$user['idklasy'];
                            
                        echo '<p><center>Zalogowałeś się jako: <b>'.$user['imie'].' '.$user['nazwisko'].'</b>. Możesz <a href="logoutwychowawca.php"><button>wylogować się</button></a>.<br /><br />
                        Wychowawca klasy: <b>'.$user['idklasy'].'</b></center><br />';
                    }

                ?>
                        <center>
                        <table style="width: 95%">

                            <tr align="center">
                            <th><font size="4"><b>Uczniowie</b></font></th>
                            <th><font size="4"><b>Uwagi</b></font></th>
                            <th><font size="4"><b>Oceny</b></font></th>
                            <th><font size="4"><b>Obecności</b></font></th>
                            <th><font size="4"><b>Oceny końcowe</b></font></th>
                            <th colspan="2"><font size="4"><b>Powiadomienia</b></font></th>
                            <th><font size="4"><b>PDF</b></font></th>
                            
                        </tr>


                        <tr align="center">
                            <td><a href="wychowawca/seeuczen.php"><button>Wyświetl uczniów</button></a></td>
                            <td><a href="wychowawca/seeuwaga.php"><button>Wyświetl uwagi</button></a></td>
                            <td><a href="wychowawca/seeocena1_wp.php"><button>Wyświetl oceny z semestru I</button></a></td>
                            <td><a href="wychowawca/seeobecnosc1_wd.php"><button>Obecności Semsestr I</button></a></td>
                            <td><a href="wychowawca/seeocenakoncowa_s1.php"><button>Semestr I</button></a></td>
                            <td><b>EMAIL</b></td>
                            <td><b>SMS</b></td>
                            <td><a href="wychowawca/export.php" onclick="this.target='_blank'"><button>Eksport uwag</button></a></td>
                        </tr>


                        <tr align="center">
                            <td></td>
                            <td></td>
                            <td><a href="wychowawca/seeocena2_wp.php"><button>Wyświetl oceny z semestru II</button></a></td>
                            <td><a href="wychowawca/seeobecnosc2_wd.php"><button>Obecności Semsestr II</button></a></td>
                            <td><a href="wychowawca/seeocenakoncowa_s2.php"><button>Semestr II</button></a></td>
                            <td><a href="wychowawca/sendocena.php"><button>Oceny</button></a></td>
                            <td><a href="wychowawca/sendzebranie.php"><button>Zebranie</button></a></td>
                            <td><a href="wychowawca/export2.php" onclick="this.target='_blank'"><button>Oceny Semestr I</button></a></td>
                        </tr>

                        <tr align="center">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><a href="wychowawca/sendmsg.php"><button>Wiadomość</button></a></td>
                            <td><a href="wychowawca/sendinfo.php"><button>Wiadomość</button></a></td>
                            <td><a href="wychowawca/export3.php" onclick="this.target='_blank'"><button>Oceny Semestr II</button></a></td>
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
               0<p>© <a href="mailto: grzesikpiotr@op.pl">Grzesik Piotr</a> and <a href="mailto: p.budniak5@gmail.com">Budniak Paweł</a> || 2013</p> 
            </div>  
        </div>
    </div>
</div>
</body>
</html>