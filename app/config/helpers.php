<?php 

    // define routes 
    function url($url='')
    {
        echo SITE_NAME.$url;
    }

    // redirect
    function redirect($url)
    {
        return  SITE_NAME.$url;
    }