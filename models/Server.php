<?php
namespace app\models;
use Yii;
use app\models\Post;
/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $name
 * @property string $text
 *
 * @property Items[] $items
 */
class Server extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'text'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['text'], 'string'],
        ];
    }
    public function getPost()
    {
        //Запрос для получение таблицы "post"
        return Server::find()->asArray()->all();
    }
    public function SaveData($data)
    {
        //Тестовый запрос для "мыла"
        $post = new Post();
        $post->name = $data['name'];
        $post->text = $data['text'];
        $post->save();
        return 'Схранил :^)';
    }
    public static function server()
    {
        //Создание Обьекта с сервером Soap'a
        $server = new \SoapServer(null, array('uri' => "http://SessionSchur/web/index.php?r=soap/index"));
        $server->setObject(new Server());
        //Запуск сервера Soap'a
        ob_start();
        //Обработка запроса от клиента Soap'a
        $server->handle();
        //Получение содержимого запроса от клиента Soap'a
        $result = ob_get_contents();
        //Отчищает запрос
        ob_end_clean();
        //Возвращает содержимое запроса
        return $result;
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'text' => 'Description',
        ];
    }

}