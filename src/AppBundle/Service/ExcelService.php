<?php
/**
 * Created by PhpStorm.
 * User: biduletruck
 * Date: 13/12/17
 * Time: 23:03
 */

namespace AppBundle\Service;

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


    public function saveExcel($claseur, $title)
    {
        $writer = new Xlsx($claseur);
        $writer->save($title.'.xlsx');
        return new Response();
    }

    public function newExcelFromModel($claseur, $title)
    {
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('/model/baseModelVir.xlsx');

        $worksheet = $spreadsheet->getActiveSheet();

        $worksheet->getCell('A1')->setValue('John');
        $worksheet->getCell('A2')->setValue('Smith');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
        $writer->save('write.xls');
    }

    public function exportExcel($claseur, $title)
    {
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($claseur, "Xlsx");
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $title .'.xls"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function exportPdf($claseur, $title)
    {
        IOFactory::registerWriter('Pdf', \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf::class);

        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment;filename="'. $title .'.pdf"');
        header('Cache-Control: max-age=0');
        $writer = IOFactory::createWriter($claseur, 'Pdf');
        $writer->save('php://output');
    }


}