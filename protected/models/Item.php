<?php

/**
 * This is the model class for table "try_item".
 *
 * The followings are the available columns in table 'try_item':
 * @property string $item_id
 * @property string $item_name
 * @property string $item_brand_id
 * @property string $item_ctime
 * @property string $item_status
 * @property string $item_start_time
 * @property string $item_end_time
 * @property string $item_intro
 * @property string $item_apply_num_plus
 * @property string $item_apply_num
 * @property string $item_piece
 */
class Item extends CActiveRecord
{
    //更新前的record
    public $oldRecord;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Item the static model class
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
		return 'try_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item_name, item_type_id, item_brand_id, item_start_time, item_end_time, item_pic_small,
			item_pic_middle',
                'required'),
			array('item_name', 'length', 'max'=>30),
			array('item_brand_id, item_apply_num_plus, item_apply_num, item_piece', 'length', 'max'=>10),
			array('item_status', 'length', 'max'=>7),
			array('item_intro, item_pic_small, item_pic_middle, item_piece_left, item_prop', 'safe'),
            array('item_start_time', 'compare', 'compareAttribute'=>'item_end_time', 'operator'=>'<',
                'message'=>'试用申请开始时间必须小于结束时间'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('item_id, item_name, item_brand_id, item_ctime, item_status, item_type_id', 'safe', 'on'=>'search'),
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
            "brand" => array(self::BELONGS_TO, "Brand", '', 'on'=>'t.item_brand_id=brand.brand_id'),
            'item_type' => array(self::BELONGS_TO, "ItemType", "", 'on'=>'t.item_type_id=item_type.item_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'item_id' => 'Item',
			'item_name' => 'Item Name',
			'item_brand_id' => 'Item Brand',
			'item_ctime' => 'Item Ctime',
			'item_status' => 'Item Status',
			'item_start_time' => 'Item Start Time',
			'item_end_time' => 'Item End Time',
			'item_intro' => 'Item Intro',
			'item_apply_num_plus' => 'Item Apply Num Plus',
			'item_apply_num' => 'Item Apply Num',
			'item_piece' => 'Item Piece',
            'item_type_id' => 'Item Type Id',
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

		$criteria->compare('item_id',$this->item_id,false);
		$criteria->compare('item_name',$this->item_name,true);
		$criteria->compare('item_brand_id',$this->item_brand_id,false);
		$criteria->compare('item_status',$this->item_status,false);
        $criteria->compare('item_ctime',$this->item_ctime,true);
        $criteria->compare('item_type_id',$this->item_type_id,false);
        /*
		$criteria->compare('item_start_time',$this->item_start_time,true);
		$criteria->compare('item_end_time',$this->item_end_time,true);
		$criteria->compare('item_intro',$this->item_intro,true);
		$criteria->compare('item_apply_num_plus',$this->item_apply_num_plus,true);
		$criteria->compare('item_apply_num',$this->item_apply_num,true);
		$criteria->compare('item_piece',$this->item_piece,true);
        */

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * 试用装状态列表
     * @param string $key, 有key的话返回对应value
     * @return array
     */
    public function statusList($key=""){
        $list = array(
            'offline' => '未发布',
            'online' => '发布',
        );
        if(!empty($key) && array_key_exists($key, $list))
            return $list[$key];
        else
            return $list;
    }


    public function afterFind(){
        //时间格式化
        if(!empty($this->item_start_time))
            $this->item_start_time = CommonHelper::formatDate($this->item_start_time);
        if(!empty($this->item_end_time))
            $this->item_end_time = CommonHelper::formatDate($this->item_end_time);
        if(!empty($this->item_ctime))
            $this->item_ctime = CommonHelper::formatDate($this->item_ctime);

        //保存更新之前的记录
        $this->oldRecord = clone $this;


        return parent::afterFind();
    }

    public function beforeSave(){
        //转化为时间戳格式
        if($this->isNewRecord){
            $this->item_ctime = time();
        }else{
            !empty($this->item_ctime) && $this->item_ctime = strtotime($this->item_ctime);
        }
        if(!empty($this->item_start_time))
            $this->item_start_time = strtotime($this->item_start_time);
        if(!empty($this->item_end_time))
            $this->item_end_time = strtotime($this->item_end_time);

        /**
         * 图片更新删除之前的图片
         */
        if(!empty($this->oldRecord->item_pic_small) && $this->oldRecord->item_pic_small != $this->item_pic_small){
            CommonHelper::unlinkRelationPic($this->oldRecord->item_pic_small);
        }
        if(!empty($this->oldRecord->item_pic_middle) && $this->oldRecord->item_pic_middle != $this->item_pic_middle){
            CommonHelper::unlinkRelationPic($this->oldRecord->item_pic_middle);
        }
        return parent::beforeSave();
    }

    //删除,更改条目后删除图片文件
    public function beforeDelete(){
        !empty($this->item_pic_small) && CommonHelper::unlinkRelationPic($this->item_pic_small);
        !empty($this->item_pic_middle) && CommonHelper::unlinkRelationPic($this->item_pic_middle);
        return parent::beforeDelete();
    }

    /**
     * 读取相关列表
     * @param $position
     * @param int $limit
     * @param int $useCache
     * @return array
     */
    public function readList($limit = 5, $useCache = 1, $usePage = 0){
        $criteria = new CDbCriteria();
        $criteria->addCondition("`item_status`=:item_status");
        $criteria->params = array(
            'item_status' => 'online',
        );
        $criteria->order = "item_id desc";
        if(empty($usePage))
            $criteria->limit = $limit;
        $criteria->with = array('brand');

        $curPage = Yii::app()->request->getParam("page");

        $cacheConfig = array(
            'cacheKey' => md5(__CLASS__.__FUNCTION__.$limit.$usePage.$curPage),
            'useCache' => $useCache,
            'limit' => $limit,
            'cacheTime' => Yii::app()->params['cacheTime']['hour'],
            'modelName' => __CLASS__,
            'criteria' => $criteria,
            'usePage' => $usePage,
        );
        return CacheHelper::getCacheList($cacheConfig);
    }
}