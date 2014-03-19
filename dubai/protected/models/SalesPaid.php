<?php
/**
 * Sales报价
 * User: wliu
 * Date: 14-3-19
 * Time: 上午9:36
 */

class SalesPaid extends EMongoDocument {
    public $id;
    public $goods;
    public $sales;
    public $price;
    public $paidTime;
    public $auction;

    public function getCollectionName()
    {
        return 'sales_paid';
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
            'sales' => 'sales',
            'paidTime'=>'paidTime',
            'price'=>'price',
            'auction'=>'auction',
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