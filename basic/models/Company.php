<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $name
 * @property int $ITN ИНН компании
 * @property string $logo_name Название логотипа компании с расширением файла (png, jpeg и тд)
 * @property string $created_at Создание учетной записи компании
 * @property string $updated_at Время обновления информации компании
 *
 * @property User[] $users
 */
class Company extends \yii\db\ActiveRecord
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
            [['name', 'ITN', 'logo_name', 'created_at', 'updated_at'], 'required'],
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
