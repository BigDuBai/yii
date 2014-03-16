<?php
class Goods extends EMongoDocument // Notice: We extend EMongoDocument class instead of CActiveRecord
{
    public $id;
    public $desc_zn;
    public $name_zn;
    public $desc_en;
    public $name_en;
    public $originPrice;
    public $icon;

    public $images;
    public $brand;
    public $categoryCode;
    public $code;
    public $inventory;
    public $material;
    public $placeOfOrigin;
    public $sales;
    public $shelfTime;
    public $size;
    public $tags;

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
            'name_zn' => 'name_zn',
            'name_en' => 'name_en',
            'desc_zn'=>'desc_zn',
            'desc_en'=>'desc_en',
            'icon'=>'icon',
            'code'=>'code',
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