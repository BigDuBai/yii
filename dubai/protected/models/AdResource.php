<?php
class AdResource extends EMongoEmbeddedDocument
{
    public $image;
    public $link;
    public $desc;
    public $desc_en;
    public $desc_zn;
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
            "image"=>"image",
            "link"=>"link",
            "desc_zn"=>"desc_zn",
            "desc_en"=>"desc_en",
        );
    }


    // NOTE: for embedded documents we do not define static model method!
    //       we do not define getCollectionName method either.
}