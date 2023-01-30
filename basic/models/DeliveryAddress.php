<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "delivery_address".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_city
 * @property int $street
 * @property int|null $apartament_number
 * @property int|null $comment
 *
 * @property City $city
 * @property Order[] $orders
 * @property User $user
 */
class DeliveryAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'delivery_address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_city', 'street'], 'required'],
            [['id_user', 'id_city', 'street', 'apartament_number', 'comment'], 'integer'],
            [['id_city'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['id_city' => 'id']],
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
            'id_user' => 'Id User',
            'id_city' => 'Id City',
            'street' => 'Street',
            'apartament_number' => 'Apartament Number',
            'comment' => 'Comment',
        ];
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'id_city']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['id_address' => 'id']);
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
}
