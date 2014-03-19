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
     * 获得商品评论
     *
     */
    public function actionGetGoodsTalk() {

    }

    /**
     * 添加商品评论
     */
    public function actionAddGoodsTalk() {

    }

    /**
     * 得到商品技术规格
     *
     * @param $id
     */
    public function actionGetGoodsTechnology($id) {
        if(isset($_SESSION["local"])) {
            $local = $_SESSION["local"];
        } else {
            $local = "zn";
        }
        if ($local=="zn") {
            $technology_field='technology_zn';
        } else {
            $technology_field='technology_en';
        }
        $query = array(
            'conditions' => array('_id'=>array('=='=>$id)),
            'select'=>array($technology_field,'_id',),
        );
        $result = Goods::model()->find($query);
        $ra = array();
        if (!empty($result)) {
            $ra['technology'] = $result[$technology_field];
        } else {
            $ra['technology'] = "";
        }
        echoStringToMobile($result);
    }

    /**
     * 得到商品详情
     *
     * @param $id
     */
    public function actionGetGoodsDetail($id) {
        $goodsResult = array();
        if(isset($_SESSION["local"])) {
            $local = $_SESSION["local"];
        } else {
            $local = "zn";
        }
        if ($local=="zn") {
            $desc_field ='desc_zn';
            $name_field = 'name_zn';
            $material_field='material_zn';
            $placeOfOrigin_field='placeOfOrigin_zn';
        } else {
            $desc_field ='desc_en';
            $name_field = 'name_en';
            $material_field='material_en';
            $placeOfOrigin_field='placeOfOrigin_en';
        }
        $mongoid = new MongoId($id);
        $query = array(
            'conditions' => array('_id'=>array('=='=>$mongoid)),
            'select'=>array($name_field,$desc_field,$material_field,$placeOfOrigin_field,'shopimage','shopaddress','originPrice','sales','size','shelfTime','images','_id'),
        );
        $result = Goods::model()->find($query);
        if (!empty($result)) {
            $goodsResult['name'] = $result->toArray()[$name_field];
            $goodsResult['desc'] = $result->toArray()[$desc_field];
            $goodsResult['size'] = $result->toArray()['size'];
            $goodsResult['material'] = $result->toArray()[$material_field];
            $goodsResult['placeOfOrigin'] = $result->toArray()[$placeOfOrigin_field];
            $goodsResult['images'] = $result->toArray()['images'];
            $goodsResult['shelfTime'] = $result->toArray()['shelfTime'];
            $goodsResult['sales'] = $result->toArray()['sales'];
            $goodsResult['size'] = $result->toArray()['size'];
            $goodsResult['shopimage'] = $result->toArray()['shopimage'];
            $goodsResult['shopaddress'] = $result->toArray()['shopaddress'];
            $goodsResult['id'] = (string)$result->toArray()['_id'];
            echoToMobile($goodsResult);
        }
    }

    /**
     * 获得sales信息
     * @param $id 商品ID
     */
    public function actionGetSalesPaid($id) {
        //0表示进行中
        $qauction = array(
            'conditions' => array('goods'=>array('=='=>$id),'$state'=>array('=='=>0)),
        );
        $auctionInfo = GoodsAuctioninfo::model()->find($qauction);
        if (!empty($auctionInfo)) {
            $auctionarray = $auctionInfo->toArray();
            $auctionid = $auctionInfo['_id'];
            $paidquery = array(
                'conditions' => array('goods'=>array('=='=>$id),'$auction'=>array('=='=>$auctionid)),
                'limit'=>3,
                'order'=>'price asc'
            );
            $salespaid = SalesPaid::model()->findAll($paidquery);
            if (!empty($salespaid)) {
                $len = count($salespaid);
                for($index=0;$index<$len;$index++) {
                    $item = array();
                    $item['price'] = $salespaid[$index]['price'];
                    //TODO 获取slales信息
                    $item['sales'] = getSales($salespaid[$index]['sales']);
                }
            }
        }
    }

    /**
     * @param $salesid
     */
    private function getSales($salesid) {
        $query = array(
            'conditions' => array('_id'=>array('=='=>$salesid)),
        );
        $qresult = Sales::model()->find($query);
        $result = array();
        if (!empty($qresult)) {
            $result['sales'] = $qresult->toArray()['nickname'];
            $result['shop'] = $qresult->toArray()['shop'];
            $result['address'] = $qresult->toArray()['address'];
            $result['images'] = $qresult->toArray()['images'];
        }
        return $result;
    }

    /**
     * 获得商品列表
     * @param null $brandids 筛选的品牌列表
     * @param null $categoryids 筛选的产品列表
     * @param null $tags 筛选的标签列表
     * @param null $keys 商品关键字（包括名称和描述）
     * @param bool $hot 商品热度排序
     * @param bool $price 商品价格排序
     * @param int $sales 商品销售量排序
     * @param null $position 上次查询的商品ID
     *
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
        $query = array(
            //'conditions' => array('parentId'=>array('=='=>$categoryId)),
            'select'=>array($name_field,$desc_field,'icon','sales','originPrice','_id'),
        );
        $result = Goods::model()->findAll();
        $resultColl = array();
        if (!empty($result)) {
            $len = count($result);
            for($index=0;$index<$len;$index++) {
                $aitem = array();
                $aitem['name'] = $result[$index][$name_field];
                $aitem['desc'] = $result[$index][$desc_field];
                $aitem['id'] = (string)$result[$index]['_id'];
                $aitem['originPrice'] = $result[$index]['originPrice'];
                $aitem['icon'] = $result[$index]['icon'];
                $aitem['sales'] = $result[$index]['sales'];
                $goodskey = constant('hashkey_goods').$aitem['id'];
                $gfilelds = Yii::app()->redis->HGETALL($goodskey);
                //当前价格
                if(!empty($gfilelds)) {
                    $aitem['curprice'] = $gfilelds[‘curprice’];
                    //销售量
                    $aitem['salesNum'] = $gfilelds[‘salesNum’];
                    //收藏数
                    $aitem['favoritesNum'] = $gfilelds[‘favoritesNum’];
                    //评价
                    $aitem['commentNum'] = $gfilelds[‘commentNum’];
                }
                //添加Redis Cache Key.
                array_push($resultColl,$aitem);
            }
        }
        echoToMobile($resultColl);
    }
}