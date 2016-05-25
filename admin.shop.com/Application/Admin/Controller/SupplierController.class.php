<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;

/**
 * Description of SupplierController
 *
 * @author lenovo
 */
class SupplierController extends \Think\Controller {
    
    //put your code here
    /**
     * 存储模型对象.
     * @var \Admin\Model\SupplierModel 
     */
    private $_model = null;
    
    //标题的显示
    protected function _initialize() {
        $meta_titles = array(
            'index'  => '供货商管理',
            'add'    => '添加供货商',
            'edit'   => '修改供货商',
            'delete' => '删除供货商',
        );
        $meta_title  = $meta_titles[ACTION_NAME];
        $this->assign('meta_title', $meta_title);
        $this->_model = D('Supplier');
    }
    
    /**
     * 这是显示页面
     */
    public function index(){        
        $rows = $this->_model->getList();
        $this->assign("rows",$rows);
        $this->display();
    }
    
    //添加商品列表
    public function add() {
        //判断是否提交
        if(IS_POST){
            //判断收集数据成功没有
            if($this->_model->create()===false){
                $this->error(get_error($this->_model->getError()));                
            }
            if($this->_model->add()===false){
                $this->error(get_error($this->_model->getError()));
            }else{
                $this->success("添加成功",U("index"));
            }
        }else{
            //显示页面
            $this->display();
        }
    }
    
    //这是修改列表
    public function edit($id){
        if(IS_POST){
            //判断收集数据成功没有
            if($this->_model->create()===false){
                $this->error(get_error($this->_model->getError()));                
            }
            if($this->_model->save($id)===false){
                $this->error(get_error($this->_model->getError()));
            }else{
                $this->success("添加成功",U("index"));
            }
        }  else {
            $row = $this->_model->find($id);
            $this->assign("row",$row);
             //显示页面
            $this->display("add");
        }
    }
    
    //这是删除方法
    public function delete($id){
        //删除条件
        $data = array(
            "status"=>-1,
            'name'=>array('exp',"CONCAT(name,'_del')"),//
        );
        //删除的供货商名字后添加_del后缀标识
        if($this->_model->where(array('id'=>$id))->setField($data)===false){
            $this->error(get_error($this->_model->getError()));
        }else{
            $this->success('删除成功');
        }
    }
}
