<?php
/**
 * Table Definition for clasificado
 */
require_once 'DB/DataObject.php';

class DO_Clasificado extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'clasificado';         // table name
    public $idclasificado;                   // int(4)  primary_key not_null
    public $idciudad;                        // int(4)   not_null
    public $titulo;                          // varchar(50)   not_null
    public $detalle;                         // text   not_null
    public $idcategoria;                     // int(4)   not_null
    public $contacto;                        // varchar(100)   not_null
    public $fecha;                           // timestamp   not_null default_CURRENT_TIMESTAMP
    public $precio;                          // int(4)  
    public $telefono;                        // int(4)  
    public $moneda;                          // varchar(11)  
    public $estado;                          // varchar(30)   not_null default_pendiente

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Clasificado',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
