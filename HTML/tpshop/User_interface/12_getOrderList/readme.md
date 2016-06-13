URL地址
http://127.0.0.1/index.php?m=Api&c=User&a=getOrderList
请求方式
get

user_id
必选
用户id
type
可选
订单类型(见下方说明)

type参数值
WAITPAY => 待支付
WAITSEND => 待发货  
WAITRECEIVE => 待收货 
WAITCCOMMENT =>  待评价 
COMMENTED =>  已评价 
RETURNED =>  已退货
不传递该参数默认查询所有订单数据