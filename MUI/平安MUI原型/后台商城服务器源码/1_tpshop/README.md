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


## 全面的WEB开发特性支持

最新的ThinkPHP为WEB应用开发提供了强有力的支持，这些支持包括：

*  MVC支持-基于多层模型（M）、视图（V）、控制器（C）的设计模式
*  ORM支持-提供了全功能和高性能的ORM支持，支持大部分数据库
*  模板引擎支持-内置了高性能的基于标签库和XML标签的编译型模板引擎
*  RESTFul支持-通过REST控制器扩展提供了RESTFul支持，为你打造全新的URL设计和访问体验
*  云平台支持-提供了对新浪SAE平台和百度BAE平台的强力支持，具备“横跨性”和“平滑性”，支持本地化开发和调试以及部署切换，让你轻松过渡，打造全新的开发体验。
*  CLI支持-支持基于命令行的应用开发
*  RPC支持-提供包括PHPRpc、HProse、jsonRPC和Yar在内远程调用解决方案
*  MongoDb支持-提供NoSQL的支持
*  缓存支持-提供了包括文件、数据库、Memcache、Xcache、Redis等多种类型的缓存支持

## 大道至简的开发理念



## 安全性

框架在系统层面提供了众多的安全特性，确保你的网站和产品安全无忧。这些特性包括：

*  XSS安全防护
*  表单自动验证
*  强制数据类型转换
*  输入数据过滤
*  表单令牌验证
*  防SQL注入
*  图像上传检测

## 商业友好的开源协议
