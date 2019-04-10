<?php
/**
 * Created by PhpStorm.
 * User: zhangsanfeng
 * Date: 2019/4/10
 * Time: 22:19
 */

namespace app\index\controller;


use QL\QueryList;

class Phpquery
{
    public function index()
    {
        //采集某页面所有的图片
        $testUrl = 'http://cms.querylist.cc/bizhi/453.html';
        $data = QueryList::get($testUrl)->find('img')->attrs('src');
        //打印结果
        print_r($data->all());
    }
}