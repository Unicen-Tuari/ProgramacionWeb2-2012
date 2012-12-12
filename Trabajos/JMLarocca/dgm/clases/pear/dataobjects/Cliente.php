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
    public $id_cliente;                      // int(4)  primary_key not_null
    public $nombre;                          // varchar(20)   not_null
    public $apellido;                        // varchar(20)   not_null
    public $dni;                             // int(4)   not_null
    public $direccion;                       // varchar(30)   not_null
    public $telefono;                        // int(4)   not_null
    public $mail;                            // varchar(60)  unique_key not_null
    public $clave;                           // varchar(20)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Cliente',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
