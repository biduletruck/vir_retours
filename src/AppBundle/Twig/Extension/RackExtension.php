<?php
/**
 * Created by PhpStorm.
 * User: biduletruck
 * Date: 16/12/17
 * Time: 22:01
 */

namespace AppBundle\Twig\Extension;


use Psr\Log\NullLogger;

class RackExtension extends \Twig_Extension
{

    public function getFilters()
    {
        return array(new \Twig_SimpleFilter('rack', array($this, 'transformRack')));
    }

    function transformRack($emplacement)
    {
        $position = "En attente";

        if(!$emplacement == Null)
        {
            $rack = substr($emplacement, 3, 1);
            $alveole = substr($emplacement, 8, 2);
            $etage = $y =substr($emplacement,-2);

            $position = $rack . "-" . $alveole . "-" . $etage;
        }

        return $position;
         /*
        A-3-2	ERAA**000302
        M-O-O	EM*O**000000
        15	    EM*O**00000015
        */
    }

    public function getName()
    {
        return 'rack_extension';
    }

}