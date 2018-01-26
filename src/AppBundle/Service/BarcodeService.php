<?php
/**
 * Created by PhpStorm.
 * User: yclem001
 * Date: 10/11/2017
 * Time: 11:22
 */

namespace AppBundle\Service;

use BG\BarcodeBundle\Util\Base1DBarcode as barCode;
use BG\BarcodeBundle\Util\Base2DBarcode as matrixCode;

class BarcodeService
{

    //code barre classique
    public function barCodeGenerator($barcode)
    {
        $myBarcode = new barCode();
        return $bcHTMLRaw = $myBarcode->getBarcodeHTML($barcode, 'C128', 1.75, 45);
    }

    public function barCodeGeneratorHd($barcode)
    {
        $myBarcode = new barCode();
        return $bcHTMLRaw = $myBarcode->getBarcodeHTML($barcode, 'C128', 4.375, 112.5);
    }

    // qrCode
    public function qrCodeGenerator($barcode)
    {
        $myBarcode = new matrixCode();
        return $bcHTMLRaw = $myBarcode->getBarcodeHTML($barcode, 'QRCODE', 3, 3);
    }

    public function qrCodeGeneratorHd($barcode)
    {
        $myBarcode = new matrixCode();
        return $bcHTMLRaw = $myBarcode->getBarcodeHTML($barcode, 'QRCODE', 4, 4);
    }
}
