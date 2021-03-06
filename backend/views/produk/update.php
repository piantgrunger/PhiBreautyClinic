<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Produk */

$this->title = 'Update Produk: ' . $model->kode_produk .' - '.$model->nama_produk ;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Produk', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_produk, 'url' => ['view', 'id' => $model->id_produk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="produk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
