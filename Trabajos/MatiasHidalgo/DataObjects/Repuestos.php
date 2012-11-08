<?php
/**
 * Table Definition for repuestos
 */
require_once 'DB/DataObject.php';

class DO_Repuestos extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'repuestos';           // table name
    public $id_repuesto;                     // int(4)  primary_key not_null
    public $nombre;                          // varchar(50)   not_null
    public $tipo;                            // varchar(30)   not_null
    public $marca;                           // varchar(30)   not_null
    public $estado;                          // varchar(40)   not_null
    public $observaciones;                   // text   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Repuestos',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
