<?php
$liczniktxt = './licznik.txt';
$licznik = trim(file_get_contents($liczniktxt));
$licznik+=1;
file_put_contents($liczniktxt, $licznik);
echo("Licznik odwiedzin: ".$licznik);
?>


<h1>wyraz swoja opinie: </h1>
<h3>(max 255 znakow)
</h3>


<FORM action="">
<textarea name="opinia" cols="50" rows="10"></textarea><br>
<input type="submit" value="wyslij" name="przycisk">
</FORM>



<?php
if(!$fd = fopen('plik.txt', 'r+')){
	echo("nie moge otworzyc pliku");
}
else{
	if(isset($_GET['przycisk']))
	{
	$opinia = $_GET['opinia'];
	$opinia = substr($opinia,0,255);
	$opinia = "----------------------------\n".$opinia."\n";
	file_put_contents('./plik.txt', $opinia, FILE_APPEND );
	
	}
	$i=0;
	while(!feof($fd)){
		$str = fgets($fd);
		$str = nl2br($str);
		$tablica[$i] = $str;
		$i++;
	}
	while($i >= 0){
		// jesli chcielibysmy odwracac caly plik przed wyswietleniem tutaj trzebaby bylo wpisywac po kolei wartosci do pliku
		echo($tablica[$i]);
		$i--;
	}

	fclose($fd);

}

?>
