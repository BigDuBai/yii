<?php
class User extends EMongoDocument // Notice: We extend EMongoDocument class instead of CActiveRecord
{
    public $email;
    public $email_validate;
    public $password;
    public $qq;
    public $mobile;
    public $mobile_validate;
    public $nickname;
    public $grade;
    public $login_sum;
    public $username;

    /**
     * This method have to be defined in every Model
     * @return string MongoDB collection name, witch will be used to store documents of this model
     */
    public function getCollectionName()
    {
        return 'user';
    }
 
    // We can define rules for fields, just like in normal CModel/CActiveRecord classes
    public function rules()
    {
        return array(
            array('email','email')
            // array('login, email, personal_no', 'required'),
            // //array('personal_no', 'numeric', 'integerOnly' => true),
            // array('email', 'email'),
        );
    }
 
    // the same with attribute names
    public function attributeNames()
    {
        return array(
            'email' => 'email',
            'email_validate'=>'email_validate',
            'password'=>'password',
            'qq'=>'qq',
            'mobile'=>'mobile_validate',
            'nickname'=>'nickname',
            'grade'=>'grade',
            'login_sum'=>'login_sum',
            'username'=>'username',
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