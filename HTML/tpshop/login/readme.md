用户登录
URL地址
http://www.tpshop.com/index.php?m=Api&c=User&a=login
请求方式
post
 
username
必须
用户名

password
必须
密码

unique_id	必选	手机端唯一标识 类似web pc端sessionid

成功示例
 
 {
    "status": 1,
    "msg": "登陆成功",
    "result": {
        "user_id": "1",
        "email": "398145059@qq.com",
        "password": "e10adc3949ba59abbe56e057f20f883e",
        "sex": "1",
        "birthday": "2015-12-30",
        "user_money": "9999.39",
        "frozen_money": "0.00",
        "pay_points": "5281",
        "address_id": "3",
        "reg_time": "1245048540",
        "last_login": "1444134213",
        "last_ip": "127.0.0.1",
        "qq": "3981450598",
        "mobile": "13800138000",
        "mobile_validated": "0",
        "oauth": "",
        "openid": null,
        "head_pic": "/Public/upload/head_pic/2015/12-28/56812d56854d0.jpg",
        "province": "19",
        "city": "236",
        "district": "2339",
        "email_validated": "1",
        "nickname": "的广泛地"
    }
}
失败示例
{
    "status": -1,
    "msg": "请填写账号或密码",
    "result": ""
}
*/