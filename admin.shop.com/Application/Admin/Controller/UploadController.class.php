<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;

/**
 * Description of UploadController
 *
 * @author lenovo
 */
class UploadController extends \Think\Controller {
    //put your code here
    
    public function upload() {
        //文件配置
        $Config = C("UPLOAD_SETTING");
        //实例化上传文件对象
        $Uploads = new \Think\Upload($Config);
        //处理上传的文件
        $file_info = $Uploads->upload($_FILES);
        //获取名字和地址
        if($Config["driver"]== 'Qiniu'){
            $file_url = $file_info["file"]["savepath"] . $file_info["file"]["savename"];
            $file_url = str_replace("/", "_", $file_url);
        }else{
            $file_url = $file_info["file"]["savepath"] . $file_info["file"]["savename"];
        }
        //返回数据给前端处理
        $return = array(
            "status" => $file_info ? 1:0,//上传成功返回一否则0
            "file_url" => $file_url,
//            "url_prefix"=>$config[""]
            "error" => $Uploads->getError(),
            "file_info" => $file_info,
        );
        $this->ajaxReturn($return);
    }
}
