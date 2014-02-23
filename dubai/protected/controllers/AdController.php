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
		$result = Ad::model()->find();

		if(!empty($result))
		{
			echoToMobile($result->toArray());
		}
	}
}