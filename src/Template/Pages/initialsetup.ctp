<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
$this->layout=false;
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC28--极力打造精准北京28、加拿大28人工计划网站</title>
    <?= $this->Html->meta('icon') ?>

</head>
<body>
<?= $this->Form->create() ?>
    <h1>初始化设置</h1>
    <p>设置完成后点击提交，然后会自动跳转到网站主页</p>

    <hr>
    <p>有域名则优先填写域名，如无域名则填写IP地址</p>
    <?= $this->Form->control('webadd', ['label'=>'网站地址：','type' => 'text','style'=>'width:300px']);?> <br><br>
    <?= $this->Form->control('webport', ['label'=>'网站端口：','type' => 'text']);?>

    <hr>
    <p>数据源信息请向管理员获取</p>
    <?= $this->Form->control('datasource',['label'=>'数据源地址','type'=>'text'])?>
    <?= $this->Form->hidden('confirm', ['value'=>1]);?>
    <?= $this->Form->button('提交',['class'=>'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</body>
</html>
