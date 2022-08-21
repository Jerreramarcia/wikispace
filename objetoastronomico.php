<?php
class ObjetoAstronomico
{

    private $descripcion;
    private $nombre;
    private $tipo;

    function __construct($dscrp,$tipo,$nombre)
    {
        $this->descripcion = $dscrp;
        $this->tipo=$tipo;
        $this->nombre = $nombre;

    }

    function getDescription(){
         return $this->descripcion;
	}

}





?>
