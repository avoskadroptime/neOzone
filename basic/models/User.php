<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login Логин
 * @property string $password закодированный 
 Пароль
 * @property int $id_role Роль пользователя
 * @property int|null $id_company id компании если пользователь является менеджером
 * @property string|null $email электронный почтовый адрес
 * @property int|null $phone тк номер телефона может быть и не российским, то макс длина 15 символов
 * @property int|null $id_city
 * @property string|null $currency Виды валюты, которые необходимо отображать
 * @property string|null $birth_date Дата рождения
 * @property string|null $gender
 * @property string|null $avatar_name Название фотографии для аватара + расширение файла
 *
 * @property Cart[] $carts
 * @property City $city
 * @property Comment[] $comments
 * @property Company $company
 * @property DeliveryAddress[] $deliveryAddresses
 * @property Order[] $orders
 * @property Product $product
 * @property ProductIsFavorite[] $productIsFavorites
 * @property ReviewHasDisLikes[] $reviewHasDisLikes
 * @property Review[] $reviews
 * @property Role $role
 * @property UserHasCard[] $userHasCards
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /*Код снизу для identity interface временен его слудует после изменить!!!*/
    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }






    /**
     * {@inheritdoc}
     */

    public function rules()
    {
        return [
            [['login', 'password', 'id_role'], 'required'],
            [['id_role', 'id_company', 'phone', 'id_city'], 'integer'],
            [['currency'], 'string'],
            [['birth_date'], 'safe'],
            [['login', 'password'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 256],
            [['gender'], 'string', 'max' => 25],
            [['avatar_name'], 'string', 'max' => 255],
            [['id_role'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['id_role' => 'id']],
            [['id_company'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['id_company' => 'id']],
            [['id_city'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['id_city' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password' => 'закодированный Пароль',
            'id_role' => 'Роль пользователя',
            'id_company' => 'id компании если пользователь является менеджером',
            'email' => 'электронный почтовый адрес',
            'phone' => 'тк номер телефона может быть и не российским, то макс длина 15 символов',
            'id_city' => 'Id City',
            'currency' => 'Виды валюты, которые необходимо отображать',
            'birth_date' => 'Дата рождения',
            'gender' => 'Gender',
            'avatar_name' => 'Название фотографии для аватара + расширение файла',
        ];
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::class, ['id_user' => 'id']);
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
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'id_company']);
    }

    /**
     * Gets query for [[DeliveryAddresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveryAddresses()
    {
        return $this->hasMany(DeliveryAddress::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[ProductIsFavorites]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductIsFavorites()
    {
        return $this->hasMany(ProductIsFavorite::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[ReviewHasDisLikes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviewHasDisLikes()
    {
        return $this->hasMany(ReviewHasDisLikes::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::class, ['id' => 'id_role']);
    }

    /**
     * Gets query for [[UserHasCards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserHasCards()
    {
        return $this->hasMany(UserHasCard::class, ['id_user' => 'id']);
    }
}
