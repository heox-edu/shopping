<?php
define("DOMAIN", "http://admin.shop.com");
return array(
     /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'xiangmu',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '123456',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数    
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  false,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'        =>  0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'        =>  false,       // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM'         =>  1, // 读写分离后 主服务器数量
    'DB_SLAVE_NO'           =>  '', // 指定从服务器序号
    'URL_MODEL'=>2,
    
    //模板替换
    'TMPL_PARSE_STRING'=>array(
        "__CSS__"=>DOMAIN."/Public/Css",
        "__JS__"=>DOMAIN."/Public/Js",
        "__IMG__"=>DOMAIN."/Public/Images",
        "__UPLOADIFY__"=>DOMAIN."/Public/Ext/uploadify",
        "__LAYER__" => DOMAIN."/Public/Ext/layer",
        '__ZTREE__' => DOMAIN.'/Public/Ext/zTree',
        '__ZTREEGRIE__' => DOMAIN.'/Public/Ext/ztreegrid',
        '__UPLOAD_URL_PREFIX__'   => 'http://7xsvze.com1.z0.glb.clouddn.com',
    ),
    
    //上传文件配置
    'UPLOAD_SETTING'=>array(
        //            'mimes'         =>  array(), //允许上传的文件MiMe类型
            'maxSize'       =>  0, //上传的文件大小限制 (0-不做限制)
            'exts'          =>  array('jpg', 'png', 'gif', 'jpeg'), //允许上传的文件后缀
            'autoSub'       =>  true, //自动子目录保存文件
            'subName'       =>  array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
            'rootPath'      =>  './Uploads/', //保存根路径
            'savePath'      =>  '', //保存路径
            'saveName'      =>  array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
            'saveExt'       =>  '', //文件保存后缀，空则使用原后缀
            'replace'       =>  false, //存在同名是否覆盖
            'hash'          =>  true, //是否生成hash编码
            'callback'      =>  false, //检测文件是否存在回调，如果存在返回文件信息数组
            'driver'        =>  'Qiniu', // 文件上传驱动
            'driverConfig'  =>  array(
                'secretKey'      => 'QB8U_tOo13YzxM7iazpEFDxIB5vcPoVNauDN54Vp', //七牛服务器
                'accessKey'      => 'Iacb6Azz5Yh0kLNp7Ng2OD_cD8tjCuXM6dZydAl9', //七牛用户
                'domain'         => '7xsvze.com1.z0.glb.clouddn.com', //七牛域名
                'bucket'         => 'heophp', //空间名称
                'timeout'        => 300, //超时时间
            ), // 上传驱动配置
    ),
);