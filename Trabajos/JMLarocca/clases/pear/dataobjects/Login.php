<?php
/**
 * Table Definition for login
 */
require_once 'DB/DataObject.php';

class DO_Login extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'login';               // table name
    public $mail;                            // varchar(60)  primary_key not_null
    public $clave;                           // varchar(20)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Login',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
