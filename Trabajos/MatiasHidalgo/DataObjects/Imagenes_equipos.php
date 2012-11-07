<?php
/**
 * Table Definition for imagenes_equipos
 */
require_once 'DB/DataObject.php';

class DO_Imagenes_equipos extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'imagenes_equipos';    // table name
    public $id_imagen;                       // int(4)  primary_key not_null
    public $id_equipo;                       // int(4)   not_null
    public $direccion_web;                   // varchar(100)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Imagenes_equipos',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
