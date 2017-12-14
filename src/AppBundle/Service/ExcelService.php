<?php
/**
 * Created by PhpStorm.
 * User: biduletruck
 * Date: 13/12/17
 * Time: 23:03
 */

namespace AppBundle\Service;

//require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Component\HttpFoundation\Response;

class ExcelService
{

    public function newExcel()
    {
      return $spreadsheet = new Spreadsheet();
    }


    public function saveExcel($spreadsheet, $title, $ext = '.xlsx')
    {
        $writer = new Xlsx($spreadsheet);
        $writer->
        $writer->save($title.$ext);

        return new Response();

    }

    public function savePdf($spreadsheet)
    {
        IOFactory::registerWriter('Pdf', \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf::class);
// Redirect output to a client’s web browser (PDF)
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment;filename="01simple.pdf"');
        header('Cache-Control: max-age=0');
        $writer = IOFactory::createWriter($spreadsheet, 'Pdf');
        $writer->save('php://output');
    }


}