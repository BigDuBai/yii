<?php

class AdController extends Controller
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
		$array = array(
			'conditions' => array(
				'images.image'=>array('=='=>'001')
			), 
		);
		$result = Ad::model()->find($array);

		if(!empty($result))
		{
			echoToMobile($result->toArray());
		}
	}
}