<?php
/**
 * Table Definition for rubro
 */
require_once 'DB/DataObject.php';

class DO_Rubro extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'rubro';               // table name
    public $id;                              // int(4)  unique_key not_null
    public $nombre;                          // varchar(80)  unique_key not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Rubro',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
