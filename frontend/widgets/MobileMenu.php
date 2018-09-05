<?php

namespace frontend\widgets;

use yii\helpers\Html;

class MobileMenu extends \yii\widgets\Menu
{
    /**
     * @inheritdoc
     */
    public $activateParents = true;


    /**
     * @inheritdoc
     */
    public $linkTemplate = '<a href="{url}" class="mobileMenu__temLink">{label}</a>';


    /**
     * @inheritdoc
     */
    public function init()
    {
        Html::addCssClass($this->options, 'row');
        parent::init();
    }
}
