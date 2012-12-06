<?php
/**
 * Table Definition for automoviles
 */
require_once 'DB/DataObject.php';

class DO_Automoviles extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'automoviles';         // table name
    public $id;                              // int(4)  primary_key not_null
    public $id_cat;                          // int(4)   not_null
    public $modelo;                          // varchar(40)   not_null
    public $precio;                          // int(4)   not_null
    public $descripcion;                     // text   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Automoviles',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
