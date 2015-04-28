<?php
    spl_autoload_register( function($class)
    {
        include_once("classes/" . $class . ".class.php");
    });





//if(isset session['admin'] = (bijvoorbeeld alle resultaten, alle paswoorden geven met een query)

?>