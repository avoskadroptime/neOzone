<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "review".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_product
 * @property string $name Заголовок отзыва
 * @property int $rating Кол-во звезд от пользователя
 * @property string $description Текст отзыва
 * @property string $pluses Преимущества товара
 * @property string $minuses Недостатки товара
 * @property int $count_like Кол-во лайков на отзыве от других пользователей
 * @property int $count_dislike Кол-во дизлаков на отзыве от других пользователей
 * @property int $created_at Когда создали отзыв
 * @property int $updated_at Когда обновили отзыв
 * @property int $cheked Проверен ли отзыв админом 1-да, 0-нет
 *
 * @property Comment $comment
 * @property PhotoReview[] $photoReviews
 * @property Product $product
 * @property ReviewHasDisLikes[] $reviewHasDisLikes
 * @property User $user
 * @property VideoReview[] $videoReviews
 */
class Review extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_product', 'name', 'rating', 'description', 'pluses', 'minuses', 'count_like', 'count_dislike', 'cheked'], 'required'],
            [['id_user', 'id_product', 'rating', 'count_like', 'count_dislike', 'cheked'], 'integer'],
            [['description', 'pluses', 'minuses'], 'string'],
            //[['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['id_product' => 'id']],
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
            'id_product' => 'Id продукта',
            'name' => 'Заголовок отзыва',
            'rating' => 'Кол-во звезд от пользователя',
            'description' => 'Текст отзыва',
            'pluses' => 'Преимущества товара',
            'minuses' => 'Недостатки товара',
            'count_like' => 'Кол-во лайков на отзыве от других пользователей',
            'count_dislike' => 'Кол-во дизлайков на отзыве от других пользователей',
            'created_at' => 'Когда создали отзыв',
            'updated_at' => 'Когда обновили отзыв',
            'cheked' => 'Проверен ли отзыв админом: 1-да, 0-нет',
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
     * Gets query for [[Comment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComment()
    {
        return $this->hasOne(Comment::class, ['id_review' => 'id']);
    }

    /**
     * Gets query for [[PhotoReviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhotoReviews()
    {
        return $this->hasMany(PhotoReview::class, ['id_review' => 'id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'id_product']);
    }

    /**
     * Gets query for [[ReviewHasDisLikes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviewHasDisLikes()
    {
        return $this->hasMany(ReviewHasDisLikes::class, ['id_review' => 'id']);
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

    /**
     * Gets query for [[VideoReviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVideoReviews()
    {
        return $this->hasMany(VideoReview::class, ['id_review' => 'id']);
    }

    public static function dropDownListProduct(){
        return ArrayHelper::map(Product::find()->all(), 'id', 'name');
    }

    public static function dropDownListUser(){
        return ArrayHelper::map(User::find()->all(), 'id', 'login');
    }

}
