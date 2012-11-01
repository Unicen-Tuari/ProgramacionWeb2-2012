<?php
/**
 * Table Definition for producto
 */
require_once 'DB/DataObject.php';

class DO_Producto extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'producto';            // table name
    public $codigo;                          // int(4)  primary_key not_null
    public $nombre;                          // varchar(50)   not_null
    public $nombre_imagen;                   // varchar(50)   not_null
    public $precio;                          // varchar(10)   not_null
    public $cantidad;                        // int(4)   not_null
    public $caracteristicas;                 // text   not_null
    public $fecha_ingreso;                   // date   not_null
    public $codigo_categoria;                // int(4)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Producto',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
