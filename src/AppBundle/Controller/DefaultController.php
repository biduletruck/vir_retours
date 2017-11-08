<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BG\BarcodeBundle\Util\Base1DBarcode as barCode;
use BG\BarcodeBundle\Util\Base2DBarcode as matrixCode;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/bc", name="barcodetest")
     */
    public function bcAction(Request $request)
    {
        $myBarcode = new barCode();
        $bcHTMLRaw = $myBarcode->getBarcodeHTML('501234567890', 'C128', 1.75, 45);
        return $this->render('default/barcode.html.twig', array(

            'barcodeHTML' => $bcHTMLRaw,
        ));
    }

}
