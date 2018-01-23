<?php

include './Classes/PHPExcel.php';
include './Classes/PHPExcel/IOFactory.php';

// xls�t�@�C����ǂݍ���
$obj = PHPExcel_IOFactory::load("data.xlsx");

// �ǂݍ��݂����V�[�g��ݒ肷��
$sheet = $obj->setActiveSheetIndex(0);

// �s�C�e���[�^�擾
$sheetData = array();
foreach ($sheet->getRowIterator() as $row) {
	$tmp = array();
	// ��C�e���[�^�擾
	foreach ($row->getCellIterator() as $cell) {
		// �Z���̒l�擾
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
