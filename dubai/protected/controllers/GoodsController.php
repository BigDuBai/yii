<?php

class GoodsController extends Controller
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
	public function actionGetBrand()
	{
		$result = Brand::model()->find();

		if(!empty($result))
		{
			echoToMobile($result->toArray());
		}
	}

	public function actionGetCategory()
	{
		$result = Category::model()->find();

		if(!empty($result))
		{
			echoToMobile($result->toArray());
		}
	}

	public function actionFindGoodsByBrand($id)
	{
		$array = array(
			'conditions' => array(
				'brand'=>array('=='=>new MongoID($id))
			), 
		);
		$result = Goods::model()->find($array);

		if(!empty($result))
		{
			echoToMobile($result->toArray());
		}
	}

	public function actionFindGoodsByCategory($category)
	{
		$array = array(
			'conditions' => array(
				'categoryCode'=>array('=='=>$category)
			), 
		);
		$result = Goods::model()->find($array);

		if(!empty($result))
		{
			echoToMobile($result->toArray());
		}
	}
}