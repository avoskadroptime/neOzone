<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int|null $id_user
 * @property string $answer_to На что делает ответ пользователь, на другой комментарий или уже на отзыв
 * @property int|null $id_review Заполняется если на отзыв
 * @property int|null $id_comment Заполняется если на комментарий
 * @property string $text
 *
 * @property Comment $comment
 * @property Comment[] $comments
 * @property Review $review
 * @property User $user
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_review', 'id_comment'], 'integer'],
            [['answer_to', 'text'], 'required'],
            [['answer_to', 'text'], 'string'],
            [['id_review'], 'unique'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            [['id_review'], 'exist', 'skipOnError' => true, 'targetClass' => Review::class, 'targetAttribute' => ['id_review' => 'id']],
            [['id_comment'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::class, 'targetAttribute' => ['id_comment' => 'id']],
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
            'answer_to' => 'На что делает ответ пользователь, на другой комментарий или уже на отзыв',
            'id_review' => 'Заполняется если на отзыв',
            'id_comment' => 'Заполняется если на комментарий',
            'text' => 'Текст',
        ];
    }

    /**
     * Gets query for [[Comment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComment()
    {
        return $this->hasOne(Comment::class, ['id' => 'id_comment']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['id_comment' => 'id']);
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
}
