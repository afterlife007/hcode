<?php
/**
 * Created by PhpStorm.
 * User: Computador-01
 * Date: 29/08/2018
 * Time: 10:57
 */

namespace Hcode;


class PageAdmin extends Page
{
    public function __construct(array $opts = array(), $tpl_dir = "/views/admin/")
    {
        parent::__construct($opts, $tpl_dir);
    }
}