<?php
class Goods extends EMongoDocument // Notice: We extend EMongoDocument class instead of CActiveRecord
{
    public $id;
    public $name_zn;
    public $name_en;
    public $originPrice;
    public $icon;
    public $images;
    public $brand;
    public $category;
    public $code;
    //商品简介
    public $desc_zn;
    public $desc_en;
    //材质
    public $material_en;
    public $material_zn;
    //原产地
    public $placeOfOrigin_en;
    public $placeOfOrigin_zn;
    //尺寸
    public $size;

    //库存
    public $inventory;
    //是否售卖的商品
    public $sales;
    //允许上架时间
    public $shelfTime;

    //标签
    public $tags;
    public $technology;

    //品牌地址
    public $shopimage;
    //品牌图片
    public $shopaddress;

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
            'category'=>'category',
            'originPrice'=>'originPrice',
            '$technology'=>'$technology',
            'sales'=>'sales',
            'shelfTime'=>'shelfTime',
            'size'=>'size',
            'tags'=>'tags',
            "material_en"=>"material_en",
            "material_zn"=>"material_zn",
            "placeOfOrigin_en"=>"placeOfOrigin_en",
            "placeOfOrigin_zn"=>"placeOfOrigin_zn",
            "shopimage"=>"shopimage",
            "shopaddress"=>"shopaddress",
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