<?php

include './Classes/PHPExcel.php';
include './Classes/PHPExcel/IOFactory.php';

// xlsファイルを読み込む
$obj = PHPExcel_IOFactory::load("data.xlsx");

// 読み込みたいシートを設定する
$sheet = $obj->setActiveSheetIndex(0);

// 行イテレータ取得
$sheetData = array();
foreach ($sheet->getRowIterator() as $row) {
	$tmp = array();
	// 列イテレータ取得
	foreach ($row->getCellIterator() as $cell) {
		// セルの値取得
		$tmp[] = $cell->getValue();
	}
	$sheetData[] = $tmp;
}

foreach ($sheetData as $key => $data) {
	if ($key < 3) {
		continue;
	}
	$sum = $data[3] + $data[4] + $data[5] + $data[6] + $data[7];
	foreach ($data as $key => $result) {
		echo "{$result} ";
	}
	echo $sum . "\n";
}
