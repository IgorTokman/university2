<?php
/* @var $this yii\web\View */
use yii\widgets\LinkPager;
?>

<h1 class="page-header">
    Students
    <a href="index.php?r=students/create" class="btn btn-primary pull-right">Create</a>
</h1>

<?php if(!is_null(Yii::$app->session->getFlash('success'))):?>
    <div class="alert alert-success"><?=Yii::$app->session->getFlash('success')?></div>
<?php endif;?>

<ul class="list-group">
    <?php foreach ($students as $student):?>
        <li class="list-group-item">
            <a href="/index.php?r=students/index&idstudent=<?= $student->idstudents?>"><?= $student->name?></a>
            <a href="index.php?r=students/delete&idstudent=<?= $student->idstudents?>" class="btn btn-danger btn-sm pull-right">Delete</a>
            <a href="index.php?r=students/update&idstudent=<?= $student->idstudents?>" class="btn btn-info btn-sm pull-right">Edit</a>
        </li>
    <?php endforeach;?>
</ul>

