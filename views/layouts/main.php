<?php
/**
 * @author Julian Böhnke <tr@julianb.de>
 * @since 1.0
 */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
TranslateManagerAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => 'Seomanager',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => Yii::t('seomanager-nav', 'Home'), 'url' => ['/']],
                ['label' => Yii::t('seomanager-nav', 'Manager'), 'items' => [
                        ['label' => Yii::t('seomanager-nav', 'List'), 'url' => ['/seomanager/language/list']],
                        ['label' => Yii::t('seomanager-nav', 'Create'), 'url' => ['/seomanager/language/create']],
                    ]
                ],
            ];
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?php
                foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
                    echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
                } ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; Seomanager <?= date('Y') ?></p>
                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
