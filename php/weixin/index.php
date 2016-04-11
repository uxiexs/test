<?php
//>>1. 接收微信服公众平台发送过来的信息
  $requestContent =  file_get_contents('php://input');
   file_put_contents('./requestContent.txt',$requestContent);
//>>2.从接收到的xml中解析出我们需要的内容(如果是位置信息,要将该位置保存到数据表中)
    $simpleXML = simplexml_load_string($requestContent);
    var_dump($simpleXML);
    $ToUserName = $simpleXML->ToUserName;     //微信开发公众号
    $FromUserName = $simpleXML->FromUserName; //普通的用户的微信
    $MsgType = $simpleXML->MsgType;           //接收到的数据类型
    if($MsgType=='location'){                 //位置信息,该信息需要保存到数据表中
        $x = $simpleXML->Location_X;          //经度
        $y = $simpleXML->Location_Y;          //维度
        $Scale = $simpleXML->Scale;           //缩放大小
        $CreateTime = $simpleXML->CreateTime; //创建时间
        $Label = $simpleXML->Label;
        $sql  =  "insert into location values(null,'$FromUserName',$x,$y,$Scale,'$Label',$CreateTime)";
         file_put_contents('./sql.txt',$sql);  //
        $db = initDB();
        $db->query($sql);

        //>>3. 向普通的微信用户发送一个文本信息,  告诉他输入的位置以及提示: 请输入关键字

        $time = time();
        $content = "你的位置是[{$Label}],请输入关键字进行搜索!";
        require  './responseText.xml';
    }elseif($MsgType=='text'){
            //>>4.如果是文本信息,需要查找该用户的位置,   如果查找到位置, 就需要进行搜索(到百度).   如果没有找到,就提示一个文本信息,告知用户请先输入位置
            $sql = "select * from location where username  = '$FromUserName' limit 1";
            file_put_contents('./sql.txt',$sql);  //
            $db = initDB();
            $row = $db->fetchRow($sql);
            if($row){
                 //>>5.查询该位置附近的 关键字信息
                $content = $simpleXML->Content;  //得到xml中的文本内容. 需要到百度中搜索
                $content  = urlencode($content);
                $url = "http://api.map.baidu.com/place/v2/search?ak=9Z8fX6rd9De8PgXAUYCyHc56&output=xml&query={$content}&page_size=10&page_num=0&scope=1&location={$row['x']},{$row['y']}&radius=2000";
                $baiduSimpleXML = simplexml_load_file($url);
                $rows = array();
                foreach($baiduSimpleXML->results->result as $result){
                    $row = array();
                    $row['name'] = $result->name;
                    $row['address'] = $result->address;
                    $row['uid'] = $result->uid;
                    $row['x'] = $result->location->lat;
                    $row['y'] = $result->location->lng;
                    $rows[] = $row;
                }
                $time = time();
                ob_start();
                require './responseImg.xml';
                file_put_contents('./response.txt',ob_get_contents());  //把发送给微信服务器的xml拦截下来保存到txt文件中

            }else{
                 //>>6.没有查询到该用户的位置信息
                $time = time();
                $content = "请先发送位置信息!才能够进行搜索! ";
                require  './responseText.xml';
            }
    }




/**
 * 获取db对象
 * @return DB
 */
function initDB(){
    require './DB.class.php';
    $db = DB::getInstance(array('dbname'=>'test','password'=>''));
    return $db;
}