<?php

	include './Classes/PHPExcel.php';
	include './Classes/PHPExcel/IOFactory.php';

	// エクセルファイルを読み込む
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

	// ヘッダー出力
	$header = str_pad('名前', 18, '　') 
	        . str_pad('国語', 9, '　') 
	        . str_pad('数学', 9, '　') 
	        . str_pad('英語', 9, '　') 
	        . str_pad('社会', 9, '　') 
	        . str_pad('理科', 9, '　')
	        . "合計点\n";
	echo $header;

	// 読み取りデータ出力
	foreach ($sheetData as $key => $data) {
		if ($key < 3) {
			continue;
		}
		// 合計点
		$sum = $data[3] + $data[4] + $data[5] + $data[6] + $data[7];
		// レコード出力
		$record = str_pad("{$data[1]} {$data[2]}", 21, '　') 
		        . str_pad($data[3], 9, '　') 
		        . str_pad($data[4], 9, '　') 
		        . str_pad($data[5], 9, '　') 
		        . str_pad($data[6], 9, '　') 
		        . str_pad($data[7], 9, '　')
		        . "{$sum}\n";
		echo $record;
	}
