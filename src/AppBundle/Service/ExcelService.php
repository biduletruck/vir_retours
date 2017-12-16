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


    public function saveExcel($spreadsheet, $title)
    {
        $writer = new Xlsx($spreadsheet);
        $writer->save($title.'.xlsx');
        return new Response();
    }

    public function exportExcel($spreadsheet, $title)
    {
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $title .'.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function exportPdf($spreadsheet, $title)
    {
        IOFactory::registerWriter('Pdf', \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf::class);

        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment;filename="'. $title .'.pdf"');
        header('Cache-Control: max-age=0');
        $writer = IOFactory::createWriter($spreadsheet, 'Pdf');
        $writer->save('php://output');
    }


}