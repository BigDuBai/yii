<?php
class HomeInfo extends EMongoDocument // Notice: We extend EMongoDocument class instead of CActiveRecord
{
    public $channel;
    public $image;
    public $link;
    public $desc_zn;
    public $desc_en;
    public $updatetime;


    /**
     * This method have to be defined in every Model
     * @return string MongoDB collection name, witch will be used to store documents of this model
     */
    public function getCollectionName()
    {
        return 'homeInfo';
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
            'image'=>'image',
            'link'=>'link',
            'desc_zn'=>'desc_zn',
            'desc_en'=>'desc_en',
            'channel'=>'channel',
            'updatetime'=>'updatetime',
        );
    }

    public function getEmbeddedArrays()
    {
        return array (

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