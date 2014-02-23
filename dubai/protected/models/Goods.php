<?php
class Goods extends EMongoDocument // Notice: We extend EMongoDocument class instead of CActiveRecord
{
    public $brand;
    public $categoryCode;
    public $code;
    public $images;
    public $inventory;
    public $material;
    public $originPrice;
    public $placeOfOrigin;
    public $sales;
    public $shelfTime;
    public $size;
    public $tags;
    public $desc;
    public $name;
 

    /**
     * This method have to be defined in every Model
     * @return string MongoDB collection name, witch will be used to store documents of this model
     */
    public function getCollectionName()
    {
        return 'goods_info';
    }
 
    // We can define rules for fields, just like in normal CModel/CActiveRecord classes
    public function rules()
    {
        return array(
        
        );
    }
 
    // the same with attribute names
    public function attributeNames()
    {
        return array(
            'name' => 'name',
            'code'=>'code',
            'desc'=>'desc',
            'brand'=>'brand',
            'images'=>'images',
            'inventory'=>'inventory',
            'categoryCode'=>'categoryCode',
            'material'=>'material',
            'originPrice'=>'originPrice',
            'placeOfOrigin'=>'placeOfOrigin',
            'sales'=>'sales',
            'shelfTime'=>'shelfTime',
            'size'=>'size',
            'tags'=>'tags',
            'shelfTime'=>'shelfTime',
            '_id'=>"_id",
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