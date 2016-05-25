<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Model;

/**
 * Description of SupplierModel
 *
 * @author lenovo
 */
class SupplierModel extends \Think\Model {
    //put your code here
    
    /**
     * 获取所有的可用分类列表.
     * @param string $field 字段列表.
     * @return array
     */
    public function getList($field = '*') {
        return $this->field($field)->where(array('status' => 1))->select();
    }
}
