<?php

class HomeController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array();
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{

    }

    /**
     * 得到首页推荐
     * TODO 翻页，排序
     *
     */
    public function actionGetHomeInfo($updatetime='0')
    {
        if(isset($_SESSION["local"])) {
            $local = $_SESSION["local"];
        } else {
            $local = "zn";
        }
        if ($local=="zn") {
            $desc_field ='desc_zn';
        } else {
            $desc_field ='desc_en';
        }
        $query = array(
            'conditions' => array(
                'updatetime'=>array('>='=>$updatetime)
            ),
            'select'=>array('channel','image','link',$desc_field,'updatetime'),
            'limit'=>10,
            'order'=>'updatetime desc'
        );

        $result = HomeInfo::model()->findAll($query);
        if(!empty($result)) {
            echoToMobile(ModelConvertUtil::convert($result));
        }
    }

    /**
     * 得到首页广告
     * TODO 排序
     */
    public function actionGetHomeAd()
    {
        $query = array(
            'conditions' => array(
                'channel'=>array('=='=>constant("channel_homepage"))
            ),
            'select'=>array('channel','images.image'=>1,'images.link'=>1,'images.linktype'=>1),
        );
        $result = Ad::model()->find($query);
        if(!empty($result)) {
            echoToMobile(ModelConvertUtil::convert($result->images));
        }
        
    }

    /**
     * 首页搜索
     *
     */
    public function actionSearch($queryKey)
    {
        if(isset($_SESSION["local"])) {
            $local = $_SESSION["local"];
        } else {
            $local = "zn";
        }
        if ($local=="zn") {
            $desc_field ='desc_zn';
            $name_field = 'name_zn';
        } else {
            $desc_field ='desc_en';
            $name_field = 'name_en';
        }
        $query = array(
            'conditions' => array(
                'category'=>array('=='=>$queryKey)
            ),
            'select'=>array('images.image'=>1,'images.link'=>1,$desc_field=>1),
        );

        $result = Ad::model()->find($query);
        if(!empty($result)) {
            echoToMobile($result);
        }
    }

}