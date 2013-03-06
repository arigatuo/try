<?php

/**
 * This is the model class for table "try_apply".
 *
 * The followings are the available columns in table 'try_apply':
 * @property string $apply_id
 * @property string $user_id
 * @property string $item_id
 * @property string $apply_status
 * @property string $apply_text
 * @property string $addr_province
 * @property string $addr_city
 * @property string $addr_phone
 * @property string $addr_address
 * @property string $addr_name
 * @property string $apply_time
 * @property string $addr_email
 */
class Apply extends CActiveRecord
{
    public $userDetails;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Apply the static model class
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
		return 'try_apply';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
        return array(
            array('item_id, apply_text, addr_province, addr_city, addr_address, addr_name, addr_phone,
			addr_email', 'required', 'message'=>'{attribute}不能为空'),
            array('item_id', 'length', 'max'=>20),
            array('addr_email', 'email', 'message'=>'请输入正确的email地址'),
            array('addr_name', 'match', 'pattern'=>'/^[\x{4e00}-\x{9fa5}]*$/u', 'message'=>'请输入中文姓名'),
            array('addr_phone', 'match', 'pattern'=>'/^1[0-9]{10}$/u', 'message'=>'请输入正确的电话'),
            array('addr_address', 'length', 'min'=>5),
            array('apply_text, user_details, apply_status, item_brand_id, bbs_pid', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('apply_id, user_id, item_brand_id, item_id, apply_status, apply_text', 'safe', 'on'=>'search'),
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
			'apply_id' => Yii::t("base",'Apply'),
			'user_id' => Yii::t('base','User'),
			'item_id' => Yii::t('base','Item'),
            'item_brand_id' => Yii::t('base', 'Item Brand Id'),
			'apply_status' => Yii::t('base','Status'),
			'apply_text' => Yii::t('base','Apply Text'),
			'addr_province' => Yii::t('base','Addr Province'),
			'addr_city' => Yii::t('base','Addr City'),
			'addr_phone' => Yii::t('base','Addr Phone'),
			'addr_address' => Yii::t('base','Addr Address'),
			'addr_name' => Yii::t('base','Addr Name'),
			'apply_time' => Yii::t('base','Apply Time'),
			'addr_email' => Yii::t('base','Addr Email'),
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

		$criteria->compare('apply_id',$this->apply_id,false);
		$criteria->compare('user_id',$this->user_id,false);
		$criteria->compare('item_id',$this->item_id,false);
        $criteria->compare('item_brand_id',$this->item_brand_id,false);
		$criteria->compare('apply_status',$this->apply_status,true);
		$criteria->compare('apply_text',$this->apply_text,true);
		$criteria->compare('addr_province',$this->addr_province,true);
		$criteria->compare('addr_city',$this->addr_city,true);
		$criteria->compare('addr_phone',$this->addr_phone,false);
		$criteria->compare('addr_address',$this->addr_address,true);
		$criteria->compare('addr_name',$this->addr_name,true);
		$criteria->compare('apply_time',$this->apply_time,true);
		$criteria->compare('addr_email',$this->addr_email,false);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * 试用装申请状态列表
     * @param string $key
     * @return array
     */
    public function statusList($key=""){
        $list =  array(
            'applying' => '申请中',
            'accept' => '申请通过',
            'selected' => '获得试用装',
            'deny' => '忽略',
        );
        return !empty($key) && array_key_exists($key, $list) ? $list[$key] : $list;
    }

    public function beforeSave(){
        if($this->isNewRecord || empty($this->item_brand_id)){
            $this->apply_time = time();
            $brand_id = Item::model()->findByPk($this->item_id)->getAttribute("item_brand_id");
            if(!empty($brand_id))
                $this->item_brand_id = $brand_id;
        }
        if(!is_numeric($this->apply_time))
            $this->apply_time = strtotime($this->apply_time);

        /**
         * 同步发回复
         */
        if(empty($this->bbs_pid) && in_array($this->apply_status, array("selected", "accept"))){
            $uid = $this->user_id;
            $username = MyUcenter::getUserNameByUid($uid);
            if(!empty($uid) && !empty($username)){
                $curItem = Item::model()->findByPk($this->item_id);
                $curItemBBSTid = $curItem->getAttribute("bbs_tid");

                if(!empty($curItemBBSTid)){
                    $postInfo = array(
                        'tid' => $curItemBBSTid,
                        'author' => $username,
                        'authorid' => $uid,
                        'subject' => '',
                        'message' => $this->apply_text,
                    );
                    $newSync = new BbsSync();
                    $pid = $newSync->syncPost($postInfo);
                    if(!empty($pid))
                        $this->bbs_pid = $pid;
                }
            }
        }


        return parent::beforeSave();
    }

    public function afterFind(){
        if(!empty($this->apply_time))
            $this->apply_time = CommonHelper::formatDate($this->apply_time);
        return parent::afterFind();
    }

    /**
     * 取得申请列表
     * @param $item_id
     * @param string $select
     * @param array $apply_status
     * @param int $limit
     * @param int $useCache
     * @return mixed
     */
    public function getListByItemId($item_id, $select = "", $apply_status=array(), $limit=5, $useCache=1, $usePage = 0){
        if(!empty($item_id) && is_numeric($item_id)){
            if(empty($apply_status))
                $apply_status = array('accept','selected');

            $criteria = new CDbCriteria();
            $criteria->addCondition("item_id=:item_id");
            $criteria->params = array(
                ':item_id' => $item_id,
            );
            $criteria->addInCondition("apply_status" , $apply_status);
            if(!empty($select))
                $criteria->select = $select;
            $curPage = Yii::app()->request->getParam("page");

            $cacheConfig = array(
                'cacheKey' => md5(__CLASS__.__FUNCTION__.$item_id.$select.serialize($apply_status).$limit.$usePage
                    .$curPage),
                'useCache' => $useCache,
                'limit' => $limit,
                'cacheTime' => Yii::app()->params['cacheTime']['5min'],
                'criteria' => $criteria,
                'modelName' => __CLASS__,
                'usePage' => $usePage,
            );

            return CacheHelper::getCacheList($cacheConfig);
        }
    }

}