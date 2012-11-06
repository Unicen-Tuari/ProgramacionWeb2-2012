<?php
/**
 * Table Definition for equipos_so
 */
require_once 'DB/DataObject.php';

class DO_Equipos_so extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'equipos_so';          // table name
    public $id_equipo_so;                    // int(4)  primary_key not_null
    public $id_equipo;                       // int(4)  multiple_key not_null
    public $id_serviceo;                     // int(4)  multiple_key not_null
    public $cod_id_so;                       // int(4)  unique_key not_null
    public $fecha_pedido;                    // date   not_null
    public $fecha_respuesta;                 // date   not_null
    public $estado;                          // varchar(30)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Equipos_so',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
