<?php
/**
 * Table Definition for ordenestrabajo
 */
require_once 'DB/DataObject.php';

class DO_Ordenestrabajo extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'ordenestrabajo';      // table name
    public $nro_orden;                       // int(4)  primary_key not_null
    public $id_cliente;                      // int(4)   not_null
    public $fecha_ingreso;                   // date   not_null
    public $fecha_egreso;                    // date   not_null
    public $id_producto;                     // int(4)   not_null
    public $tarea;                           // smallint(2)   not_null
    public $descripcion_tarea;               // varchar(100)   not_null
    public $precio;                          // decimal(11,2)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Ordenestrabajo',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
