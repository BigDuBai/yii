<?php
class Ad extends EMongoDocument // Notice: We extend EMongoDocument class instead of CActiveRecord
{
    public $type;
    public $images;
 

    /**
     * This method have to be defined in every Model
     * @return string MongoDB collection name, witch will be used to store documents of this model
     */
    public function getCollectionName()
    {
        return 'ad';
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
            'ad' => 'ad',
            'images'=>'images',
            'type'=>'type',
            '_id'=>"_id",
        );
    }
 
    // Add EEmbeddedArraysBehavior
    public function behaviors()
    {
        return array(
            'embeddedArrays' => array(
                'class'=>'ext.YiiMongoDbSuite.extra.EEmbeddedArraysBehavior',
                'arrayPropertyName'=>'images',       // name of property, that will be used as an array
                'arrayDocClassName'=>'AdResource'    // class name of embedded documents in array
            ),
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