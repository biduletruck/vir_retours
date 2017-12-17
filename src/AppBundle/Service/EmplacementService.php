<?php
/**
 * Created by PhpStorm.
 * User: biduletruck
 * Date: 17/12/17
 * Time: 18:39
 */

namespace AppBundle\Service;


class EmplacementService
{

    public function transformRack($emplacement)
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

    public function transformArrayRack($emplacements)
    {
        $arrayNewEmplacements = [];
        foreach ($emplacements as $newEmplacement)
        {
            $arrayNewEmplacements[] = $this->transformRack($newEmplacement);
        }
        $comma_separated = implode(",", $arrayNewEmplacements);
        return str_replace(",","\n",$comma_separated);
    }
}