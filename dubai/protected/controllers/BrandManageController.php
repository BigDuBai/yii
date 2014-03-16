<?php

class BrandManageController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
		);
	}

    public function actionAdd()
    {
        $brand = new Brand();
        $brand->name_zn = $_POST["name_zn"];
        $brand->name_en = $_POST["name_en"];
        $brand->code = $_POST["code"];
        $brand->desc_en = $_POST["desc_en"];
        $brand->desc_zn = $_POST["desc_zn"];
        $brand->thumb = $_POST["thumb"];
        $brand->image = $_POST["rel_image"];
        $brand->website = $_POST["website"];
        $brand->firstChart = $_POST["first_char"];
        $brand->spell = $_POST["spell"];
        
        $brand->save(false);   
    }


    /**
     * 获得版本信息
     */
    public function actionGetList($iDisplayStart=0,$iDisplayLength=10)
    {
        $resultColumn = array('name_zn','code','thumb');
        $query = array(
            'conditions' => array(
               // 'channel'=>array('=='=>constant("channel_homepage"))
            ),
            'select'=>$resultColumn,
            'limit'=>10,
            'offset'=>0,
        );

        $result = Brand::model()->findAll($query);

      
        $records = array();
        $records["aaData"] = array(); 

        if(!empty($result))
            foreach ($result as $key => $value) {
            $tmp = array();
            $value->_id = (string)$value->_id;
            foreach ($value as $key1=>$value1) {
                if(in_array($key1, $resultColumn))
                {
                    if($key1=='thumb')
                        array_push($tmp, "<img src='/dubai/files/{$value1}' class='img-thumnail' alrt=''>");
                    else
                        array_push($tmp, $value1);
                }
            }
            array_push($tmp, '<a href="javascript:;" data-id="'.$value->_id.'" class="btn btn-xs red btn-removable"><i class="fa fa-times"></i> Delete</a> ');
            array_push($records["aaData"], $tmp);
        }

        $records["iTotalRecords"] = Brand::model()->count();
        $records["iTotalDisplayRecords"] = Brand::model()->count();
  
        echo json_encode($records);
    }

    public function actionDelete($id)
    {
        Brand::model()->deleteByPk(new MongoId($id));
    }
}