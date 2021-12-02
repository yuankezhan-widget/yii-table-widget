<?php


namespace yuankezhan\yiiTableWidget;


class TableTd
{
    public $value;
    public $attributes;

    /**
     * @param string $value 显示内容
     * @param array $attributes 属性键值对
     * @return TableTd
     */
    public static function set($value, $attributes)
    {
        $td = new TableTd();
        $td->value = $value;
        $td->attributes = $attributes;
        return $td;
    }
}