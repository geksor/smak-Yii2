<?php

namespace frontend\widgets;

use yii\helpers\Html;

class FooterMenu extends \yii\widgets\Menu
{

    /**
     * @inheritdoc
     */
    public function init()
    {
        Html::addCssClass($this->options, 'footer__menu');
        parent::init();
    }
}
