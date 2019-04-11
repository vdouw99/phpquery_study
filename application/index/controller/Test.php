<?php
/**
 * Created by PhpStorm.
 * User: zhangsanfeng
 * Date: 2019/4/10
 * Time: 22:19
 */

namespace app\index\controller;

use QL\QueryList;

libxml_use_internal_errors(true);  //enable user error handling

class Test
{
    public function index()
    {
        //采集某页面所有的图片
        $testUrl = 'http://cms.querylist.cc/bizhi/453.html';
        $data = QueryList::get($testUrl)->find('img')->attrs('src');
        //打印结果
        print_r($data->all());
    }

    public function getListByVdouwMoban()
    {
        $url = 'http://www.vdouw.com/moban/';
        $rules = ['title' => ['.v.mobanAlert', 'title'], 'image' => ['img.img', 'src']];
        $range = 'ul.index.list li';  //切片选择器
        $rt = QueryList::get($url)->rules($rules)->range($range)->query()->getData();
        //print_r($rt->all());
        $result = $rt->all();
        foreach ($result as $key => $value) {
            echo($value['title'] . " -》" . $value['image'] . "<br>");
        }
    }
}