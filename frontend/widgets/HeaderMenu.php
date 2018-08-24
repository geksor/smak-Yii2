<?php

namespace frontend\widgets;

use yii\helpers\Html;

class HeaderMenu extends \yii\widgets\Menu
{
    /**
     * @inheritdoc
     */
    public $activateParents = true;


    /**
     * @inheritdoc
     */
    public $linkTemplate = '<a href="{url}" class="header__menuItemLink">{label}</a>';


    /**
     * @inheritdoc
     */
    public function init()
    {
        Html::addCssClass($this->options, 'row header__mainMenu');
        parent::init();
    }
}
