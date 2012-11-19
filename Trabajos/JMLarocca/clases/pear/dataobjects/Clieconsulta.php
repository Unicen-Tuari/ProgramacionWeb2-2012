<?php
/**
 * Table Definition for clieconsulta
 */
require_once 'DB/DataObject.php';

class DO_Clieconsulta extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'clieconsulta';        // table name
    public $nroconsulta;                     // int(4)  primary_key not_null
    public $nombreusu;                       // varchar(60)   not_null
    public $email;                           // varchar(60)   not_null
    public $telefono;                        // int(4)   not_null
    public $motivo;                          // varchar(10)   not_null
    public $comentario;                      // text   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Clieconsulta',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
