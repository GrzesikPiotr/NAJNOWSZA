<?php 

include ('ustawienia.php');

ob_start();
    include('formularz.php');
    $formularz = ob_get_contents();
ob_end_clean();


function wyswietl_forme($komunikat='') {
	global $formularz;
	
	$do_zmiany = array(
		'#komunikat#',
		'#strona#',
		'#wychowawca#',
		'#mail#',
		'#temat#',
		'#tresc#'
	);
	$zmien_na = array(
		$komunikat,
		$_SERVER['REQUEST_URI'],
		$_POST['wychowawca'],
		$_POST['mail'],
		$_POST['temat'],
		$_POST['tresc']
	);
	
	$formularz = str_replace ( $do_zmiany, $zmien_na, $formularz);
	
	return $formularz;	
}


function waliduj() {
	global $komunikat;
	global $valid;
	
	if( $valid['wychowawca'] > 0 ) {
		if(strlen($_POST['wychowawca']) < $valid['wychowawca'] ){
			$walidacja['wychowawca'] = $komunikat['wychowawca']; 
		}
	}
	
	if( $valid['mail'] == 1 ) {
		if(!filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL)) {
			$walidacja['mail'] =  $komunikat['mail'];
		}
	}
	
	if( $valid['temat'] > 0 ) {
		if(strlen($_POST['temat']) < $valid['temat'] ){
			$walidacja['temat'] = $komunikat['temat']; 
		}
	}
	
	if( $valid['tresc'] > 0 ) {
		if(strlen($_POST['tresc']) < $valid['tresc'] ){
			$walidacja['tresc'] = $komunikat['tresc']; 
		}
	}
	
	if(empty($walidacja)) {
		return 'true';
	}else{
		return $walidacja;
	}
	
}

// Działanie
if (($_SERVER['REQUEST_METHOD'] == 'POST')) {// wejście postem
		$walidacja = waliduj();
		
		if ($walidacja == 'true'){ //poprawnie wypełniony formularz
			
			if(mail($adres_odbiorcy,"=?UTF-8?B?".base64_encode($_POST['temat'])."?=",'<p>Od: <b>'.$_POST['wychowawca'].'</b></p><pre>'.$_POST['tresc'].'</pre>','From:'.$_POST['mail']."\r\nContent-Type: text/html; charset=utf-8")){ //sukces
				print '
					<div id="sukces">
						<p>'.$komunikat['sukces'].'</p>
					</div>
					';	
			}else{ //bląd serwera
				print '	
					<div id="blad">
						<p>'.$komunikat['fail'].'</p>
					</div>
					';
				print wyswietl_forme();
			}
			
		}else{
			//błędna walidacja
			$blad_walidacji = $walidacja;
			
			$blad_walidacji = '
					<div id="blad">
						<p>'.$komunikat['blad'].'</p>
						<ul>
						';
			foreach ($walidacja as $wpis) {
				$blad_walidacji .= '<li>'.$wpis.'</li>';
			}	
			$blad_walidacji .= '
						</ul>
					</div>
					';
					
			print wyswietl_forme($blad_walidacji);
		}	
	
}else{
	// nowe wejście
	print wyswietl_forme();
}

?>