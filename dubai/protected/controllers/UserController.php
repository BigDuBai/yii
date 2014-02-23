<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//$this->render('index');

		// Yii::app()->redis->getClient()->set("myKey", "Your Value");
		// //echo Yii::app()->redis->getClient()->get("myKey"); // outputs "Your Value"
		// Yii::app()->redis->getClient()->del("myKey"); // deletes the key
		// echo json_encode(array('a' =>1));
		// $user = new User();
		// $user->personal_no = 1234;
		// $user->login = 'somelogin';
		// $user->email = 'email@example.com';
		// $user->save();
		// $user->arr = array('a','b','c' );
		//$user->aaa="cccccc*";
		// $user->save();

// 		echo "success";
// $user->addresses[0] = new UserAddress();
// $user->addresses[0]->city = 'New York';

// 		$user = new User();
// $user->address->city = 'New York1';
// $user->address->street = 'Some street name';
 
// // // This will save user to users collection, with UserAddress embedded document set,
// // // and this handle with validation of embedded documents too!
// $user->save(false);
 
// After that:
//$user = User::model()->findByPk(new MongoID("530836d76b9b15d3010041b0"));

$array = array(
    'conditions'=>array(
        // field name => operator definition
        'login'=>array('==' => 'somelogin'), // Or 'FieldName1'=>array('>=' => 10)
        //'address.city'=>array('==','New York1'),
    ),
    'limit'=>10,
    //'select'=>array('login'),
    // 'offset'=>5,
    //'sort'=>array('fieldName1' => EMongoCriteria::SORT_ASC, 'fieldName4' => EMongoCriteria::SORT_DESC),
);
 

// $criteria = new EMongoCriteria($array);
// $criteria->address->city = 'New York1';
// or
$user = User::model()->find();


 echo "<pre>";
 echo count($user);
 var_dump($user);
 echo "</pre>";


// Models will be automatically populated with embedded documents that they contain,
// so we can do:

$collection = User::model()->getCollection()->findOne();

 echo "<pre>";
var_export($collection);
echo "</pre>";
	}
}