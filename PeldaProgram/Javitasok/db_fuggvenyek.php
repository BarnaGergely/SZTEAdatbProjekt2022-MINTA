<?php

function konyvtar_csatlakozas() {
	
	$conn = mysqli_connect("localhost", "root", "") or die("Csatlakozási hiba");
	if ( false == mysqli_select_db($conn, "KONYVTAR" )  ) {
		
		return null;
	}

	

	
	// a karakterek helyes megjelenítése miatt be kell állítani a karakterkódolást!
	mysqli_query($conn, 'SET NAMES UTF8');
	mysqli_query($conn, 'SET character_set_results=utf8');
	mysqli_set_charset($conn, 'utf8');

	// Ez a modernebb és a dokumentáció szerint ajánlott módszer erre, ezért ezt is mejívom a biztosnág kedvéért
	// https://stackoverflow.com/questions/10829816/set-character-set-using-mysqli
	$conn->set_charset("utf8");
	
	
	return $conn;
	
}

function konyvet_beszur($konyvszam, $szerzo, $cim, $kiado, $ev) {
	
	
	if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"INSERT INTO KONYVEK(konyvszam, szerzo, cim, kiado, ev) VALUES (?, ?, ?, ?, ?)");
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "ssssd", $konyvszam, $szerzo, $cim, $kiado, $ev );
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
	
}

function konyvlistatLeker() {
	
	if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	// elokeszitjuk az utasitast
	$result = mysqli_query( $conn,"SELECT konyvszam, cim, szerzo, kiado, ev FROM KONYVEK");
	
	mysqli_close($conn);
	return $result;
	
}

function olvasolistatLeker() {
	
	if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	// elokeszitjuk az utasitast
	$result = mysqli_query( $conn,"SELECT olvasojegy, nev, szuldatum, lakcim FROM OLVASOK");
	
	mysqli_close($conn);
	return $result;
}

function olvasot_beszur($olvasojegy, $nev, $szuldatum, $lakcim) {
	if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"INSERT INTO OLVASOK(olvasojegy, nev, szuldatum, lakcim) VALUES (?, ?, ?, ?)");
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "dsss", $olvasojegy, $nev, $szuldatum, $lakcim);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
	
}


function szabad_konyveket_listaz() {
	
	if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	// elokeszitjuk az utasitast
	$result = mysqli_query( $conn,"SELECT konyvszam, CONCAT(konyvszam, ' - ', szerzo, ': ', cim, '. ', kiado, ' ', ev) AS konyv FROM KONYVEK WHERE olvasojegy IS NULL") or die(mysqli_error($conn));
	
	
	mysqli_close($conn);
	return $result;
}

function kolcsonzott_konyvek_listaja() {
	if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	// elokeszitjuk az utasitast
	$result = mysqli_query( $conn,"SELECT konyvszam, cim, szerzo, kiado, ev, CONCAT(OLVASOK.olvasojegy, ' - ', OLVASOK.nev) AS olvaso FROM KONYVEK, OLVASOK WHERE KONYVEK.olvasojegy = OLVASOK.olvasojegy") or die(mysqli_error($conn));
	
	
	mysqli_close($conn);
	return $result;
}

function kolcsonzest_beszur($konyvszam, $olvasojegy) {
	if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"UPDATE KONYVEK SET olvasojegy = ? WHERE konyvszam = ?");
	
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "ds", $olvasojegy, $konyvszam);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
}

function kolcsonzes_torlese($konyvszam) {
	if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"UPDATE KONYVEK SET olvasojegy = NULL WHERE konyvszam = ?");
	
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "s", $konyvszam);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
}
