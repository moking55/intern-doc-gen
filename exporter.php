<?php
include './vendor/autoload.php';
session_start();
date_default_timezone_set('Asia/Bangkok');

use Mpdf\Mpdf;

$mpdf = new mPDF();

$mpdf->AddPage();
$mpdf->setSourceFile('./source.pdf');
$tplIdx = $mpdf->importPage(1);
$mpdf->useTemplate($tplIdx, 3, 3, 205);
$mpdf->SetTextColor(0, 0, 0);

$baseY = 78;

$company_info = $_SESSION['company_info'];

$mpdf->SetFont('freeserif', 'R', 11); // Set the font to support Thai characters

$mpdf->SetY(37);
$mpdf->Write(0, ($company_info['expect'] == "1")? "✔" : "", 71.1);
$mpdf->Write(0, ($company_info['expect'] == "2")? "✔" : "", 107.3);
$mpdf->Write(0, ($company_info['expect'] == "3")? "✔" : "", 141.6);

$mpdf->SetY($baseY);
$mpdf->Write(0, $company_info['company_name'], 52);
$mpdf->Write(0, $company_info['type'], 56);
$mpdf->SetY($baseY + 11);
$mpdf->Write(0, $company_info['address_number'], 38);
$mpdf->SetX(0);
$mpdf->Write(0, $company_info['address_moo'], 53);
$mpdf->SetX(0);
$mpdf->Write(0, $company_info['address_road'], 69);
$mpdf->SetX(0);
$mpdf->Write(0, $company_info['address_thambon'], 115);
$mpdf->SetX(0);
$mpdf->Write(0, $company_info['address_amphoe'], 152);
$mpdf->SetY($baseY + 17);
$mpdf->Write(0, $company_info['address_provine'], 34);
$mpdf->SetX(0);
$mpdf->Write(0, $company_info['address_zipcode'], 91);
$mpdf->SetX(0);
$mpdf->Write(0, $company_info['address_tel'], 152);
$mpdf->SetY($baseY + 23);
$mpdf->Write(0, $company_info['address_fax'], 46);
$mpdf->SetX(0);
$mpdf->Write(0, $company_info['address_email'], 88);
$mpdf->SetX(0);
$mpdf->Write(0, $company_info['address_web'], 145);
$mpdf->SetY($baseY + 29);
$mpdf->Write(0, $company_info['department'], 59);
$mpdf->SetY($baseY + 35);
$mpdf->Write(0, $company_info['duties'], 45);
$mpdf->SetY($baseY + 40.5);
$mpdf->Write(0, $company_info['tasks'], 91);
$mpdf->SetY($baseY + 52);
$mpdf->Write(0, $company_info['contact'], 35.5);
$mpdf->SetX(0);
$mpdf->Write(0, $company_info['contact_position'], 96);
$mpdf->SetX(0);
$mpdf->Write(0, $company_info['contact_tel'], 166.5);
$mpdf->SetY($baseY + 58);
$mpdf->Write(0, $company_info['contact_email'], 29);
$mpdf->SetX(0);
$mpdf->Write(0, ($company_info['relation'] == 'ญาติ') ? "✔" : "", 109); // ญาติ
$mpdf->SetX(0);
$mpdf->Write(0, ($company_info['relation'] == 'คนรู้จัก') ? "✔" : "", 121); // คนรู้จัก
$mpdf->SetX(0);
$mpdf->Write(0, ($company_info['relation'] == 'หาด้วยตนเอง') ? "✔" : "", 136); // หาด้วยตนเอง
$mpdf->SetX(0);
$mpdf->Write(0, ($company_info['relation'] == 'อื่นๆ') ? "✔" : "", 160); // อื่นๆ
$mpdf->SetX(0);
$mpdf->Write(0, $company_info['other_relation'], 181); // อื่นๆ

$mpdf->SetY($baseY + 76);
$mpdf->Write(0, $company_info['position'], 35.5);
$mpdf->SetX(0);
$mpdf->Write(0, $company_info['hr_department'], 111);
$mpdf->Write(0, $company_info['phone'], 48);
$mpdf->SetX(0);
$mpdf->Write(0, $company_info['fax'], 105);
$mpdf->Write(5.6, $company_info['email'], 30);

$students_data_page1 = $_SESSION['students_data'];
// select only 2 students
$students_data_page1 = array_slice($students_data_page1, 0, 2);

$baseStudentY = 189;
foreach ($students_data_page1 as $key => $value) {
    $mpdf->SetY($baseStudentY);
    $mpdf->Write(0, $value['std_name'], 35);
    $mpdf->SetX(0);
    $mpdf->Write(0, $value['std_id'], 106);
    $mpdf->SetX(0);
    $mpdf->Write(0, $value['std_nickname'], 144);
    $mpdf->SetX(0);
    $mpdf->Write(0, $value['std_gpa'], 178);
    $mpdf->SetY($baseStudentY + 5.5);
    $mpdf->Write(0, $value['std_tel'], 43);
    $mpdf->SetX(0);
    $mpdf->Write(0, $value['std_email'], 80);
    $mpdf->SetX(0);
    $mpdf->Write(0, $value['std_facebook'], 147);
    $mpdf->SetY($baseStudentY + 10);
    $mpdf->Write(8, $value['std_line'], 31);
    $mpdf->SetY($baseStudentY + 22);
    $mpdf->Write(0, $value['std_parent_name'], 36);
    $mpdf->SetX(0);
    $mpdf->Write(0, $value['std_parent_relation'], 106);

    $mpdf->Write(0, $value['std_parent_address'], 29);

    $mpdf->Write(6.2, $value['std_parent_telhome'], 56);
    $mpdf->SetX(0);
    $mpdf->Write(6.2, $value['std_parent_telphone'], 141);
    $baseStudentY = 241;
}

$mpdf->AddPage();
$tplIdx = $mpdf->importPage(2);
$mpdf->useTemplate($tplIdx, 3, 3, 205);
$mpdf->SetY(25);

$students_data_page2 = $_SESSION['students_data'];
// pop first 2 students
array_shift($students_data_page2);
array_shift($students_data_page2);

$baseStudentY = 24;

foreach ($students_data_page2 as $key => $value) {
    $mpdf->SetY($baseStudentY);
    $mpdf->Write(0, $value['std_name'], 33);
    $mpdf->SetX(0);
    $mpdf->Write(0, $value['std_id'], 106);
    $mpdf->SetX(0);
    $mpdf->Write(0, $value['std_nickname'], 144);
    $mpdf->SetX(0);
    $mpdf->Write(0, $value['std_gpa'], 178);
    $mpdf->SetY($baseStudentY + 5.5);
    $mpdf->Write(0, $value['std_tel'], 43);
    $mpdf->SetX(0);
    $mpdf->Write(0, $value['std_email'], 80);
    $mpdf->SetX(0);
    $mpdf->Write(0, $value['std_facebook'], 147);
    $mpdf->SetY($baseStudentY + 10);
    $mpdf->Write(8, $value['std_line'], 31);
    $mpdf->SetY($baseStudentY + 22);
    $mpdf->Write(0, $value['std_parent_name'], 36);
    $mpdf->SetX(0);
    $mpdf->Write(0, $value['std_parent_relation'], 106);

    $mpdf->Write(6.3, $value['std_parent_address'], 29);

    $mpdf->Write(6.6, $value['std_parent_telhome'], 56);
    $mpdf->SetX(0);
    $mpdf->Write(6.6, $value['std_parent_telphone'], 141);
    $baseStudentY = $baseStudentY + 52;
}

// recieve signature from step3.php
$signature = $_POST['signature'];
$imageName = './signatures/signature_' . uniqid() . '.png';
// convert base64 to image
$signature = str_replace('data:image/png;base64,', '', $signature);
$signature = str_replace(' ', '+', $signature);
$signature = base64_decode($signature);
file_put_contents($imageName, $signature);

// add signature to pdf
$mpdf->Image($imageName, 115, 184, 36, 20, 'PNG', '', true, false);
$mpdf->SetY(199.3);
$mpdf->Write(0, $students_data_page1[0]['std_name'], 116);

// shorted thai month
$thaiMonth = array(
    '01' => 'ม.ค.',
    '02' => 'ก.พ.',
    '03' => 'มี.ค.',
    '04' => 'เม.ย.',
    '05' => 'พ.ค.',
    '06' => 'มิ.ย.',
    '07' => 'ก.ค.',
    '08' => 'ส.ค.',
    '09' => 'ก.ย.',
    '10' => 'ต.ค.',
    '11' => 'พ.ย.',
    '12' => 'ธ.ค.',
);

// get current date
$mpdf->SetY(204.6);
$mpdf->Write(0, date("d"), 121);
$mpdf->SetX(0);
$mpdf->Write(0, $thaiMonth[date("m")], 129);
$mpdf->SetX(0);
$mpdf->Write(0, date("Y") + 543, 140);



$fileName = './export/gen_' . uniqid() . '.pdf';
$mpdf->Output($fileName);

Header('Location: ' . $fileName);
