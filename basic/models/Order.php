<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $id_user
 * @property string $date Время подтверждения заказа
 * @property int $id_address
 * @property int $id_card
 * @property int $id_cart
 * @property int $id_status
 * @property int $amount Стоимость заказа
 * @property int $discount Сумма скидки на заказа
 *
 * @property DeliveryAddress $address
 * @property UserHasCard $card
 * @property Cart $cart
 * @property OrderHasProducts[] $orderHasProducts
 * @property OrderStatus $status
 * @property User $user
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'date', 'id_address', 'id_card', 'id_cart', 'id_status', 'amount', 'discount'], 'required'],
            [['id_user', 'id_address', 'id_card', 'id_cart', 'id_status', 'amount', 'discount'], 'integer'],
            [['date'], 'safe'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            [['id_status'], 'exist', 'skipOnError' => true, 'targetClass' => OrderStatus::class, 'targetAttribute' => ['id_status' => 'id']],
            [['id_address'], 'exist', 'skipOnError' => true, 'targetClass' => DeliveryAddress::class, 'targetAttribute' => ['id_address' => 'id']],
            [['id_card'], 'exist', 'skipOnError' => true, 'targetClass' => UserHasCard::class, 'targetAttribute' => ['id_card' => 'id']],
            [['id_cart'], 'exist', 'skipOnError' => true, 'targetClass' => Cart::class, 'targetAttribute' => ['id_cart' => 'id']],
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
            'date' => 'Время подтверждения заказа',
            'id_address' => 'Id Address',
            'id_card' => 'Id Card',
            'id_cart' => 'Id Cart',
            'id_status' => 'Id Status',
            'amount' => 'Стоимость заказа',
            'discount' => 'Сумма скидки на заказа',
        ];
    }

    /**
     * Gets query for [[Address]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(DeliveryAddress::class, ['id' => 'id_address']);
    }

    /**
     * Gets query for [[Card]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCard()
    {
        return $this->hasOne(UserHasCard::class, ['id' => 'id_card']);
    }

    /**
     * Gets query for [[Cart]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCart()
    {
        return $this->hasOne(Cart::class, ['id' => 'id_cart']);
    }

    /**
     * Gets query for [[OrderHasProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderHasProducts()
    {
        return $this->hasMany(OrderHasProducts::class, ['id_order' => 'id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(OrderStatus::class, ['id' => 'id_status']);
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
