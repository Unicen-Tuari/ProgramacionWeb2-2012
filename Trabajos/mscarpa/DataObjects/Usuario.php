<?php
/**
 * Table Definition for usuario
 */
require_once 'DB/DataObject.php';

class Usuario extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'usuario';             // table name
    public $ID;                              // int(4)  primary_key not_null
    public $Nombre;                          // varchar(50)   not_null
    public $Apellido;                        // varchar(50)   not_null
    public $DNI;                             // int(4)   not_null
    public $FechaNac;                        // date   not_null
    public $Localidad;                       // varchar(50)   not_null
    public $Direccion;                       // varchar(100)   not_null
    public $Usuario;                         // varchar(50)  unique_key
    public $Password;                        // varchar(50)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('Usuario',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
