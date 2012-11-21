<?php
/**
 * Table Definition for cliente
 */
require_once 'DB/DataObject.php';

class DO_Cliente extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'cliente';             // table name
    public $idcliente;                       // int(4)  primary_key not_null
    public $nombre;                          // varchar(50)   not_null
    public $apellido;                        // varchar(50)   not_null
    public $email;                           // varchar(100)  unique_key not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Cliente',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
