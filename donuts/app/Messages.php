<?php
namespace Donuts;


class Messages {

    public static function add($text, $type = 'info')
    {
        if (!isset($_SESSION['messages'])) {
            $_SESSION['messages'] = [];
        }
        $_SESSION['messages'][] = [
            'text' => $text,
            'type' => $type,
        ];
    }

    public static function get()
    {
        if (isset($_SESSION['messages'])) {
            $messages = $_SESSION['messages'];
            unset($_SESSION['messages']);
            return $messages;
        }
        return [];
    }


}