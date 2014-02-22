<?php
class User extends EMongoDocument // Notice: We extend EMongoDocument class instead of CActiveRecord
{
    public $personal_no;
    public $login;
    public $first_name;
    public $last_name;
    public $email;
    public $arr;
    public $_id;

    /**
     * This method have to be defined in every Model
     * @return string MongoDB collection name, witch will be used to store documents of this model
     */
    public function getCollectionName()
    {
        return 'users';
    }
 
    // We can define rules for fields, just like in normal CModel/CActiveRecord classes
    public function rules()
    {
        return array(
            array('login, email, personal_no', 'required'),
            //array('personal_no', 'numeric', 'integerOnly' => true),
            array('email', 'email'),
        );
    }
 
    // the same with attribute names
    public function attributeNames()
    {
        return array(
            'email' => 'email','login'=>'login','address'=>'address','arr'=>'arr',
            '_id'=>"_id",
        );
    }

    public function embeddedDocuments()
    {
        return array(
            // property field name => class name to use for this embedded document
            'address' => 'UserAddress',
        );
    }

    public $addresses;
 
    // Add EEmbeddedArraysBehavior
    // public function behaviors()
    // {
    //     return array(
    //         'embeddedArrays' => array(
    //             'class'=>'ext.YiiMongoDbSuite.extra.EEmbeddedArraysBehavior',
    //             'arrayPropertyName'=>'addresses',       // name of property, that will be used as an array
    //             'arrayDocClassName'=>'UserAddress'    // class name of embedded documents in array
    //         ),
    //     );
    // }
 
    /**
     * This method have to be defined in every model, like with normal CActiveRecord
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}