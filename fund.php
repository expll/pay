






<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <script src="https://cdn.staticfile.org/jquery/3.3.1/jquery.min.js"></script>
    <link href="/pay-api/assets/css/pay.css" rel="stylesheet" type="text/css">
</head>
<style type="text/css">
    html,
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    .demo {
        margin: 1em 0;
        padding: 1em 1em 2em;
        background: #fff;
    }
    

    .demo h1 {
        padding-left: 8px;
        font-size: 24px;
        line-height: 1.2;
        border-left: 3px solid #108EE9;
    }

    .demo h1,
    .demo p {
        margin: 1em 0;
    }

    .demo .am-button+.am-button,
    .demo .btn+.btn,
    .demo .btn:first-child {
        margin-top: 10px;
    }

    .fn-hide {
        display: none !important;
    }

    input {
        display: block;
        padding: 4px 10px;
        margin: 10px 0;
        line-height: 28px;
        width: 100%;
        box-sizing: border-box;
    }
</style>
<body>
    <div class="aui-free-head 333333" style="background:#fff;padding-top:50px;">
        <div class="aui-flex b-line" style="padding-bottom:0;">
            <div class="aui-user-img">
                <img src="/pay-api/assets/images/alipaylogo.png" style="width:80px;height:80px;">
            </div>
            <div class="aui-flex-box">
                <h5 id="zzz" style="font-size:1.2rem;">支付成功、自动到账。</h5>
            </div>
        </div>
        <div id="xxx" class="aui-flex aui-flex-text" style="padding-top:0;">
            <div class="aui-flex-box" style="margin-left:0;">
                <h2 style="font-size:2rem;color:#333">充值订单号</h2>
                <!-- <h3 style="color:red;" id="order_id">100.00</h3> -->
                <p style="color:#333;font-size:1rem;" id="order_id_item"></p>
            </div>
        </div>
        <div id="yyy">
            <button
                style="width:80%;background: #eace99;border-radius:10px;color:#000;font-size:1.9rem;display:block;margin: 0 auto;border: none;padding:0.8rem 0;box-shadow:0 1px 15px #f0c677;"
                onclick="repay()"><div id="payHtml">授权中<span id="Time">3</span>秒后进入付款</div></button>
        </div>
    </div>
</body>

<script>

    function getQueryVariable(variable) {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            if (pair[0] == variable) { return pair[1]; }
        }
        return (false);
    }

</script>

<script>
    function ready(callback) {
        if (window.AlipayJSBridge) {
            callback && callback();
        } else {
            document.addEventListener('AlipayJSBridgeReady', callback, false);
        }
    }
    
    var order_id = "NO2307010007530936";
    ready(function () {
        //副标题文字
        AlipayJSBridge.call('setTitle', {
            title: '自助充值'
        });
        AlipayJSBridge.call('setOptionMenu', {
            icontype: 'filter',
        });
        AlipayJSBridge.call('showOptionMenu');

        document.addEventListener('optionMenu', function (e) {
            AlipayJSBridge.call('showPopMenu', {
                menus: [],
            }, function (e) {
                console.log(e);
            });
        }, false);

        $("#order_id_item").text("订单号：" + order_id)
    });


    function pay() {
        let orderDate = "alipay_root_cert_sn=687b59193f3f462dd5336e5abf83c5d8_02941eef3187dddf3d3b83462e1dfcf6&alipay_sdk=alipay-sdk-java-4.35.101.ALL&app_cert_sn=bf6df078c3670c22793da2374d1952ee&app_id=2021002156667126&biz_content=%7B%22biz_scene%22%3A%22PERSONAL_PAY%22%2C%22business_params%22%3A%22%7B%5C%22payer_binded_alipay_uid%5C%22%3A%5C%222088442911823451%5C%22%2C%5C%22payee_show_name%5C%22%3A%5C%2220230701000753628%5C%22%2C%5C%22sub_biz_scene%5C%22%3A%5C%22REDPACKET%5C%22%7D%22%2C%22order_title%22%3A%22%E6%94%AF%E4%BB%98%E5%AE%9D%E5%95%86%E5%9F%8E%22%2C%22out_biz_no%22%3A%22NO2307010007530936%22%2C%22product_code%22%3A%22STD_RED_PACKET%22%2C%22refund_time_expire%22%3A%222023-07-01+12%3A07%22%2C%22remark%22%3A%22%E6%94%AF%E4%BB%98%E5%AE%9D%E5%95%86%E5%9F%8E%22%2C%22request_time%22%3A%222023-07-01+00%3A07%22%2C%22time_expire%22%3A%222023-07-01+00%3A12%22%2C%22trans_amount%22%3A%22200.00%22%7D&charset=UTF-8&format=json&method=alipay.fund.trans.app.pay&sign=Wn1gwglTqy%2BQEAfAR4uRiS2bFhaq8G0OCCVXlVjkIaBUkfJKcGLlOER3ogNnkZubgDft4YyW5kwqY9b0g%2BotXcqGdVzSpVhYSesk%2FlIPcgUZ6EVz6W2JIgVdx9bXTNqdP6NJlXg3vzJBi4SQGxpOib5xs6BbeoZwdCBvkWSL9SYM90uX1y4trU1F1xXglXS9mCAaKer%2Fr%2Bru%2BCl%2BcEX6f4MbdPfQE3B7gso%2BP0tdzvvh%2Bg3ICoiMKdVsICdMLv3nA%2FHjCXXPVWQ1V%2BLhEE%2BlkMH4rWOt2XRqtxYPmGO3XbVq7uz7eyL6NSWkWPDLSx1qiBepqFPOW2HvtyI%2BlBdusg%3D%3D&sign_type=RSA2&timestamp=2023-07-01+00%3A07%3A53&version=1.0";
        AlipayJSBridge.call('tradePay', {   
            orderStr: orderDate,  
        },  
        function (result) {
            if("9000"== result.resultCode){
                location.reload();
            }else if("8000"== result.resultCode){
                alert("正在处理中");
             }else if("4000"== result.resultCode){
                 alert("订单支付失败");
             }else if("6001"== result.resultCode){
                alert("用户中途取消");
             }else if("6002"== result.resultCode){
                alert("网路连接错误");
            }else{
                alert("未知错误");
            } 
        }); 

    }

    function repay() {
    	pay();
    }
    
    function countDown() {
        //获取初始时间
        var time = document.getElementById("Time");
        //获取到id为time标签中的数字时间
        if (time.innerHTML == 0) {
            //等于0时清除计时，并跳转该指定页面
            //window.location.href = "https://www.baidu.com";
            pay();

            window.clearInterval(countTime);
            $("#payHtml").html("点击再次支付");
        } else {
            time.innerHTML = time.innerHTML - 1;
        }
    }

    var countTime = window.setInterval("countDown()", 1000);

</script>


</html>
