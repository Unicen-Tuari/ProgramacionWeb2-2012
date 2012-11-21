<?php
/**
 * Table Definition for foto
 */
require_once 'DB/DataObject.php';

class Foto extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'foto';                // table name
    public $ID;                              // int(4)  primary_key not_null
    public $URL;                             // varchar(150)   not_null
    public $Nombre;                          // varchar(50)   not_null
    public $PROP_FK;                         // int(4)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('Foto',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
