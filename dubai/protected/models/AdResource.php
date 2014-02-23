<?php
class AdResource extends EMongoEmbeddedDocument
{
    public $resourceId;
    public $link;
    public $desc;
 
    // We may define rules for embedded document too
    public function rules()
    {
        return array(
            
            // ...
        );
    }
 
    // And attribute names too
    public function attributeNames() { return array(
            "resourceId"=>"resourceId",
            "link"=>"link",
            "desc"=>"desc",
        ); 
    }
 
    // NOTE: for embedded documents we do not define static model method!
    //       we do not define getCollectionName method either.
}