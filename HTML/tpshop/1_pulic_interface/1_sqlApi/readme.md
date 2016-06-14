sql万能接口
使用接口必须开启签名，并且保证签名秘钥不被反编译泄露
URL地址
http://www.tpshop.com/index.php?m=Api&c=Base&a=sqlApi
请求方式
post
 
sql
必须
Mysql Sql语句

/**
注意: 此接口必须开启 签名验证 , 签名请查看签名接口示例说明
Sql 示例  select* from tp_goods limit 1
Sql 示例2  updatetp_goods set goods_name = 'a' where goods_id =10000
(写入操作需谨慎不要误批量删表数据, 误批量修改数据)
失败示例
{
    "status": -1,
    "msg": "系统错误",
    "result": ""
}
成功示例
{
   "status": 1,
   "msg": "成功!",
   "result":  这里不固定值如果是写入操作,返回影响行数, 如果是查询操作返回查询结果集
         
*/