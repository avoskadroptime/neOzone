<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $name
 * @property int $ITN ИНН компании
 * @property string $logo_name Название логотипа компании с расширением файла (png, jpeg и тд)
 * @property int $created_at Создание учетной записи компании
 * @property int $updated_at Время обновления информации компании
 *
 * @property User[] $users
 */
class Company extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'ITN', 'logo_name'], 'required'],
            [['ITN'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'logo_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'ITN' => 'ИНН компании',
            'logo_name' => 'Название фото',
            'created_at' => 'Время создания',
            'updated_at' => 'Время обновления ',
        ];
    }

    public function behaviors()
    {
        return[
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => date("Y-m-d H:i:s"),
            ],
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['id_company' => 'id']);
    }
}
