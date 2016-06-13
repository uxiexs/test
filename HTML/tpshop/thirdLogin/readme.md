第三方登录
URL地址
http://www.tpshop.com/index.php?m=Api&c=User&a=thirdLogin
请求方式
post
 

openid
必须
第三方唯一标识

from
必须
来源

nickname
可选
第三方返回昵称

head_pic	
可选
头像路径


示例

/**
成功示例
 {
    "status": 1,
    "msg": "登陆成功",
    "result": {
        "user_id": "12",
        "email": "",
        "password": "",
        "sex": "0",
        "birthday": "0000-00-00",
        "user_money": "0.00",
        "frozen_money": "0.00",
        "pay_points": "0",
        "address_id": "0",
        "reg_time": "1452331498",
        "last_login": "0",
        "last_ip": "",
        "qq": "",
        "mobile": "",
        "mobile_validated": "0",
        "oauth": "wx",
        "openid": "2",
        "head_pic": null,
        "province": "0",
        "city": "0",
        "district": "0",
        "email_validated": "0",
        "nickname": ""
    }
} 
 
失败示例
{
    "status": -1,
    "msg": "参数有误",
    "result": ""
}
*/