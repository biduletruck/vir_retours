<?php
/**
 * Created by PhpStorm.
 * User: biduletruck
 * Date: 16/12/17
 * Time: 22:01
 */

namespace AppBundle\Twig\Extension;



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
            $etage = substr($emplacement,-2);

            $position = $rack . "-" . $alveole . "-" . $etage;
        }

        return $position;

    }

    public function getName()
    {
        return 'rack_extension';
    }

}