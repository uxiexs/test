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
            $db = initDB(); //初始化数据库
            $row = $db->fetchRow($sql); //执
            if($row){
                 //>>5.查询该位置附近的 关键字信息
                $content = $simpleXML->Content;  //得到xml中的文本内容. 需要到百度中搜索
                $content  = urlencode($content); //urlencode ---  URL编码字符串将所有非字母字元的字符串除了-_.之外，以百分比符号(%)后跟随二个迷惑的数字的方式表示，而空白则会被编码成正的(+)符号。
                $url = "http://api.map.baidu.com/place/v2/search?ak=9Z8fX6rd9De8PgXAUYCyHc56&output=xml&query={$content}&page_size=10&page_num=0&scope=1&location={$row['x']},{$row['y']}&radius=2000";
                $baiduSimpleXML = simplexml_load_file($url);
                $rows = array();
                /**
                <PlaceSearchResponse>
                <status>0</status>
                <message>ok</message>
                <total>18</total>
                <results>
                <result>
                <name>正宗常德津市牛肉粉</name>
                <location>
                <lat>28.206676</lat>
                <lng>112.931192</lng>
                </location>
                <address>长沙市岳麓区</address>
                <detail>1</detail>
                <uid>8bb4ecac9e653cab14b54bdc</uid>
                </result>
                 */
                foreach($baiduSimpleXML->results->result as $item){ //从XML中遍历的数据
                    $row = array();                  //申明一个数组 用于存放XML中遍历的数据
                    $row['name'] = $item->name;      //poi名称
                    $row['address'] = $item->address;//poi地址信息
                    $row['uid'] = $item->uid;        //poi的唯一标示
                    $row['x'] = $item->location->lat;//纬度值
                    $row['y'] = $item->location->lng;//经度值
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