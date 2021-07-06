<?php

namespace Traits;

trait TraitParseUrl
{

    #Criar uma array com a url digitada pelo usuario
    public static function parseUrl($par = null)
    {
        $url = explode("/", rtrim($_GET['url'], FILTER_SANITIZE_URL));
        return ($par == null) ? $url : $url[$par];
    }
}
