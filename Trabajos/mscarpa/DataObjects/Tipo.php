<?php
/**
 * Table Definition for tipo
 */
require_once 'DB/DataObject.php';

class Tipo extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'tipo';                // table name
    public $ID;                              // int(4)  primary_key not_null
    public $Tipo;                            // varchar(50)   not_null
    public $Descripcion;                     // varchar(100)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('Tipo',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
