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

    /**
     * 获得更新的版本数据
     * @param $versionNo
     */
    public function actionGetVersionData($versionNo) {
        $resultArr = array();
        $resultArr['version'] = $versionNo;
        $result = Version::model()->find();
        if(!empty($result))
        {
           $curv = $result->toArray()['versionNo'];
           if ($curv>$versionNo) {
               $resultArr['version'] = $curv;
               for($index=$versionNo+1;$index<=$curv;$index++) {

               }
           }
        }
    }
}