<?php
class Sales extends EMongoDocument // Notice: We extend EMongoDocument class instead of CActiveRecord
{
    public $id;
    //昵称
    public $nickname;
    //代理品牌
    public $brand;
    //商铺
    public $shop;
    //电话号码
    public $telephone;
    //email
    public $email;
    //账号
    public $account;
    //密码
    public $password;

    /**
     * This method have to be defined in every Model
     * @return string MongoDB collection name, witch will be used to store documents of this model
     */
    public function getCollectionName()
    {
        return 'sales';
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
            //'ad' => 'ad',
            'nickname'=>'nickname',
            'brand'=>'brand',
            'shop'=>'shop',
            'telephone'=>'telephone',
            'email'=>'email',
            'account'=>'account',
            'password'=>'password',
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