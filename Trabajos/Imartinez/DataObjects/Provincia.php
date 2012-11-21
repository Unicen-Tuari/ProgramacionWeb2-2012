<?php
/**
 * Table Definition for provincia
 */
require_once 'DB/DataObject.php';

class DO_Provincia extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'provincia';           // table name
    public $id;                              // smallint(2)  primary_key not_null
    public $provincia_nombre;                // varchar(50)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Provincia',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
