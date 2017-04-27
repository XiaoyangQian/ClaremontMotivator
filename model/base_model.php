<?php

class BaseModel
{
    function __construct()
    {
        // exported by dbconn.php
        global $dbc;
        $this->dbc = $dbc;
    }

}