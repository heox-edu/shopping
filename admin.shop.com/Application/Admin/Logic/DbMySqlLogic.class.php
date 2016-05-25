<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Logic;

/**
 * Description of DbMySqlLogic
 *
 * @author lenovo
 */
class DbMySqlLogic implements DbMySqlInterface {
    public function connect() {
         echo __METHOD__."</br >";
    }

    public function disconnect() {
         echo __METHOD__."</br >";
    }

    public function free($result) {
         echo __METHOD__."</br >";
    }

    public function getAll($sql, array $args = array()) {
         echo __METHOD__."</br >";
    }

    public function getAssoc($sql, array $args = array()) {
         echo __METHOD__."</br >";
    }

    public function getCol($sql, array $args = array()) {
         echo __METHOD__."</br >";
    }

    public function getOne($sql, array $args = array()) {
        $args = func_get_args();//获取实参列表
        $sql = array_shift($args);//获取第一个参数，sql结构语句
        $perms = $args;//获取字段信息
        $sqls = preg_split("/\?[FTN]/", $sql);//对sql语句进行拆分，形成数组
        array_pop($sqls);//删除多余数组
        $sql = "";//保存sql语句
        //对sql和字段进行拼接
        foreach ($sqls as $key=>$val){
            $sql .=$val . $perms[$key];
        }
        //执行sql
        $rows = M()->query($sql);
        //返回
        if($rows){
            return array_shift($rows);
        }
    }

    public function getRow($sql, array $args = array()) {
        $args = func_get_args();//获取实参列表
        $sql = array_shift($args);//获取第一个参数，sql结构语句
        $perms = $args;//获取字段信息
        $sqls = preg_split("/\?[FTN]/", $sql);//对sql语句进行拆分，形成数组
        array_pop($sqls);//删除多余数组
        $sql = "";//保存sql语句
        //对sql和字段进行拼接
        foreach ($sqls as $key=>$val){
            $sql .=$val . $perms[$key];
        }
        //执行sql
        $rows = M()->query($sql);
        //返回
        if($rows){
            return array_shift($rows);
        }
    }

    public function insert($sql, array $args = array()) {
        $args = func_get_args();//获取实参列表
        $sql = array_shift($args);//获取第一个参数，sql结构语句
        $tablename = $args[0];//获取字段信息
        $perms = $args[1];
//        array_pop($sqls);//删除多余数组
        $sql = str_replace("?T","`".$tablename."`", $sql);
        $field =array();
        foreach ($perms as $key=>$value){
            $field[] = "`".$key."`" . '="' . $value .'"';
        }
        $field_str = implode(",", $field);
        $sql = str_replace("?%", $field_str, $sql);
        $rst =  M()->execute($sql);
        if($rst!==false){
            return M()->getLastInsID($sql);
        }else{
            return false;
        }        
    }

    public function query($sql, array $args = array()) {
        $args = func_get_args();//获取实参列表
        $sql = array_shift($args);//获取第一个参数，sql结构语句
        $perms = $args;//获取字段信息
        $sqls = preg_split("/\?[FTN]/", $sql);//对sql语句进行拆分，形成数组
        array_pop($sqls);//删除多余数组
        $sql = "";//保存sql语句
        //对sql和字段进行拼接
        foreach ($sqls as $key=>$val){
            $sql .=$val . $perms[$key];
        }
        return M()->execute($sql);
    }

    public function update($sql, array $args = array()) {
         
         echo __METHOD__."</br >";
    }

}
