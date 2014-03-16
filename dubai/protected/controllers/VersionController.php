<?php

class VersionController extends Controller
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
     * 获得版本信息
     */
    public function actionGetVersion()
    {
        $result = Version::model()->find();
        if(!empty($result))
        {
            echoStringToMobile($result->toArray()['versionNo']);
        }
    }
}