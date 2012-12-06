<?php
/**
 * Table Definition for consultas
 */
require_once 'DB/DataObject.php';

class DO_Consultas extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'consultas';           // table name
    public $nombre;                          // varchar(20)   not_null
    public $apellido;                        // varchar(20)   not_null
    public $email;                           // varchar(30)   not_null
    public $mensaje;                         // varchar(150)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Consultas',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
