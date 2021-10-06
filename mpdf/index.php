<?php
$currentUrlPath = "/mpdf";

$ff = scandir('./');

sort($ff);

$files = array();
foreach ($ff AS $f) {
	if (preg_match('/example[0]{0,1}(\d+)_(.*?)\.php/',$f,$m)) {
		$num = intval($m[1]);
		$files[$num] = array(ucfirst(preg_replace('/_/',' ',$m[2])), $m[0]);
	}
}
echo '<html><body><h3>mPDF Example Files</h3><ol>';

foreach ($files AS $n => $f) {
	echo '<li value="'.$n.'"><a href="' . $currentUrlPath. "/" . $f[1] . '">' . $f[0] . '</a>';
}

echo '</ol></body></html>';
exit;
