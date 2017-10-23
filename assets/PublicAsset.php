<?php
/**
 * Created by PhpStorm.
 * User: Артем
 * Date: 23.10.2017
 * Time: 0:29
 */

namespace app\assets;


use yii\web\AssetBundle;

class PublicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "public/css/main.min.css",
    ];
    public $js = [
        "public/js/common.js",
        "public/js/jquery.min.js",
    ];
    public $depends = [

    ];
}