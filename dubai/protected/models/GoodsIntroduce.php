<?php
/**
 * Created by PhpStorm.
 * User: wliu
 * Date: 14-3-18
 * Time: 上午10:42
 */

class GoodsIntroduce extends EMongoEmbeddedDocument {
    //材质
    public $material_en;
    public $material_zn;
    //原产地
    public $placeOfOrigin_en;
    public $placeOfOrigin_zn;

    // We may define rules for embedded document too
    public function rules()
    {
        return array(

            // ...
        );
    }


    // And attribute names too
    public function attributeNames() {
        return array(
            "material_en"=>"material_en",
            "material_zn"=>"material_zn",
            "placeOfOrigin_en"=>"placeOfOrigin_en",
            "placeOfOrigin_zn"=>"placeOfOrigin_zn",
        );
    }
} 