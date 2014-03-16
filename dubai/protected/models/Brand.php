<?php
class Brand extends EMongoDocument // Notice: We extend EMongoDocument class instead of CActiveRecord
{
    public $name_zn;
    public $name_en;
    public $code;
    public $desc_zn;
    public $desc_en;
    public $thumb;
    public $image;
    public $website;
    public $firstChart;
    public $spell;

    /**
     * This method have to be defined in every Model
     * @return string MongoDB collection name, witch will be used to store documents of this model
     */
    public function getCollectionName()
    {
        return 'brand';
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
            'code'=>'code',
            'desc_zn'=>'desc_zn',
            'desc_en'=>'desc_en',
            'thumb'=>'thumb',
            'image'=>'image',
            'website'=>'website',
            '_id'=>"_id",
            'firstChart'=>'firstChart',
            'spell'=>'spell',
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