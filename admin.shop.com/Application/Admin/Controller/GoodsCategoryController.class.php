<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;

/**
 * Description of GoodCategoryController
 *
 * @author lenovo
 */
class GoodsCategoryController extends \Think\Controller {
    //put your code here
    /**
     * 存储模型对象.
     * @var \Admin\Model\GoodsCategory 
     */
    private $_model = null;
    
    //标题的显示
    protected function _initialize() {
        $meta_titles = array(
            'index'  => '商品分类管理',
            'add'    => '添加商品分类',
            'edit'   => '修改商品分类',
        );
        $meta_title  = $meta_titles[ACTION_NAME];
        $this->assign('meta_title', $meta_title);
        $this->_model = D('GoodsCategory');
    }
    
    /**
     * 这是显示列表
     */
    public function index(){
        $rows = $this->_model->getList();
//        dump($rows);exit;
        $this->assign("rows",$rows);
        $this->display();
    }
    
    /**
     * 添加商品列表
     */
    public function add(){
       //判断是否提交
        if(IS_POST){
            if($this->_model->create()===false){
                $this->error(get_error($this->_model->getError()));
            }
            if($this->_model->addCategory()===false){
                $this->error(get_error($this->_model->getError()));
            }else{
                $this->success("添加商品成功",U("index"));
            }
       } else {
           $this->_before_view();
           $this->display();
       }
    }
    
    public function edit($id){
        //判断是否提交
        if(IS_POST){
            
        }else{
            $row = $this->_model->find($id);
            $this->assign("row",$row);
            $this->_before_view();
            $this->display("add");
        }
    }


    private function _before_view(){
        $categories = $this->_model->getList("id,name,parent_id");
        array_unshift($categories,array('id'=>0,'name'=>"顶级分类",'parent_id'=>0));
//        dump($categories);exit();
        $this->assign("categories", json_encode($categories));
    }
    
}
