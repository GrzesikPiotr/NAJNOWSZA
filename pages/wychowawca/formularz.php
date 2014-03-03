	<?php
require '../config.php';

require_once '../class/wychowawca.class.php';
?>
<?php
if(!isset($_SESSION['login']) AND !isset($_SESSION['pass'])){
    header("Location:../wychowwca.php");
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
<link rel="stylesheet" type="text/css" href="../wychowawca/formularz.css" />
<link rel="shortcut icon" href="../../images/ico/favicon.ico" />
<meta name="Description" content="SWOS" />
<meta name="keywords" content="SWOS" />
<meta name="Author" content="Piotr Grzesik" />
<meta name="copyright" content="Grzesik Piotr" />
<meta name="Robots" content="ALL" />
</head>

<body>

	<?php
            if (user::isLogged()) {
                $user = user::getData('', '');                          
            }
                

			echo "#komunikat#";
			echo "<center>";
			echo "<form action=\"#strona#\" method=\"post\" id=\"formularz\">";
				
				echo "<div>";
					echo "<label><i>Wychowawca: </i><span class=\"red\">*</span></label>";
					echo "<input type=\"text\" id=\"wychowawca\" name=\"wychowawca\" value=\"{$user['nazwisko']} {$user['imie']}\" />";
				echo "</div><br/>";

				echo "<div>";
					echo "<label><i>Adres e-mail: </i><span class=\"red\">*</span></label>";
					echo "<input type=\"text\" id=\"mail\" name=\"mail\" value=\"#mail#\" />";
				echo "</div><br/>";

				echo "<div>";
					echo "<label><i>Temat: </i><span class=\"red\">*</span></label>";
					echo "<input type=\"text\" id=\"temat\" name=\"temat\" value=\"#temat#\" />";
				echo "</div><br/>";

				echo "<div>";
					echo "<label><i>Treść: </i><span class=\"red\">*</span></label>";
					echo "<textarea cols=\"30\" rows=\"5\" id=\"tresc\" name=\"tresc\" >#tresc#</textarea>";
				echo "</div><br/>";

				echo "<div>";
					echo "<span class=\"red\">*</span> - oznaczone pola są wymagane.";
				echo "</div><br/>";

				echo "<div>";
					echo "<input type=\"hidden\" value=\"Wyślij\" /><button>Wyślij</button>";
				echo "</div>";
				
			echo "</form>";
			echo "</center>";
	?>
</body>