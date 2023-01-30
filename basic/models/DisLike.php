<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dis_like".
 *
 * @property int $id
 * @property string $name
 *
 * @property ReviewHasDisLikes[] $reviewHasDisLikes
 */
class DisLike extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dis_like';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 25],
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
        ];
    }

    /**
     * Gets query for [[ReviewHasDisLikes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviewHasDisLikes()
    {
        return $this->hasMany(ReviewHasDisLikes::class, ['id_like' => 'id']);
    }
}
