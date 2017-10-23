<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property string $text
 * @property integer $user_id
 * @property integer $article_id
 * @property integer $status
 * @property string $date
 *
 * @property Article $article
 * @property User $user
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    const STATUS_ALLOW = 1;
    const STATUS_DISALLOW = 0;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text', 'article_id'], 'required'],
            [['text'], 'string'],
            [['user_id', 'article_id', 'status'], 'integer'],
            [['date'], 'safe'],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['article_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Текст',
            'user_id' => 'ID Пользователя',
            'article_id' => 'ID Статьи',
            'status' => 'Статус',
            'date' => 'Дата',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['id' => 'article_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    //imported functions
    public function getDate(){
        return Yii::$app->formatter->asDate($this->date);
    }

    public function isAllowed(){
        return $this->status;
    }

    public function allow(){
        $this->status = self::STATUS_ALLOW;
        return $this->save(false);
    }

    public function disallow(){
        $this->status = self::STATUS_DISALLOW;
        return $this->save(false);
    }
}
