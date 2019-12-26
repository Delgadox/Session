<?php
namespace app\controllers;

use Yii;
use app\models\Server;
use app\models\Post;
use yii\helpers\VarDumper;
use yii\web\Controller;
class SoapController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function actionServer(){
        return Server::server();

    }
    public function actionClient()
    {
        $model = new Post();
        $items = Post::find()->asarray()->all();
        if ($model->load(Yii::$app->request->post())) {
            //Создание обьекта для клиента Soap'a
            $client = new \SoapClient(null, array(
                'location' =>
                    "http://SessionSchur/web/index.php?r=soap/server",
                'uri' => "http://SessionSchur/web/index.php?r=soap/server",
                'trace' => 1));
            $return = $client->__soapCall("SaveData", [$_POST['Post']]);
            return $this->render('index', [
                'model' => $model,
                'items' => $items,
                'return' => $return,
            ]);
        }
        return $this->render('index', [
            'model' => $model,
            'items' => $items,
        ]);

    }
//    public function actionIndex()
//    {
//        $model = new Post();
//        $items = Post::find()->asarray()->all();
//        if ($model->load(Yii::$app->request->post())) {
//            return $this->redirect("http://SessionSchur/web/index.php?r=soap/client");
//        }
//        return $this->render('index', [
//            'model' => $model,
//            'items' => $items,
//        ]);
//    }

}