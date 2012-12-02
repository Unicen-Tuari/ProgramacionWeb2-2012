<?php
/**
 * Table Definition for exposicion
 */
require_once 'DB/DataObject.php';

class DO_Exposicion extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'exposicion';          // table name
    public $idexposicion;                    // int(4)  primary_key not_null
    public $titulo;                          // varchar(50)   not_null
    public $Comentarios;                     // text   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Exposicion',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
