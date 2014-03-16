<?php
class Category extends EMongoDocument // Notice: We extend EMongoDocument class instead of CActiveRecord
{
    public $id;
    public $name_en;
    public $name_zn;
    public $code;
    public $icon;
    public $desc_en;
    public $desc_zn;
    public $parentId;
    public $sort;

    /**
     * This method have to be defined in every Model
     * @return string MongoDB collection name, witch will be used to store documents of this model
     */
    public function getCollectionName()
    {
        return 'category';
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
            'name_en' => 'name_en',
            'name_zn' => 'name_zn',
            'code'=>'code',
            'desc_zn'=>'desc_zn',
            'desc_en'=>'desc_en',
            'icon'=>'icon',
            'parentId'=>'parentId',
            'sort'=>'sort',
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