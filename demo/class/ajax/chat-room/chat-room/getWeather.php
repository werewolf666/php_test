<?php
header("Content-type:text/html;charset=utf-8");
/**
 * 获取天气
 */
echo file_get_contents('http://www.weather.com.cn/data/sk/101020200.html');