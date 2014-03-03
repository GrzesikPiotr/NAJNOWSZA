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
               <h3>PANEL ADMINISTRATORA - Profil zalogowanego użytkownika</h3>
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
                                    
                                    echo '<p><center>Jesteś zalogowany jako admin:  <b>'.$user['login'].'</b>.</center>';
                                    echo ' <center>Możesz zobaczyć swój <a href="profile.php?id='.$user['id'].'"><button>profil</button></a> albo <a href="logout.php"><button>wylogować się</button></a></center>.</p>';
                                }

                                ?>

                                <hr />


                                <?php
                                session_start();



                                require 'config.php'; // Dołącz plik konfiguracyjny i połączenie z bazą
                                require_once 'class/user.class.php';

                                /**
                                 * Tylko dla zalogowanych u¿ytkowników
                                 */
                                if (!user::isLogged()) {
                                    echo '<p class="error"><center>Przykro nam, ale ta strona jest dostępna tylko dla zalogowanych użytkowników.</center></p>';
                                }

                                else {
                                    $id = $_GET['id'];

                                    /**
                                     * Sprawdź czy użytkownik o podanym ID istnieje
                                     */
                                    $userExist = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE id = '$id'"));

                                    // Użytkownik nie istnieje
                                    if ($userExist[0] == 0) {
                                        die ('<p><center>Przykro nam, ale użytkownik o podanym identyfikatorze nie istnieje.</center></p>');
                                    }

                                    /**
                                     * Użtkownik istnieje, tak więc pokaż jego profil
                                     */
                                    
                                    // Zapisz dane użytkownika o podanym ID, do zmiennej $profile
                                    $profile = user::getDataById ($id);
                                    
                                    echo '<p><center>Profil użytkownika '.$profile['login']. ':</p></center>';

                                    echo '<center><b>Nick:</b> '.$profile['login'].'</center><br />';
                                    
                                    echo '<center><b>Email:</b> '.$profile['email'].'</center><br />';
                                    echo "<center><a href=\"adminindex.php\"><button>Wstecz</button></a></center><br />";


                                }

                                ?>
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





