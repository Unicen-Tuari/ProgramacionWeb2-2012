<?php
/**
 * Table Definition for ordenes
 */
require_once 'DB/DataObject.php';

class DO_Ordenes extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'ordenes';             // table name
    public $nro_orden;                       // int(4)  primary_key not_null
    public $id_usuario;                      // int(4)  multiple_key not_null
    public $id_equipo;                       // int(4)  multiple_key not_null
    public $descripcion;                     // varchar(255)   not_null
    public $observaciones;                   // text   not_null
    public $fecha_ingreso;                   // date   not_null
    public $fecha_presupuesto;               // date   not_null
    public $fecha_reparado;                  // date   not_null
    public $fecha_prometido;                 // date   not_null
    public $fecha_entrega;                   // date   not_null
    public $estado;                          // varchar(50)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Ordenes',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
