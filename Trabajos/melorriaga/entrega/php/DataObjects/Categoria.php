<?php
/**
 * Table Definition for categoria
 */
require_once 'DB/DataObject.php';

class DO_Categoria extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'categoria';           // table name
    public $codigo;                          // int(4)  primary_key not_null
    public $cat;                             // varchar(50)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Categoria',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
