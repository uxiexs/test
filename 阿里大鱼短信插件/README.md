## 修改步骤
1.绑定Mobile模块
Application\Common\Conf\config.php
'DEFAULT_MODULE'        =>  'Mobile',  // 默认模块

2.Mobile模块 收藏方法缺失（这是手机版无法收藏的解决方法）
Home/GoodsCtroller.class.php/collect_goods方法复制到Mobile/GoodsCtroller.class.php

3.短信模块
路径：F:\wamp64\www\1_tpshop\Application\Home\Logic\UsersLogic.class.php
修改send_validate_code方法/sms_log方法 共三处
sendSMS()内参数 你的验证码为.$code 改为$code

4.修改短信发送方法 sendSMS
路径：F:\wamp64\www\1_tpshop\Application\Common\Common\common.php 254行
添加阿里大鱼（短信）插件至 Vendor目录
路径：F:\wamp64\www\1_tpshop\ThinkPHP\Library\Vendor

5.开启短信验证机制
路径：F:\wamp64\www\1_tpshop\Application\Mobile\Controller\UserController.class.php 142行

6.后台短信配置页面
路径:\wamp64\www\1_tpshop\Application\Admin\View\System\sms.html

7.将当前session_id保存为常量供调用
   $this->session_id = session_id(); // 当前的 session_id
   define('SESSION_ID',$this->session_id); //将当前的session_id保存为常量，供其它方法调用
路径：F:\wamp64\www\1_tpshop\Application\Mobile\Controller\MobileBaseController.class.php

8.最后就是去后台页面配置了 我的是127.0.0.1/admin
网站设置-网站设置-短信设置
配置 阿里大鱼的 key  secritkey  产品名（这个随便填）
