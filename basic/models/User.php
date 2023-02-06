<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username Логин
 * @property string $password write-only password
 * @property int|null $id_role Роль пользователя
 * @property int|null $id_company id компании если пользователь является менеджером
 * @property string|null $email электронный почтовый адрес
 * @property int|null $phone тк номер телефона может быть и не российским, то макс длина 15 символов
 * @property int|null $id_city
 * @property string|null $currency Виды валюты, которые необходимо отображать
 * @property string|null $birth_date Дата рождения
 * @property string|null $gender
 * @property string|null $avatar_name Название фотографии для аватара + расширение файла
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
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
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
    * @inheritdoc
    */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /*Код снизу для identity interface временен его слудует после изменить!!!*/
    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    /**
* @inheritdoc
*/
public static function findIdentity($id)
{
    return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
}
/**
* @inheritdoc
*/
public static function findIdentityByAccessToken($token, $type = null)
{
    throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
}
/**
* Finds user by username
*
* @param string $username
* @return static|null
*/
public static function findByUsername($username)
{
    return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
}
/**
* @inheritdoc
*/
public function getId()
{
    return $this->getPrimaryKey();
}
/**
* @inheritdoc
*/
public function getAuthKey()
{
    return $this->auth_key;
}
/**
* @inheritdoc
*/
public function validateAuthKey($authKey)
{
    return $this->getAuthKey() === $authKey;
}
/**
* Validates password
*
* @param string $password password to validate
* @return bool if password provided is valid for current user
*/
public function validatePassword($password)
{
    return Yii::$app->security->validatePassword($password, $this->password_hash);
}
/**
* Generates password hash from password and sets it to the model
*
* @param string $password
*/
public function setPassword($password)
{
    $this->password_hash = Yii::$app->security->generatePasswordHash($password);
}
/**
* Generates "remember me" authentication key
*/
public function generateAuthKey()
{
    $this->auth_key = Yii::$app->security->generateRandomString();
}
    /**
     * {@inheritdoc}
     */

    public function rules()
    {
        return [
            [['username'], 'required'],
            [['id_role', 'id_company', 'phone', 'id_city'], 'integer'],
            [['currency'], 'string'],
            [['birth_date'], 'safe'],
            //[['password'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 256],
            [['gender'], 'string', 'max' => 25],
            [['avatar_name'], 'string', 'max' => 255],
            [['id_role'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['id_role' => 'id']],
            [['id_company'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['id_company' => 'id']],
            [['id_city'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['id_city' => 'id']],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Логин',
            'id_role' => 'Id Роль пользователя',
            'id_company' => 'Id компании если пользователь является менеджером',
            'email' => 'Электронный почтовый адрес',
            'phone' => 'Номер телефона',
            'id_city' => 'Id города',
            'currency' => 'Вид валюты',
            'birth_date' => 'Дата рождения',
            'gender' => 'Гендер/пол',
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

    public static function dropDownListRole(){
        return ArrayHelper::map(Role::find()->all(), 'id', 'name');
    }

    public static function dropDownListCompany(){
        return ArrayHelper::map(Company::find()->all(), 'id', 'name');
    }

    public static function dropDownListCity(){
        return ArrayHelper::map(City::find()->all(), 'id', 'name_ru');
    }
}
