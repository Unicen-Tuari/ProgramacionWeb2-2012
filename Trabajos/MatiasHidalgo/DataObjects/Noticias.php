<?php
/**
 * Table Definition for noticias
 */
require_once 'DB/DataObject.php';

class DO_Noticias extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'noticias';            // table name
    public $id_noticia;                      // int(4)  primary_key not_null
    public $noticia;                         // text   not_null
    public $fecha;                           // date   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Noticias',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
