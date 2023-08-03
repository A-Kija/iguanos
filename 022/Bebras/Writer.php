<?php
namespace Bebras\Bebrauskas;

class Writer
{
     
    public function addLink($html, $link)
    {
        return '<a href="'.$link.'">'.$html.'</a>';
    }

}