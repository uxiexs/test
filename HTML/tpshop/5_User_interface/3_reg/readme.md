注册
URL地址
http://www.tpshop.com/index.php?m=Api&c=User&a=reg
请求方式
post
 

username
必须
手机端必须手机号注册

password
必须
密码

password2
必须
确认密码

code	可选
手机短信验证码

unique_id	可选
手机唯一标识

当后台注册 开启手机短信码验证时  code  和 unique_id 不得为空
msg.jpg

/**
成功示例
{
    "status":1,
    "msg":"注册成功",
    "result":{
       "user_id": "13",
       "email": "",
       "password": "e10adc3949ba59abbe56e057f20f883e",
       "sex": "0",
       "birthday": "0000-00-00",
       "user_money": "0.00",
        "frozen_money":"0.00",
       "pay_points": "0",
       "address_id": "0",
       "reg_time": "1452333288",
       "last_login": "0",
       "last_ip": "",
        "qq":"",
       "mobile": "13800138071",
       "mobile_validated": "0",
        "oauth":"",
       "openid": null,
       "head_pic": null,
       "province": "0",
       "city": "0",
       "district": "0",
       "email_validated": "0",
       "nickname": null
    }
}
失败示例
{
    "status": -1,
    "msg": "账号已存在",
    "result": ""
}
*/