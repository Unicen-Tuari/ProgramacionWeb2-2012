<?php
/**
 * Table Definition for ciudad
 */
require_once 'DB/DataObject.php';

class DO_Ciudad extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'ciudad';              // table name
    public $id;                              // int(4)  primary_key not_null
    public $ciudad_nombre;                   // varchar(60)   not_null
    public $cp;                              // int(4)   not_null
    public $provincia_id;                    // smallint(2)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Ciudad',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
