<?php
/**
 * Table Definition for productos
 */
require_once 'DB/DataObject.php';

class DO_Productos extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'productos';           // table name
    public $id_producto;                     // int(4)  primary_key not_null
    public $marca;                           // varchar(20)   not_null
    public $modelo;                          // varchar(30)   not_null
    public $tipo;                            // smallint(2)   not_null
    public $nombre;                          // varchar(20)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Productos',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
