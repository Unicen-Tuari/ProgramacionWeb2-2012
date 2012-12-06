<?php
/**
 * Table Definition for marca
 */
require_once 'DB/DataObject.php';

class DO_Marca extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'marca';               // table name
    public $id;                              // int(4)  primary_key not_null
    public $marcas;                          // varchar(50)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Marca',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
