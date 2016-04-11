<?php

class DB
{
    /**
     * 外部的特征: 数据
     */
    private $host; //主机
    private $port; //端口
    private $user; //用户
    private $password; //密码
    private $charset; //字符集
    public $dbname; //数据库的名字

    private $link; //连接资源


    private static $instance;

    /**
     * 构造函数来初始化属性值
     */
    private  function __construct($config)
    {
        $this->host = isset($config['host']) ? $config['host'] : '127.0.0.1';
        $this->port = isset($config['port']) ? $config['port'] : 3306;
        $this->user = isset($config['user']) ? $config['user'] : 'root';
        $this->password = isset($config['password']) ? $config['password'] : '';
        $this->charset = isset($config['charset']) ? $config['charset'] : 'utf8';
        $this->dbname = isset($config['dbname']) ? $config['dbname'] : '';

        $this->connect(); //连接数据库
        $this->setCharset(); //设置字符集
        $this->selectDB(); //选择
    }

    /**
     * @param array $config 传入连接数据库的信息
     */
    public static function getInstance($config){
        if(!(self::$instance instanceof self)){
            self::$instance  = new self($config);
        }
        return self::$instance;
    }

    private function __clone(){
        //防止克隆
    }


    /*
     * 内置行为:
     * 连接数据库
     * 设置字符集
     * 选择数据库
     *
     * 执行sql
     *
     * 关闭连接
     */

    /**
     * 连接数据库
     */
    private function connect()
    {
        if (!($this->link = mysql_connect("$this->host:$this->port", $this->user, $this->password))) {
            echo '连接失败!', '<br/>';
            echo '错误代码:' . mysql_errno(), '<br/>';
            echo '错误信息:' . mysql_error(), '<br/>';
            exit;
        }
    }

    /**
     * 设置字符编码
     */
    private function setCharset()
    {
        if ($this->charset == '') { //如果字符集为空, 不设置了
            return;
        }
        //为指定的连接资源设置字符编码
        if (!mysql_set_charset($this->charset, $this->link)) {
            echo '设置编码失败!', '<br/>';
            echo '错误代码:' . mysql_errno($this->link), '<br/>';
            echo '错误信息:' . mysql_error($this->link), '<br/>';
            exit;
        }
    }

    /**
     * 选择数据库
     */
    private function selectDB()
    {
        if ($this->dbname == '') {
            echo '请指定数据库', '<br/>';
            return; //没有返回值的return是用来结束当前方法的执行
        }
        if (!mysql_select_db($this->dbname)) {
            echo '选择数据库可能不存在!', '<br/>';
            echo '错误代码:' . mysql_errno($this->link), '<br/>';
            echo '错误信息:' . mysql_error($this->link), '<br/>';
            exit;
        }
    }

    /**
     * 操作数据库的方法
     */
    /**
     * 让析构函数关闭数据库连接
     */
    public function __destruct()
    {
//        @mysql_close($this->link);
    }

    /**
     * 该方法专门用来执行sql
     * @param $sql  修改类的(insert delete ) 查询类(show,select)
     * @return bool|resource
     * 1. 执行修改类的sql,成功后返回true  失败返回false
     * 2. 执行查询类的sql,成功返回结果资源对象,  失败返回false
     * 3. 没有传入sql,返回false
     */
    public function query($sql){
        //>>1.判断是否为空sql
        if($sql==''){
            echo '请传入具体的sql','<br/>';
            return false;
        }
        //>>2.执行sql
        if(!($result = mysql_query($sql))){
            echo '执行sql错误:','<br/>';
            echo '错误代码:' . mysql_errno($this->link), '<br/>';
            echo '错误信息:' . mysql_error($this->link), '<br/>';
            echo '错误的sql为:',$sql,'<br/>';
            exit;
        }
        //>>3. 返回执行成功的结果
        return $result;
    }

    /**
     * 执行查询sql返回多行数据--二维数组
     * @param $sql  传入查询类的sql
     * @return array|bool 查询出数据返回二维数组,  没有数据返回false
     */
    public function fetchAll($sql){
        //>>1.执行sql返回查询的资源
        $result = $this->query($sql);
        //>>2.准备一个空数组来存放结果集中的记录
        $rows = array();
        //>>3.从$result中解析出数据
        while($row= mysql_fetch_assoc($result)){
            $rows[] = $row;//必须写[],往数组中放$row
        }
        //>>4.释放结果资源
        mysql_free_result($result);
        //>>5.返回二维数组.
        if($rows){ //空数组作为false..
            return $rows;
        }
        //>>6.没有数据就返回false
        return false;
    }

    /**
     * 执行sql查询一行数据:  一维数组
     * @param $sql
     * @return bool
     */
    public function fetchRow($sql){
        //>>1.查询出多行
        $rows = $this->fetchAll($sql);
        //>>2.取出多行中的一行
        if($rows){
            return $rows[0];
        }
        //>>3.如果没有返回false
        return false;
    }

    /**
     * 执行sql,取出第一行第一列的值
     * @param $sql
     * @return bool|mixed  没有返回false,有返回具体的值.
     */
    public function fetchColumn($sql){
        //>>1.执行sql查询出一行数据
        $row = $this->fetchRow($sql); //array('count(*)'=>0);
        if($row){
            return array_shift($row);//取出数组中的第一个值
        }
        return false;
    }

    /**
     * 对象被序列化时自动调用
     */
    public function __sleep(){
        @mysql_close($this->link);
        return array('host','user','password','charset','dbname','port');
    }

    /**
     * 反序列化时自动调用
     */
    public function __wakeup(){
       $this->connect();
    }

    /**
     * 转义方法
     * @param $str
     * @return string
     */
    public function sql_escape_string($str){
        return mysql_real_escape_string($str);
    }
}