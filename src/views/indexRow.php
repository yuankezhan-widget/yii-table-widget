<?php
use yuankezhan\yiiPageWidget\PageWidget;
?>
<style>
    .public-table-body{
        position: relative;
        overflow: auto;
        margin-right: -1px;
        margin-bottom: -1px;
    }
    .public-table-body *::-webkit-scrollbar {
        width: 5px;
        height: 5px;
    }

    .public-table-body *::-webkit-scrollbar-button {
        display: none;
    }
    .public-table-body *::-webkit-scrollbar-thumb {
        background-color: #999;
        -webkit-border-radius: 5px;
        border-radius: 5px;
    }
    .public-table-body *::-webkit-scrollbar-track {
        background-color: #f1f1f1;
    }
    .public-table th, .public-table td, .public-table[lay-skin="line"], .public-table[lay-skin="row"], .public-table-view, .public-table-tool, .public-table-header, .public-table-col-set, .public-table-total, .public-table-page, .public-table-fixed-r, .public-table-tips-main, .public-table-grid-down {
        border-width: 1px;
        border-style: solid;
        border-color: #eee;
    }
    .public-table thead tr, .public-table-header, .public-table-tool, .public-table-total, .public-table-total tr, .public-table-patch, .public-table-mend, .public-table[lay-even] tr:nth-child(even), .public-table tbody tr:hover, .public-table-hover, .public-table-click {
        background-color: #FAFAFA;
    }
    .public-table{
        width: 100%;
        margin: 10px 0;
        background-color: #fff;
        color: #666;
        border-collapse: collapse;
        border-spacing: 0;
    }
    .public-table-header{
        border-width: 0;
        border-bottom-width: 1px;
        overflow: hidden;
    }
    .public-table-body {
        position: relative;
        overflow: auto;
        margin-right: -1px;
        margin-bottom: -1px;
    }
    .public-table tr {
        transition: all .3s;
        -webkit-transition: all .3s;
    }
    .public-table th, .public-table td {
        position: relative;
        padding: 9px 15px;
        min-height: 20px;
        line-height: 20px;
        font-size: 14px;
    }

    .public-table-btn {
        display: inline-block;
        vertical-align: middle;
        height: 38px;
        line-height: 38px;
        border: 1px solid transparent;
        padding: 0 18px;
        background-color: #009688;
        color: #fff;
        white-space: nowrap;
        text-align: center;
        font-size: 14px;
        border-radius: 2px;
        cursor: pointer;
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        margin-right: 10px;
    }

    .public-table-btn, .public-table-input, .public-table-textarea, .public-table-upload-button, .public-table-select {
        outline: none;
        -webkit-appearance: none;
        transition: all .3s;
        -webkit-transition: all .3s;
        box-sizing: border-box;
    }
    .public-table-btn-warm {
        background-color: #FFB800;
    }
    .public-table-btn-danger {
        background-color: #FF5722;
    }
    .public-table-btn-xs {
        height: 22px;
        line-height: 22px;
        padding: 0 5px;
        font-size: 12px;
    }
</style>
<div class="public-table-body public-table-main">
    <table cellspacing="0" cellpadding="0" border="0" class="public-table">
        <thead class="public-table-header">
        <tr>
            <?php foreach ($head as $h) :?>
                <th class=""><?= $h?></th>
            <?php endforeach;?>
        </tr>
        </thead>
        <tbody class="public-table-body public-table-main">
        <?php if (!empty($rows)):?>
            <?php foreach ($rows as $dItem) :?>
                <tr>
                    <?=$dItem?>
                </tr>
            <?php endforeach;?>
        <?else:?>
            <tr>
                <td colspan="<?=count($head)?>">
                    <?=$noData?>
                </td>
            </tr>
        <?php endif;?>

        </tbody>
    </table>
</div>
<?php if (!empty($page)):?>
<div class="page-box">
    <?= PageWidget::widget($page)?>
</div>
<?php endif;?>
