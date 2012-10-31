<?php
/**
 * Table Definition for comentario
 */
require_once 'DB/DataObject.php';

class Comentario extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'comentario';          // table name
    public $ID;                              // int(4)  primary_key not_null
    public $Nombre;                          // varchar(50)   not_null
    public $Fecha;                           // date   not_null
    public $Comentario;                      // text   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('Comentario',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
