<?php


namespace yuankezhan\yiiTableWidget;


use yii\helpers\Html;

class TableButton
{
    const TYPE_BUTTON = 'button';
    const TYPE_LINK = 'link';

    const THEME_DEFAULT = '';
    const THEME_WARM = 'public-table-btn-warm';
    const THEME_DANGER = 'public-table-btn-danger';
    const THEME_DISABLED = 'public-table-btn-disabled';

    /**
     * @param string $text 按钮文字
     * @param string $typeValue 按钮类型
     * @param string $type
     * @param string $theme THEME_DEFAULT  THEME_WARM  THEME_DANGER  THEME_DISABLED
     */
    public static function set($text, $typeValue, $type = self::TYPE_LINK, $theme = self::THEME_DEFAULT)
    {
        switch ($theme)
        {
            case TableButton::THEME_WARM:
                $btnClass = "public-table-btn-warm";
                break;
            case TableButton::THEME_DANGER:
                $btnClass = "public-table-btn-danger";
                break;
            case TableButton::THEME_DISABLED:
                $btnClass = "public-table-btn-disabled";
                break;
            default:
                $btnClass = "";
        }
        $btnStr = '';
        if ($type == TableButton::TYPE_LINK)
        {
            $btnStr .= Html::a($text, $typeValue, ['class' => "{$btnClass} public-table-btn-xs public-table-btn "]);
        }
        else if ($type == TableButton::TYPE_BUTTON)
        {
            $btnStr .= Html::button($text, ['class' => "{$btnClass} public-table-btn-xs public-table-btn ", 'onclick' => $typeValue]);
        }
        return $btnStr;
    }
}