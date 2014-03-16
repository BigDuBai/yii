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
     * 获得商品分类
     * TODO 查询所有子类，排序
     */
    public function actionGetCategorys($categoryId=NULL)
    {
        $array = array(
            'conditions' => array('parentId'=>array('=='=>$categoryId)),
        );
        $result = Category::model()->findAll();
        if(!empty($result)) {
            echoToMobile(ModelConvertUtil::convert($result));
        }
    }

    /**
     * @param null $brandids 筛选的品牌列表
     * @param null $categoryids 筛选的产品列表
     * @param null $tags 筛选的标签列表
     * @param null $keys 商品关键字（包括名称和描述）
     * @param bool $hot 商品热度排序
     * @param bool $price 商品价格排序
     * @param int $sales 商品销售量排序
     * @param null $position 上次查询的商品ID
     */
    public function actionGetGoods($brandids=NUll,$categoryids=NULL,$tags=NULL,$keys=NULL,$hot=true,$price=true,$sales=true,$position=NULL) {
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
        $array = array(
            //'conditions' => array('parentId'=>array('=='=>$categoryId)),
            'select'=>array($name_field=>1,$desc_field=>1,'icon'=>1,'sales'=>1,'originPrice'=>1),
        );
        $result = Goods::model()->findAll();
        $resultColl = array();
        if (!empty($result)) {
            $goodsArr = $result->toArray();
            for($index=0;$index<) {

            }
            foreach($goodsArr as $key => $value) {
                $resultColl[$key] = $value;
                if (preg_match("/(_zn|_en)/",$key)) {
                    $fields = preg_split("/_/",$key);
                    if ($fields[1]==$local) {
                        $resultColl[$fields[0]] = $value;
                    }
                } else {

                }
            }
        }
        //
    }
}