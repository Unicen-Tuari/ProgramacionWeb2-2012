<?php
/**
 * Table Definition for usuario
 */
require_once 'DB/DataObject.php';

class DO_Usuario extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'usuario';             // table name
    public $id;                              // int(4)  primary_key not_null
    public $nombre;                          // varchar(20)   not_null
    public $apellido;                        // varchar(20)   not_null
    public $email;                           // varchar(30)   not_null
    public $password;                        // varchar(20)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Usuario',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
