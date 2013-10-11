<?php
/* @var $this MarriageCertificateController */
/* @var $model MarriageCertificate */

	$pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf', 
								'P', 'cm', 'A4', true, 'UTF-8');
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor("Terence Monteiro");
	$pdf->SetTitle("Parish Profile Report");
	$pdf->SetSubject("Parish Profile Report");
	$pdf->SetKeywords("PDF");
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	#$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont("times", "B", 20);
	$pdf->Cell(0,1,"",0,1);
	$year = date_format(new DateTime(), 'Y');
	$pdf->Cell(0,0,"Annual General Statistical Questionnaire $year",0,1,'C');
	$pdf->SetFont("times", "B", 13);
	$pdf->Cell(0,0,"Situation on 1st January $year to December 31st, $year.",0,1,'C');
	$pdf->Line(1.2,3.6,19.5,3.6,array('width' => 0.03));
	$pdf->SetFont("courier", "R", 11);
	$pdf->Cell(0,2,'',0,1);

$pdf->count = 0;

function date_ind($dt) {
	return date_format(new DateTime($dt), 'd/m/Y');
}

function draw_line($pdf, $ln = 0) {
	$pdf->Line(12.5,9.7+$pdf->count*0.8,15.0,9.7+$pdf->count*0.8,array('width' => 0.01, 'dash' => 3));
	$pdf->count += 1.5;
}

function show_field($pdf, $label, $value) {
	$ln = strlen($label);
	if ($ln < 55) {
		$ln = 55;
	}
	$pdf->Cell(0,0.3,sprintf("%-${ln}s", "$label :"),0,0,'L');
	$pdf->Cell(0,0,"$value                                                ",0,1,'R');
	$pdf->Cell(0,0.6,'',0,1,'L');
	$pdf->Cell(1.6,0,"",0,0);
	draw_line($pdf, $ln);
}

	$pdf->Cell(1,0,"",0,0);
	$pdf->SetFont("times", "B", 14);
	$pdf->Cell(0,0.8,sprintf("%-20s: %s", "Name of the Parish", Yii::app()->params['parishName']),0,1,'L');
#	$pdf->Text(1.9,5.55,sprintf("%-20s: %s", "Name of the Parish", Yii::app()->params['parishName']));
	$pdf->Line(6.7,6.25,10.5,6.25,array('width' => 0.01, 'dash' => 3));

	$pdf->Cell(0,1,'',0,1);
	$pdf->Cell(1,0,'',0,0);
	$pdf->Cell(0,0.8,"1. Baptisms",0,1,'L');
	$pdf->Cell(0,1,'',0,1);
	$pdf->SetFont("times", "R", 14);
	$pdf->Cell(1.6,0,"",0,0);
	show_field($pdf, "A. Up to 1 Year old", $baptised1);
	show_field($pdf, "B. From 1 to 7 Years old", $baptised7);
	show_field($pdf, "C. Over 7 Years old", $baptised7p);
	show_field($pdf, "Total No of Baptism (A+B+C)", $baptised);
	$pdf->Cell(0,0.5,'',0,1);
	$pdf->Cell(1,0,'',0,0);
	$pdf->SetFont("times", "B", 14);
#	$pdf->Cell(0,0.8,"2. Confirmations during the year",0,1,'L');
	$pdf->count += 0.9;
	show_field($pdf, "2. Confirmations during the year", $confirmed);
	
	$pdf->Cell(0,0.5,'',0,1);
	$pdf->Cell(1,0,'',0,0);
	$pdf->SetFont("times", "B", 14);
	$pdf->count += 0.9;
	show_field($pdf, "3. First Holy Communion during the year", $confirmed);

	$pdf->Cell(0,0.1,'',0,1);
	$pdf->Cell(1,0,'',0,0);
	$pdf->Cell(0,0.8,"4. Marriages",0,1,'L');
	$pdf->Cell(0,1,'',0,1);
	$pdf->SetFont("times", "R", 14);
	$pdf->Cell(1.6,0,"",0,0);
	$pdf->count += 2.9;
	show_field($pdf, "A. Between Catholics", "", 0, 1, 'L');
	show_field($pdf, "B. Between Catholic & Non Catholic", "", 0, 1, 'L');
	show_field($pdf, "Total Numbers of Marriages (A+B)", "", 0, 1, 'L');
#	draw_line($pdf);

	$pdf->SetFont("times", "B", 12);
	$y = 27;
	$pdf->Text(2,$y,'Name of the Parish Priest');
	$pdf->Text(10,$y,'Seal');
	$pdf->Text(16,$y,'Signature');

	$pdf->AddPage();

	$pdf->Cell(7,0,'',0,0);
	$pdf->SetFont("times", "B", 14);
	$pdf->SetLineStyle(array('width' => 0.01, 'dash' => 0));
	$pdf->Cell(4,1,'MASS TIMINGS','B',1,'C');

	$pdf->SetFont("times", "R", 14);
	$pdf->SetLineStyle(array('width' => 0.01, 'dash' => 3));
	$pdf->Cell(1,1,'',0,1);
	$pdf->Cell(1,0,'',0,0);
	$pdf->Cell(7,1,'Name & Address of the Parish',0,0,'L');
	$pdf->Cell(6,1,'','B',1);
	$pdf->Cell(8,0,'',0,0);
	$pdf->Cell(6,1,'','B',1);

	$pdf->Cell(0,1,'',0,1,'L');
	$pdf->Cell(1.5,0,'',0,0,'L');

	$pdf->SetLineStyle(array('width' => 0.01, 'dash' => 0));
	$pdf->Cell(4,1,'','LTR',0,'L');
	$pdf->Cell(12,1,'Holy Mass','TRB',1,'C');
	$pdf->Cell(1.5,0,'',0,0,'L');
	$pdf->Cell(4,1,'','LRB',0,'L');
	$pdf->Cell(6,1,'Time','RB',0,'C');
	$pdf->Cell(6,1,'Language','RB',1,'C');

$day_masses = array();
foreach ($schedule as $data) {
	$day = $data->day;
	$mass = array(
		'time' => $data->time,
		'language' => $data->language);

	if (!isset($day_masses[$day])) {
		$day_masses[$day] = array($mass);
	} else {
		array_push($day_masses[$day], $mass);
	}
}

foreach ($day_masses as $day => $masses) {
	$wday = FieldNames::value('weekdays', $day);
	$nm = count($masses);
	$pdf->Cell(1.5,0,'',0,0,'L');
	$pdf->Cell(4,$nm,$wday,'LRB',0,'C');
	foreach($masses as $i => $mass) {
		$pdf->Cell(6,1,date_format(new DateTime($mass['time']), 'g:i a'),'R',0,'C');
		$pdf->Cell(6,1,FieldNames::value('languages', $mass['language']),'R',1,'C');
		$pdf->Cell(5.5,0,'',0,0,'L');
	}
	$pdf->Cell(12,1,'','T',0,'L');
}
	
	$pdf->SetLineStyle(array('width' => 0.01, 'dash' => 3));
	$pdf->Cell(1,1,'',0,1,'L');
	$pdf->Cell(1.5,0,'',0,0,'L');
	$pdf->Cell(2.5,1,'Adoration',0,0,'L');
	$pdf->Cell(7,1,'','B',1);
	$pdf->Cell(1.5,0,'',0,0,'L');
	$pdf->Cell(2.5,1,'Confession',0,0,'L');
	$pdf->Cell(7,1,'','B',1);
	$pdf->Cell(1.5,0,'',0,0,'L');
	$pdf->Cell(2.5,1,'Novena',0,0,'L');
	$pdf->Cell(7,1,'','B',1);

	$pdf->SetFont("times", "B", 12);
	$y = 27;
	$pdf->Text(2,$y,'Name of the Parish Priest');
	$pdf->Text(10,$y,'Seal');
	$pdf->Text(16,$y,'Signature');

	$pdf->Output("parish-profile-$year.pdf", "I");
	Yii::app()->end();

?>
