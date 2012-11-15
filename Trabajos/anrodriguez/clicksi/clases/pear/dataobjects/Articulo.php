<?php
/**
 * Table Definition for articulo
 */
require_once 'DB/DataObject.php';

class DO_Articulo extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'articulo';            // table name
    public $id;                              // int(4)  unique_key not_null
    public $nombre;                          // varchar(80)  unique_key not_null
    public $rubro;                           // int(4)   not_null default_1
    public $precio_venta;                    // decimal(11,2)   not_null
    public $imagen_path;                     // varchar(100)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Articulo',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
