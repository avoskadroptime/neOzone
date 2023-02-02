<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property int $price Цена товара в российских копейках
 * @property int $id_user id менеджера создавшего товар
 * @property int $id_category
 * @property string $created_at Время создания товара
 * @property string $updated_at Время обновления информации о товаре
 * @property int|null $discount_perc скидка в процентах
 * @property int|null $discount_price фикс. скидка в копеках
 * @property string $description Описание
 * @property string $characteristic Характеристика
 * @property string|null $method_of_use Метод использования
 * @property int|null $rating
 *
 * @property CartHasProducts[] $cartHasProducts
 * @property ProductCategory $category
 * @property OrderHasProducts[] $orderHasProducts
 * @property PhotoProduct[] $photoProducts
 * @property ProductIsFavorite[] $productIsFavorites
 * @property PromotionHasProduct[] $promotionHasProducts
 * @property Review[] $reviews
 * @property User $user
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'id_user', 'id_category', 'created_at', 'updated_at', 'description', 'characteristic'], 'required'],
            [['price', 'id_user', 'id_category', 'discount_perc', 'discount_price', 'rating'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['description', 'characteristic', 'method_of_use'], 'string'],
            [['name'], 'string', 'max' => 65],
            [['id_category'], 'unique'],
            [['id_user'], 'unique'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::class, 'targetAttribute' => ['id_category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Цена товара в российских копейках',
            'id_user' => 'id менеджера создавшего товар',
            'id_category' => 'Id Category',
            'created_at' => 'Время создания товара',
            'updated_at' => 'Время обновления информации о товаре',
            'discount_perc' => 'скидка в процентах',
            'discount_price' => 'фикс. скидка в копеках',
            'description' => 'Описание',
            'characteristic' => 'Характеристика',
            'method_of_use' => 'Метод использования',
            'rating' => 'Rating',
        ];
    }

    /**
     * Gets query for [[CartHasProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCartHasProducts()
    {
        return $this->hasMany(CartHasProducts::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ProductCategory::class, ['id' => 'id_category']);
    }

    /**
     * Gets query for [[OrderHasProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderHasProducts()
    {
        return $this->hasMany(OrderHasProducts::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[PhotoProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhotoProducts()
    {
        return $this->hasMany(PhotoProduct::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[ProductIsFavorites]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductIsFavorites()
    {
        return $this->hasMany(ProductIsFavorite::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[PromotionHasProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPromotionHasProducts()
    {
        return $this->hasMany(PromotionHasProduct::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::class, ['id_product' => 'id']);
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
