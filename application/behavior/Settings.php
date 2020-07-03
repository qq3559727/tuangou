<?php

namespace app\behavior;

use think\View;
use app\common\model\Settings as settingModel;

class Settings{

    public function run(&$param){

        // 读取配置
        $setting = new settingModel;
        $web_name = $setting->get_setting_value('web_name');
        $seo_description = $setting->get_setting_value('seo_description');
        $seo_keywords = $setting->get_setting_value('seo_keywords');
        $web_icp = $setting->get_setting_value('web_icp');
        $data = [
            'web_name'=>$web_name,
            'seo_description'=>$seo_description,
            'seo_keywords'=>$seo_keywords,
            'web_icp'=>$web_icp
        ];
        View::share($data);

    }
}