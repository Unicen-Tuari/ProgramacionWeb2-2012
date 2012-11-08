<?php
/**
 * Table Definition for persona
 */
require_once 'DB/DataObject.php';

class DO_Persona extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'persona';             // table name
    public $id;                              // int(4)  primary_key not_null
    public $nombre;                          // varchar(50)   not_null
    public $apellido;                        // varchar(50)   not_null
    public $mail;                            // varchar(50)   not_null
    public $edad;                            // int(4)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Persona',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
