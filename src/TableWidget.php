<?php

namespace yuankezhan\yiiTableWidget;

use yii\base\Widget as YiiWidget;

class TableWidget extends YiiWidget
{

    /**
     * page widget 的参数
     */
    public $page = null;

    /**
     * 没有数据提示 可以是html
     */
    public $noData = '暂无数据';
    /**
     * @var array
        [
            Column::set('Id', 'user_id', 'text', '', ['width' => '80px', 'class' => 'user-id']),
            Column::set('用户名', 'username'),
            Column::set('电话', 'mobile_phone', 'text'),
            Column::set('邮箱', 'email', 'text', '', ['width' => '120px']),
            Column::set('注册时间', 'reg_time'),
            Column::set('操作', '', Column::TYPE_FUNC, function ($item) {
                return [
                    TableButton::set('修改', Url::to(['permission/update', 'id' => $item['id']])),
                    TableButton::set('删除', "deletePermission(this, {$item['id']})", TableButton::TYPE_BUTTON, TableButton::THEME_DANGER)
                ];
            }),
        ]
     */
    public array $columns = [];

    /**
     * @var array
     * 键值对数组 [['user_id' => 1, 'username' => '测试'], ['user_id' => 2, 'username' => '例子']]
     */
    public array $data = [];

    /**
     * @var array
     * [
            TableTd::set($dItem['user_id'], ['class' => 'id', 'style' => 'width:80px']),
            $dItem['username'],
            TableTd::set($dItem['mobile_phone'], ['style' => 'width:150px']),
            TableTd::set($dItem['email'], ['style' => 'width:100px']),
            $dItem['reg_time'],
        ]
     */
    public array $rows = [];

    /**
     * @var array
     * ['ID', '用户名', '电话', '邮箱', '注册时间', '昵称', '操作']
     */
    public array $head = [];

    /**
     *  * 例子 一
     *
    <?= TableWidget::widget([
        'data' => $data,
        'columns' => [
            Column::set('Id', 'user_id', 'text', '', ['width' => '80px', 'class' => 'user-id']),
            Column::set('用户名', 'username'),
            Column::set('操作', '', Column::TYPE_FUNC, function ($item) {
            return [
                TableButton::set('修改', Url::to(['permission/update', 'id' => $item['id']])),
                TableButton::set('删除', "deletePermission(this, {$item['id']})", TableButton::TYPE_BUTTON, TableButton::THEME_DANGER)
            ];
        }),
        ],
       'page' => [
            'pageIndex' => $pageIndex,
            'pageSize' => $pageSize,
            'count' => $info->data['count'],
            'url' => Url::current($searchModel->toArray())
        ]
    ])?>

     * 例子 二
    <?php if (!empty($data)):?>
        <?php foreach ($data as $dItem):?>
            <?php
                $rowData = [
                    TableTd::set($dItem['user_id'], ['class' => 'id', 'style' => 'width:80px']),
                    $dItem['username'],
                    TableTd::set($dItem['email'], ['style' => 'width:100px']),
                ];
                $rows[] = Row::set($rowData, [
                    TableButton::set('编辑员工信息', Url::to(['employee/create', 'userId' => $dItem['user_id']]), TableButton::TYPE_LINK),
                    TableButton::set('修改', Url::to(['user/update', 'id' => $dItem['user_id']]), TableButton::TYPE_LINK),
                    TableButton::set('删除', "deleteUser(this, '{$dItem['user_id']}')", TableButton::TYPE_BUTTON, TableButton::THEME_DANGER)
                ]);
            ?>
        <?php endforeach;?>
    <?php endif?>
    <?= TableWidget::widget([
        'head' => ['ID', '用户名', '电话', '邮箱', '注册时间'],
        'rows' => isset($rows) ? $rows : [],
        'page' => [
            'pageIndex' => $pageIndex,
            'pageSize' => $pageSize,
            'count' => $info->data['count'],
            'url' => Url::current($searchModel->toArray())
        ]
    ])?>
     * @return string
     */
    public function run()
    {
        if (!empty($this->head))
        {
            return $this->render('indexRow', ['rows' => $this->rows, 'head' => $this->head, 'page' => $this->page, 'noData' => $this->noData]);
        }
        return $this->render('index', ['data' => $this->data, 'columns' => $this->columns, 'page' => $this->page, 'noData' => $this->noData]);
    }
}

