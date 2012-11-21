<?php
/**
 * Table Definition for propiedad
 */
require_once 'DB/DataObject.php';

class Propiedad extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'propiedad';           // table name
    public $ID;                              // int(4)  primary_key not_null
    public $Usuario_FK;                      // int(4)  unique_key
    public $Foto_FK;                         // int(4)  unique_key not_null
    public $Titulo;                          // varchar(50)   not_null
    public $Descripcion;                     // varchar(150)   not_null
    public $Valor;                           // int(4)   not_null
    public $TIPO_FK;                         // int(4)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('Propiedad',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
