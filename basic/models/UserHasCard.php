<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user_has_card".
 *
 * @property int $id
 * @property int $id_user
 * @property int $number Номер карты
 * @property string $validity_period До какого месяца/года
 * @property int $CVV Код на обратной стороне
 *
 * @property Order[] $orders
 * @property User $user
 */
class UserHasCard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_has_card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'number', 'validity_period', 'CVV'], 'required'],
            [['id_user', 'number', 'CVV'], 'integer'],
            [['validity_period'], 'safe'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id пользователя',
            'number' => 'Номер карты',
            'validity_period' => 'До какого месяца/года',
            'CVV' => 'Код на обратной стороне',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['id_card' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }

    public static function dropDownListUser()
    {
        return ArrayHelper::map(User::find()->all(), 'id', 'login');
    }
    
}