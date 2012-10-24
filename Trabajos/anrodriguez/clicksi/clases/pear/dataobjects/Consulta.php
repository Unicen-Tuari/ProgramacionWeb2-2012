<?php
/**
 * Table Definition for consulta
 */
require_once 'DB/DataObject.php';

class DO_Consulta extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'consulta';            // table name
    public $id;                              // int(4)  unique_key not_null
    public $razonsocial;                     // varchar(80)   not_null
    public $email;                           // varchar(80)   not_null
    public $telefono;                        // varchar(80)  
    public $localidad;                       // varchar(80)  
    public $motivo;                          // smallint(2)   not_null
    public $fecha_ingreso;                   // timestamp   not_null default_CURRENT_TIMESTAMP
    public $fecha_respuesta;                 // timestamp  
    public $estado;                          // smallint(2)   not_null
    public $comentario;                      // text   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Consulta',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
