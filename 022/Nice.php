<?php


trait Nice {

    public $imNice = 'I am nice';
        
    public function sayHi()
    {
        echo '<h1>Hi From Nice Trait!</h1>';
    }
}