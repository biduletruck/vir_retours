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
    public function barCodeGenerator($barcode)
    {
        $myBarcode = new barCode();
        return $bcHTMLRaw = $myBarcode->getBarcodeHTML($barcode, 'C128', 1.75, 45);
    }

}