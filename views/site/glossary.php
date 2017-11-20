<?php use yii\helpers\Html;?>

<?php if (isNull($item)):?>
    <div>
        <ul>
            <?php foreach ($categories as $category):?>
                <li><?= Html::a($category->title, ['site/glossary', $category->id]) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php else: ?>
    <div>
        <h3><?= $item->item?></h3>
        <p><?= $item->description?></p>
    </div>
<?php endif; ?>
