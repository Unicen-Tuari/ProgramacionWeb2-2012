<?php
/**
 * Table Definition for imagenes
 */
require_once 'DB/DataObject.php';

class DO_Imagenes extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'imagenes';            // table name
    public $id;                              // int(4)  primary_key not_null
    public $id_automoviles;                  // int(4)   not_null
    public $ruta;                            // text   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Imagenes',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
