<?php
include("connect.php");
require 'vendor/autoload.php';

// Create a new Word document
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$result = mysqli_query($conn, "SELECT * FROM machines WHERE id = 42");
$row = mysqli_fetch_assoc($result);

// Add a section to the document
$section = $phpWord->addSection();

$fontSize = 11;

// Create a paragraph style with center alignment
$centerAlignment = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER);
$fontStyle = array('size' => $fontSize);
$section->addText('', $fontStyle, $centerAlignment);
$section->addText('Customer Name: ', $fontStyle, $centerAlignment);
$section->addText($row['customer_name'], $fontStyle, $centerAlignment);
$section->addText('________________________________', $fontStyle, $centerAlignment);
$section->addText('Model Name: ', $fontStyle, $centerAlignment);
$section->addText($row['model'], $fontStyle, $centerAlignment);
$section->addText('________________________________', $fontStyle, $centerAlignment);
$section->addText('Serial Number: ', $fontStyle, $centerAlignment);
$section->addText($row['serial_number'], $fontStyle, $centerAlignment);
$section->addText('________________________________', $fontStyle, $centerAlignment);
$section->addText('Fault Description: ', $fontStyle, $centerAlignment);
$section->addText($row['fault_description'], $fontStyle, $centerAlignment);
$section->addText('________________________________', $fontStyle, $centerAlignment);
$section->addText('Received Date: ', $fontStyle, $centerAlignment);
$section->addText($row['received_date'], $fontStyle, $centerAlignment);
$section->addText('________________________________', $fontStyle, $centerAlignment);
$section->addText('Delivery Date: ', $fontStyle, $centerAlignment);
$section->addText($row['delivery_date'], $fontStyle, $centerAlignment);
$section->addText('________________________________', $fontStyle, $centerAlignment);
$section->addText('Status: ', $fontStyle, $centerAlignment);
$section->addText($row['status'], $fontStyle, $centerAlignment);
$section->addText('________________________________', $fontStyle, $centerAlignment);
$section->addText('Signature: ', $fontStyle, $centerAlignment);
$section->addText('', $fontStyle, $centerAlignment);
$section->addText('', $fontStyle, $centerAlignment);
$section->addText('', $fontStyle, $centerAlignment);
$section->addText('', $fontStyle, $centerAlignment);
$section->addText('________________________________', $fontStyle, $centerAlignment);

// Save the document
$filename = 'output.docx';
$phpWord->save($filename);

// Set the Content-Type header to specify the MIME type
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Content-Length: ' . filesize($filename));

// Output the file contents
readfile($filename);

// Optionally, delete the file after download to clean up
unlink($filename);

exit;
?>