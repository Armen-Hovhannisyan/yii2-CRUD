<?php

namespace common\models;

use yii\db\ActiveRecord;

class Post extends ActiveRecord
{


    /**
     * @return string the associated database table name
     */
    public static function tableName()
    {
        return 'posts';
    }
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            ['title', 'string', 'min' => 3],
            [ 'content', 'string', 'min' => 20],
            ['title', 'unique'],
        ];
    }
    /**
     * @return array primary key of the table
     **/
    public static function primaryKey()
    {
        return array('id');
    }

    public static  function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }
    public static function findByAuthorId($id){
        return static::findAll(['author_id' => $id]);

    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public
    function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'created' => 'Created',
            'updated' => 'Updated',
        );
    }
}