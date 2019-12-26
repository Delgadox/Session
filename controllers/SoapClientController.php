<?php
/**
 * Created by PhpStorm.
 * User: ClassUser
 * Date: 26.12.2019
 * Time: 12:31
 */
namespace app\controllers;
use yii\helpers\VarDumper;
class SoapclientController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $client = new \SoapClient(null, array(
            'location' =>
                "http://SessionSchur/web/index.php?r=soap/server",
            'uri'      => "http://SessionSchur/web/index.php?r=soap/server",
            'trace'    => 1 ));
        $return = $client->__soapCall("gc",[]);
        var_dump($return);
    }
}