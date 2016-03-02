<?php
class virushcode {
	public function cuaca ($url) {
		$fileContents= file_get_contents($url);
		$fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
		$fileContents = trim(str_replace('"', "'", $fileContents));
		$simpleXml = simplexml_load_string($fileContents);
		$json = json_encode($simpleXml);
		return $json;
	}
}
$coba = virushcode::cuaca("cuaca.xml"); // Get Data From http://data.bmkg.go.id/cuaca_indo_1.xml
$json = json_decode($coba, true);
echo "<center><h2>".$json['Tanggal']['Mulai']." - ".$json['Tanggal']['Sampai']."</h2></center>";
$no = 0;
echo "<center><pre>";
while ($no <= 35) {
	$no++;
	$kota = $json['Isi']['Row'][$no]['Kota'];
	$cuaca = $json['Isi']['Row'][$no]['Cuaca'];
	echo $kota ." [<b>". $cuaca."</b>]<br>";
}
echo "</pre></center><br>";
print_r(expression)
?>
