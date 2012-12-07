<?php
/**
 * Table Definition for usuarios
 */
require_once 'DB/DataObject.php';

class DO_Usuarios extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'usuarios';            // table name
    public $id_usuario;                      // int(4)  primary_key not_null
    public $cuenta;                          // varchar(16)   not_null
    public $admin;                           // tinyint(1)   not_null
    public $contras;                         // varchar(16)   not_null
    public $nombre;                          // varchar(30)   not_null
    public $apellido;                        // varchar(30)   not_null
    public $direccion;                       // varchar(40)   not_null
    public $telefono;                        // int(4)  
    public $celular;                         // int(4)  
    public $ciudad;                          // varchar(20)   not_null
    public $email;                           // varchar(50)   not_null
    public $observaciones;                   // text   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Usuarios',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
