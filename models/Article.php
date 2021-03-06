<?php

namespace app\models;

use Yii;
use yii\data\Pagination;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $date
 * @property string $image
 * @property integer $viewed
 * @property integer $comments
 * @property integer $author_id
 * @property integer $status
 * @property integer $category_id
 * @property integer $is_top
 *
 * @property Category $category
 * @property ArticleTag[] $articleTags
 * @property Comment[] $comments0
 */
class Article extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description', 'content'], 'string'],
//            [['date'], 'safe'],
            [['date'], 'date', 'format'=>'php:Y-m-d'],
            [['date'], 'default', 'value'=>date('Y-m-d')],
            [['viewed', 'comments', 'author_id', 'status', 'category_id', 'is_top'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'content' => 'Content',
            'date' => 'Дата',
            'image' => 'Изображение',
            'viewed' => 'Просмотры',
            'comments' => 'Комментарии',
            'author_id' => 'ID Автора',
            'status' => 'Статус',
            'category_id' => 'ID Категории',
            'is_top' => 'Главная новость',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleTags()
    {
        return $this->hasMany(ArticleTag::className(), ['article_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['article_id' => 'id']);
    }

    public function getResource($id = null){
        if($id){
            return '';
        }
        return '';
//        return ($this->resource)? $this->resource : '';
    }

    public function getMainNews(){
//        $mainNews = Article::findAll(['status' => 1, 'is_top' => 1]);
        $mainNews = Article::findOne(['status' => 1, 'is_top' => 1]);
        if ($mainNews){
            return $mainNews;
        }
        return null;
    }

    public function getCategoryName(){
        $category = Category::findOne(['id' => $this->category_id]);
        return $category->title;
    }

    public static function getArticlesByAuthor($id){
        // build a DB query to get all articles with status = 1
        $query = Article::find()->where(['author_id'=>$id, 'status' => 1]);

        // get the total number of articles (but do not fetch the article data yet)
        $count = $query->count();

        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 5]);

        // limit the query using the pagination and retrieve the articles
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $data['articles'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }

    public static function getArticlesByTag($id){
        // build a DB query to get all articles with status = 1
        $articlesTags = ArticleTag::findAll(['tag_id'=>$id]);

        $queryString = '';
        foreach ($articlesTags as $tag){
            $queryString.=' (id = '.$tag->article_id.') OR ';
        }
        $length = strlen($queryString);
        $queryString = substr($queryString, 0, $length-4);

        $connection = Yii::$app->db;
        $query = $connection->createCommand('SELECT * FROM article WHERE '.$queryString);

        $articles = $query->queryAll();

        // get the total number of articles (but do not fetch the article data yet)
        $count = count($articlesTags);

        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 12]);

        // limit the query using the pagination and retrieve the articles
        /*$articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $data['articles'] = $articles;
        $data['pagination'] = $pagination;*/

        return $articles;
    }

    //imported functions
    public function saveImage($filename){
        $this->image = $filename;
        return $this->save(false);
    }

    public function getImage($id = null){
        if ($id){
            $model = Article::findOne(['id'=>$id]);
            return ($model->image)? '/uploads/'.$model->image : '/no-image.png';
        } else {
            return ($this->image) ? '/uploads/' . $this->image : '/no-image.png';
        }
    }

    public function deleteImage(){
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteCurrentImage($this->image);
    }

    public function beforeDelete()
    {
        $this->deleteImage();
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    public function saveCategory($category_id)
    {
        $category = Category::findOne($category_id);
        if ($category != null){
            $this->link('category',$category);
            return true;
        }
    }

    public function getTags(){
        return $this->hasMany(Tag::className(),['id'=>'tag_id'])->viaTable('article_tag',['article_id'=>'id']);
    }

    public function getSelectedTags(){
        $selectedTags = $this->getTags()->select('id')->asArray()->all();
        return ArrayHelper::getColumn($selectedTags,'id');
    }

    public function saveTags($tags){
        if (is_array($tags)){
            $this->clearCurrentTags();
            foreach ($tags as $tag_id){
                $tag = Tag::findOne($tag_id);
                $this->link('tags',$tag);
            }
        }
    }

    public function clearCurrentTags(){
        ArticleTag::deleteAll(['article_id'=>$this->id]);
    }

    public function getDate($id = null){
        if ($id){
            return Yii::$app->formatter->asDate(Article::findOne(['id'=>$id])->date);
        }
        return Yii::$app->formatter->asDate($this->date);
    }

    public static function getAll($pageSize = 9){
        // build a DB query to get all articles with status = 1
        $query = Article::find()->where(['status' => 1, 'is_top' => 0]);

        // get the total number of articles (but do not fetch the article data yet)
        $count = $query->count();

        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);

        // limit the query using the pagination and retrieve the articles
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $data['articles'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }

    public static function getPopular(){
        return Article::find()->where(['status' => 1, 'is_top' => 0])->orderBy('viewed desc')->limit(5)->all();
    }

    public static function getRecent(){
        return Article::find()->orderBy('date asc')->limit(5)->all();
    }

    public function saveArticle(){
        $this->author_id = Yii::$app->user->id;
        return $this->save();
    }

    public function getArticleComments(){
        return $this->getComments()->where(['status'=>1])->all();
    }

    public function getAuthor($id = null){
        if ($id){
            $model = Article::findOne(['id'=>$id]);
            $author = User::findOne(['id' => $model->author_id]);
            if ($author){
                return $author->name;
            }
            return null;
        } else {
//          return $this->hasOne(User::className(),['id'=>'author_id']);
            $author = User::findOne(['id' => $this->author_id]);
            if ($this->author_id) {
                return $author->name;
            }
            return null;
        }
    }

    public function viewedCounter(){
        $this->viewed += 1;
        return $this->save(false);
    }

}
