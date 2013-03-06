<?php

/**
 * This is the model class for table "try_article".
 *
 * The followings are the available columns in table 'try_article':
 * @property string $article_id
 * @property string $item_id
 * @property string $user_id
 * @property string $article_title
 * @property string $article_content
 * @property integer $item_point
 * @property string $article_ctime
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
			array('item_id, article_title, article_content', 'required'),
			array('item_point, item_id', 'numerical', 'integerOnly'=>true),
			array('item_id, user_id', 'length', 'max'=>20),
			array('article_title', 'length', 'max'=>100),
			array('article_ctime', 'length', 'max'=>10),
            array('article_status,item_brand_id,bbs_tid' , 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('article_id, item_id, item_brand_id, user_id, article_title, article_content, item_point, article_ctime', 'safe', 'on'=>'search'),
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
			'article_id' => Yii::t('base','Article'),
			'item_id' => Yii::t('base','Item'),
			'user_id' => Yii::t('base','User'),
			'article_title' => Yii::t('base','Article Title'),
			'article_content' => Yii::t('base','Article Content'),
			'item_point' => Yii::t('base','Item Point'),
			'article_ctime' => Yii::t('base','Article Ctime'),
            'item_brand_id' => Yii::t('base','Item Brand Id'),
            'article_status' => Yii::t('base', 'Article Status'),
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

		$criteria->compare('article_id',$this->article_id,false);
        $criteria->compare('item_brand_id',$this->item_brand_id,false);
		$criteria->compare('item_id',$this->item_id,false);
        $criteria->compare('article_status',$this->article_status,false);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('article_title',$this->article_title,true);
		$criteria->compare('article_content',$this->article_content,true);
		$criteria->compare('item_point',$this->item_point, false);
		$criteria->compare('article_ctime',$this->article_ctime, false);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function beforeSave(){
        if(empty($this->article_ctime))
            $this->article_ctime = time();
        if(empty($this->item_brand_id) && !empty($this->item_id)){
            $brand_id = Item::model()->findByPk($this->item_id)->getAttribute("item_brand_id");
            $this->item_brand_id = $brand_id;
        }

        /**
         * 如果是过审核的心得同步发到论坛
         */
        if($this->article_status == "accept" && empty($this->bbs_tid)){
            $uid = $this->user_id;
            $username = MyUcenter::getUsernameByUid($uid);
            if(!empty($uid) && !empty($username)){
                $checkKey = array("author", "authorid", "subject", "message");
                $threadInfo = array(
                    'fid' => Yii::app()->params['bbs_thread_publish']['fid'],
                    'author' => $username,
                    'authorid' => $uid,
                    'subject' => $this->article_title,
                    'message' => $this->article_content,
                    'htmlon' => 1,
                );
                $newBbsSync = new BbsSync();
                $tid = $newBbsSync->syncThread($threadInfo);
                if(!empty($tid) && is_numeric($tid)){
                    $this->bbs_tid = $tid;
                }
            }
        }

        return parent::beforeSave();
    }

    public function getList($useCache = 1, $limit = 6){
        $criteria = new CDbCriteria();
        $criteria->select = "user_id,item_id,article_title";
        $criteria->addCondition("article_status=:article_status");
        $criteria->params = array(
            ':article_status' => 'accept',
        );
        $cacheConfig = array(
            'cacheKey' => md5(__CLASS__.__FUNCTION__),
            'useCache' => $useCache,
            'limit' => $limit,
            'cacheTime' => Yii::app()->params['cacheTime']['hour'],
            'criteria' => $criteria,
            'modelName' => __CLASS__,
        );

        return CacheHelper::getCacheList($cacheConfig);
    }


    /**
     * 试用报告状态列表
     * @param string $key
     * @return array
     */
    public function statusList($key=""){
        $list =  array(
            'applying' => '申请中',
            'accept' => '申请通过',
            'deny' => '忽略',
        );
        return !empty($key) && array_key_exists($key, $list) ? $list[$key] : $list;
    }
}