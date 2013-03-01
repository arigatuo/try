<?php
/**
 * Created by JetBrains PhpStorm.
 * User: k29-lizhen
 * Date: 13-2-27
 * Time: 下午5:55
 * To change this template use File | Settings | File Templates.
 */
class CacheHelper{
    /**
     * 读取缓存数据
     * @param $cacheConfig
         * 'cacheKey'  缓存键
         * 'useCache'  是否使用缓存
         * 'limit'      个数限制
         * 'cacheTime'  缓存时间
         * 'modelName'  model名
         * 'criteria'
         * 'findAll'    是findAll还是find
         * 'usePage'  是否分页, 并代表每页数量
     */
    public static function getCacheList($cacheConfig){
        $resultList = array();

        $findAll = isset($cacheConfig['findAll']) ? $cacheConfig['findAll'] : True;

        $cacheKey = $cacheConfig['cacheKey'];
        $cacheTime = $cacheConfig['cacheTime'];
        $useCache = $cacheConfig['useCache'];
        $criteria = $cacheConfig['criteria'];
        $usePage = isset($cacheConfig['usePage']) ? $cacheConfig['usePage'] : 0;
        //todo 判断
        if(empty($cacheKey) || empty($cacheTime) || empty($criteria) || empty($cacheConfig['modelName']))
            throw new CException("参数缺失");

        $cacheVal = Yii::app()->cache->get($cacheKey);

        if(!empty($cacheVal) && $useCache){
            $resultList = $cacheVal;
        }else{
            if($findAll){
                if(!empty($usePage)){
                    $count = $cacheConfig['modelName']::model()->count($criteria);
                    $pages = new CPagination($count);
                    $pages->pageSize = $usePage;
                    $pages->applyLimit($criteria);
                }
                $resultList = $cacheConfig['modelName']::model()->findAll($criteria);

                if(!empty($usePage))
                    $resultList = array($resultList, $pages);
            }else{
                $resultList = $cacheConfig['modelName']::model()->find($criteria);
            }

            if(!empty($resultList))
                Yii::app()->cache->set($cacheKey, $resultList, $cacheTime);
        }

        return $resultList;
    }
}