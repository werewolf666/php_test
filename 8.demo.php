<?php //defined('SYSPATH') or die('No direct script access.');
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 18-12-17
 * Time: 下午2:38
 */
$arr = array(
    'ordersn' => '0123456789',//$orderSn,
    'productname' =>'智游宝测试',// $info['title'],
    'price' => '0.1',//$info['price'],
    'usedate' => '2018-12-26',//$usetime,
    'dingnum' => '2',//$dingNum,
    'linkman' =>'黔趣玩',// $linkMan,
    'linktel' => '13123673117',//$linkTel,
    'addtime' => time()
);

    $xmlMsg ="
    <PWBRequest>
        <transactionName>SEND_CODE_REQ</transactionName>
        <header>
            <application>SendCode</application>
            <requestTime>$date("Y-m-d", $arr['addtime'])</requestTime>
        </header>
        <identityInfo>
            <corpCode>TESTFX</corpCode>
            <userName>qqw</userName>
        </identityInfo>
        <orderRequest>
            <order>
                <certificateNo></certificateNo>
                <linkName><?php $arr['linkman']?></linkName>
                <linkMobile><?php $arr['linktel']?></linkMobile>
                <orderCode><?php $arr['ordersn']?></orderCode>
                <orderPrice><?php  $arr['price']*$arr['dingnum']?></orderPrice>
                <payMethod>vm</payMethod>
                <scenicOrders>
                    <scenicOrder>
                        <orderCode><?php $arr['ordersn'].'z'?></orderCode>
                        <price><?php $arr['price']?></price>
                        <quantity><?php $arr['dingnum']?></quantity>
                        <totalPrice><?php $arr['price']*$arr['dingnum']?></totalPrice>
                        <occDate><?php $arr['usedate']?></occDate>
                        <goodsCode>PST20180111016903</goodsCode>
                        <goodsName><?php $arr['productname']?></goodsName>
                    </scenicOrder>
                </scenicOrders>
            </order>
        </orderRequest>
    </PWBRequest>";

$key=md5("xmlMsg=".$xmlMsg.",TESTFX");

$n="xmlMsg=".$xmlMsg;
$new=$n.",&sign=".$key;

/*发送xml*/
Function Sendxml($url,$new)
{
    $ch = curl_init();
    $header = "Content-type: text/xml; charset=utf-8";
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$new);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, $header);
    $result = curl_exec($ch);
    print_r($result);
    curl_close($ch);
}
$url = "http://zyb-zff.sendinfo.com.cn/boss/service/code.htm";

echo $xmlMsg;

$res = Sendxml($url,$new);

print_r($res);

?>
<?//xml version="1.0" encoding="UTF-8"?>
<!--<PWBResponse>-->
<!--    <transactionName>SEND_CODE_RES</transactionName>-->
<!--    <code>0</code>-->
<!--    <description>成功</description>-->
<!--    <orderResponse>-->
<!--        <order>-->
<!--            <certificateNo></certificateNo>-->
<!--            <linkName>张小形</linkName>-->
<!--            <linkMobile>18256931141</linkMobile>-->
<!--            <orderCode>20181226000007928914</orderCode>-->
<!--            <orderPrice>0.62</orderPrice>-->
<!--            <payMethod>third_vm</payMethod>-->
<!--            <assistCheckNo>201966549</assistCheckNo>-->
<!--            <src>interface</src>-->
<!--            <scenicOrders>-->
<!--                <scenicOrder>-->
<!--                    <orderCode>9999999999999990</orderCode>-->
<!--                    <totalPrice>0.60</totalPrice>-->
<!--                    <price>0.30</price>-->
<!--                    <quantity>2</quantity>-->
<!--                    <occDate>2019-01-06 00:00:00</occDate>-->
<!--                    <goodsCode>PST20180111016903</goodsCode>-->
<!--                    <goodsName>旅游测试票1</goodsName>-->
<!--                </scenicOrder>-->
<!--            </scenicOrders>-->
<!--        </order>-->
<!--    </orderResponse>-->
<!--</PWBResponse>-->