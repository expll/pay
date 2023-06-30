# pay
```
https://github.com/likeyun/liKeYun_MqPay
https://gitee.com/pp/SmsForwarder/releases
https://www.alipay.com/?from=pc&from=pc&appId=20000123&actionType=scan&biz_data=%7B%22s%22%3A%20%22money%22%2C%22u%22%3A%20%222088912296463051%22%2C%22a%22%3A%20%220.01%22%2C%22m%22%3A%20%22%E5%A4%87%E6%B3%A8%22%7D
https://www.alipay.com/?from=pc&from=pc&appId=10000123&actionType=toAccount&goBack=NO&amount=5.02&userId=2088912296463051&memo=1688139217
```

```
alipays://platformapi/startapp?appId=09999988&actionType=toAccount&goBack=NO&amount=1.00&userId=2088521328947850&memo=QQ_765858558
直接拼接url唤醒app

2.跳转后不可修改金额和备注的方式

function ready(a) {
    window.AlipayJSBridge ? a && a() : document.addEventListener("AlipayJSBridgeReady", a, !1)
}
ready(function() {
    try {
        var a = {
            actionType: "scan",
            u: "2088521328947850",//支付宝用户id
            a: "200",//金额
            m: "qq_765858558",//备注
            biz_data: {
                s: "money",
                u: "2088521328947850",//支付宝用户id
                a: "200",//金额
                m: "qq_765858558"//备注
            }
        }
    } catch (b) {
        returnApp()
    }
    AlipayJSBridge.call("startApp", {
        appId: "20000123",
        param: a
    }, function(a) {})
});
```
