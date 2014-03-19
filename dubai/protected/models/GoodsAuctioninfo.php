<?php
/**
 * Created by PhpStorm.
 * User: wliu
 * Date: 14-3-19
 * Time: 上午9:36
 */

class GoodsAuctioninfo extends EMongoDocument {
    public $id;
    public $goods;
    public $starttime;
    public $endtime;
    public $sales;
    public $lowprice;
    public $state;
    public $flowcode;

    public function getCollectionName()
    {
        return 'goods_auctioninfo';
    }

    // We can define rules for fields, just like in normal CModel/CActiveRecord classes
    public function rules()
    {
        return array(

        );
    }

    // the same with attribute names
    public function attributeNames() {
        return array(
            'goods' => 'goods',
            'starttime' => 'starttime',
            'endtime'=>'endtime',
            'lowprice'=>'lowprice',
            'state'=>'state',
            'sales'=>'sales',
            'flowcode'=>'flowcode',
            '_id'=>'_id',
        );
    }

    /**
     * This method have to be defined in every model, like with normal CActiveRecord
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
} 