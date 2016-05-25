<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Model;

/**
 * Description of GoodsCategoryModel
 *
 * @author lenovo
 */
class GoodsCategoryModel extends \Think\Model {
    
    /**
     * 获取所有的可用分类列表.
     * @param string $field 字段列表.
     * @return array
     */
    public function getList($field = '*') {
        return $this->field($field)->where(array('status' => 1))->order('lft asc')->select();
    }
    
    public function addCategory(){
        $request_data = $this->data;
        $mysql_Db = new \Admin\Logic\DbMySqlLogic();
        $NestedSets = new \Admin\Service\NestedSets($mysql_Db,  $this->trueTableName, "lft", "rght", "parent_id", "id", "level");
        return $NestedSets->insert($request_data["parent_id"], $request_data, "bottom");        
    }
}
