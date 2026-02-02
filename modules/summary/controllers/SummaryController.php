<?php

namespace app\modules\summary\controllers;

use yii\web\Controller;
class SummaryController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
