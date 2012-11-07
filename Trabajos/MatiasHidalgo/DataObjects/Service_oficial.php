<?php
/**
 * Table Definition for service_oficial
 */
require_once 'DB/DataObject.php';

class DO_Service_oficial extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'service_oficial';     // table name
    public $id_serviceo;                     // int(4)  primary_key not_null
    public $nombre;                          // varchar(50)   not_null
    public $sitio_web;                       // varchar(100)   not_null
    public $tipodeorden;                     // varchar(15)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Service_oficial',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
