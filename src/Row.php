<?php


namespace yuankezhan\yiiTableWidget;


use yii\helpers\Html;

class Row
{
    /**
     * @param $rowData
     * @param array $commands [TableButton, TableButton] TableButton 类的数组
     * @param array $attributes
     * @return string
     */
    public static function set($rowData, $commands = null, $attributes = [])
    {
        $tdStr = '';
        foreach ($rowData as $value)
        {
            if (is_object($value))
            {
                $attrStr = '';
                foreach ($value->attributes as $name => $attr)
                {
                    $attrStr = " {$name}='{$attr}' ";
                }
                $tdStr .= "<td {$attrStr}>{$value->value}</td>";
            }
            else
            {
                $tdStr .= "<td>{$value}</td>";
            }
        }
        if (!empty($commands))
        {
            $btnStr = "";
            foreach ($commands as $command)
            {
                $btnStr .= $command;
            }
            $tdStr .= "<td class='command'>$btnStr</td>";
        }
        return $tdStr;
    }

}