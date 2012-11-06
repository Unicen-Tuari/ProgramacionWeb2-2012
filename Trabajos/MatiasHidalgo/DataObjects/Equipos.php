<?php
/**
 * Table Definition for equipos
 */
require_once 'DB/DataObject.php';

class DO_Equipos extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'equipos';             // table name
    public $id_equipo;                       // int(4)  primary_key not_null
    public $tipo;                            // varchar(30)   not_null
    public $modelo;                          // varchar(30)   not_null
    public $marca;                           // varchar(30)   not_null
    public $nro_serie;                       // int(4)   not_null
    public $adquiridoen;                     // varchar(30)   not_null default_Desconocido
    public $nrofactura;                      // int(4)  
    public $fechacompra;                     // date  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Equipos',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
