<?php
namespace Donuts\DB;

use Donuts\DB\FileDB;
use Donuts\DB\MariaDB;


class Storage {

        private static $type = 'MariaDB';
    
        public static function getStorage($from) {

            return match(self::$type) {
                'FileDB' => new FileDB($from),
                'MariaDB' => new MariaDB($from),
                default => throw new \Exception('Undefined storage type'),
            };
            
        }
}