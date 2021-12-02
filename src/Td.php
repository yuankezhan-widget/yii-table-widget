<?php


namespace yuankezhan\yiiTableWidget;


class Td
{
    public static function set($value, $attributes = [], $button = [])
    {
        return "<td>{$value}</td>";
    }
}