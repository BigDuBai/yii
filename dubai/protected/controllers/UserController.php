<?php

class UserController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$user = new User();
		$user->mobile = Yii::app()->request->getParam('mobile');
		$user->qq = Yii::app()->request->getParam('qq');
		$user->email = Yii::app()->request->getParam('email');
		$user->username = Yii::app()->request->getParam('username');

		if($user->validate())
			$user->save(false);
		else
			echoToMobile();
	}

	public function actionEditUser($id)
	{
		$user = User::model()->findByPk(new MongoID($id));
		$user->email_validate = true;
		$user->update();
	}

	public function actionLogin($username,$password)
	{
		$array = array(
			'conditions' => array(
				'username'=>array('=='=>$username),
				'password'=>array('=='=>$password)
			), 
		);
		$result = User::model()->find($array);

		if(!empty($result))
		{
			$_SESSION['username']=$result->username;
			echoToMobile($result->toArray());
		}


	}
}