<?php


namespace yuankezhan\yiiTableWidget;

class Column
{

    const TYPE_LINK = 'link';                    // 连接
    const TYPE_IMG = 'img';                      // 图片
    const TYPE_TEXT = 'text';                    // 文本
    const TYPE_INPUT = 'input';                  // 输入框
    const TYPE_FUNC = 'func';                    // php方法

    /**
     * 显示的标题
     * @var string title
     */
    public $title;

    /**
     * 数组的key键
     * @var string key
     */
    public $key;

    /**
     * 列的数据展示类型
     * text|img|link|func  文本|图片|链接|php方法
     * @var string type
     */
    public $type;

    /**
     * 自定义td|th属性
     * ['class' => 'test', 'style' => 'width:100px', ...]
     * @var array attributes
     */
    public $attributes;

    /**
     * php方法 与type为Column::TYPE_FUNC时可用
     * @var string func
     */
    public $func;

    public $class = '';
    public $attributeStr = ' ';

    /**
     * @param string $title
     * @param string $key
     * @param string $type
     * @param string $func
     * @param string $attributes
     * @return Column
     */
    public static function set($title, $key = '', $type = self::TYPE_TEXT, $func = '', $attributes = [])
    {
        $columnClass = new Column();
        $columnClass->title = $title;
        $columnClass->key = $key;
        $columnClass->type = $type;
        $columnClass->attributes = $attributes;
        $columnClass->func = $func;

        if (!empty($attributes))
        {
            foreach ($attributes as $key => $a)
            {
                if ($key == 'class')
                {
                    $columnClass->class = $a;
                }
                $columnClass->attributeStr .= "{$key}='{$a}' ";
            }
        }

        return $columnClass;
    }
}
