<?php

/**
 * This is the model class for table "try_article".
 *
 * The followings are the available columns in table 'try_article':
 * @property string $article_id
 * @property string $item_id
 * @property string $user_id
 * @property string $article_content
 * @property integer $item_point
 */
class Article extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Article the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'try_article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item_id, user_id, article_content', 'required'),
			array('item_point', 'numerical', 'integerOnly'=>true),
			array('item_id, user_id', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('article_id, item_id, user_id, article_content, item_point', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'article_id' => 'Article',
			'item_id' => 'Item',
			'user_id' => 'User',
			'article_content' => 'Article Content',
			'item_point' => 'Item Point',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('article_id',$this->article_id,true);
		$criteria->compare('item_id',$this->item_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('article_content',$this->article_content,true);
		$criteria->compare('item_point',$this->item_point);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}