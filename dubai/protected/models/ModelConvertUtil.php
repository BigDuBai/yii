<?php
/**
 * Created by PhpStorm.
 * User: wliu
 * Date: 14-3-9
 * Time: 下午12:01
 */

class ModelConvertUtil {
    public static function convert($document = NULL) {
        if(isset($_SESSION["local"])) {
            $local = $_SESSION["local"];
        } else {
            $local = "zn";
        }
        $resultArr = array();
        if($document && is_array($document) || $document && is_object($document)) {
            foreach($document as $key => $value) {
                if($value && is_array($value)) {
                    $resultArr[$key] = ModelConvertUtil::convert($value);
                } else if ($value && is_object($value)) {
                    $resultArr[$key] = ModelConvertUtil::convert($value);
                } else if (preg_match("/(_zn|_en)/",$key)) {
                    $fields = preg_split("/_/",$key);
                    if ($fields[1]==$local) {
                        $resultArr[$fields[0]] = $value;
                    }
                    Yii::trace("key=".$key."value=".$value);
                } else  {

                    Yii::trace("key=".$key."value=".$value);
                    $resultArr[$key] = $value;
                }
            }
        }
        return $resultArr;
    }
} 