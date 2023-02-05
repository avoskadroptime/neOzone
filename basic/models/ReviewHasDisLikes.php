<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "review_has_dis_likes".
 *
 * @property int $id
 * @property int $id_review
 * @property int $id_user
 * @property int $id_like
 *
 * @property DisLike $like
 * @property Review $review
 * @property User $user
 */
class ReviewHasDisLikes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review_has_dis_likes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_review', 'id_user', 'id_like'], 'required'],
            [['id_review', 'id_user', 'id_like'], 'integer'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            [['id_review'], 'exist', 'skipOnError' => true, 'targetClass' => Review::class, 'targetAttribute' => ['id_review' => 'id']],
            [['id_like'], 'exist', 'skipOnError' => true, 'targetClass' => DisLike::class, 'targetAttribute' => ['id_like' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_review' => 'Id отзыва',
            'id_user' => 'Id пользователя',
            'id_like' => 'Id dis/like',
        ];
    }

    /**
     * Gets query for [[Like]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLike()
    {
        return $this->hasOne(DisLike::class, ['id' => 'id_like']);
    }

    /**
     * Gets query for [[Review]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReview()
    {
        return $this->hasOne(Review::class, ['id' => 'id_review']);
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

    public static function dropDownListReview(){
        return ArrayHelper::map(Review::find()->all(), 'id', 'name');
    }

    public static function dropDownListLike(){
        return ArrayHelper::map(DisLike::find()->all(), 'id', 'name');
    }
}
