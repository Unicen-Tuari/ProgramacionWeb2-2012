<?php
/**
 * Table Definition for equipos_repuestos
 */
require_once 'DB/DataObject.php';

class DO_Equipos_repuestos extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'equipos_repuestos';    // table name
    public $id_compatible;                   // int(4)  primary_key not_null
    public $id_equipo;                       // int(4)  multiple_key not_null
    public $id_repuesto;                     // int(4)  multiple_key not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Equipos_repuestos',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
