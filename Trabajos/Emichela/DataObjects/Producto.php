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
    public $idproducto;                      // int(4)  primary_key not_null
    public $descripcion;                     // text  
    public $path;                            // varchar(200)   not_null
    public $titulo;                          // varchar(50)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Producto',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
