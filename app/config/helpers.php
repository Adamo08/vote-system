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

    function getCurrentDate() {
        return date("l j F Y"); 
    }