<?php
class Brand extends EMongoDocument // Notice: We extend EMongoDocument class instead of CActiveRecord
{
    public $name;
    public $code;
    public $desc;
    public $thumb;
    public $image;
    public $website;
 

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
            'name' => 'name',
            'code'=>'code',
            'desc'=>'desc',
            'thumb'=>'thumb',
            'image'=>'image',
            'website'=>'website',
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