<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin: http://a.com");
// 允许a.com发起的跨域请求
// 如果需要设置允许所有域名发起的跨域请求，可以使用通配符 *
header("Access-Control-Allow-Origin: *");
// 允许任意域名发起的跨域请求
header('Access-Control-Allow-Headers: X-Requested-With,X_Requested_With');
// 网页编码
// header('HTTP/1.1 200 OK');
// // ok 正常访问
// header('HTTP/1.1 404 Not Found');
// //通知浏览器 页面不存在
// header('HTTP/1.1 301 Moved Permanently');
// //设置地址被永久的重定向 301
// header('Location: http://www.ithhc.cn/');
// //跳转到一个新的地址
// header('Refresh: 10; url=http://www.ithhc.cn/');
// //延迟转向 也就是隔几秒跳转
// header('X-Powered-By: PHP/6.0.0');
// //修改 X-Powered-By信息
// header('Content-language: en');
// //文档语言
// header('Content-Length: 1234');
// //设置内容长度
// header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $time) . ' GMT');
// //告诉浏览器最后一次修改时间
// header('HTTP/1.1 304 Not Modified');
// //告诉浏览器文档内容没有发生改变 ###内容类型###
// header('Content-Type: text/plain');
// //纯文本格式
// header('Content-Type: image/jpeg');
// //JPG、JPEG
// header('Content-Type: application/zip');
// // ZIP文件
// header('Content-Type: application/pdf');
// // PDF文件
// header('Content-Type: audio/mpeg');
// // 音频文件
// header('Content-type: text/css');
// //css文件
// header('Content-type: text/javascript');
// //js文件
// header('Content-type: application/json');
// //json
// header('Content-type: application/pdf');
// //pdf
// header('Content-type: text/xml');
// //xml
// header('Content-Type: application/x-shockw**e-flash');
// //Flash动画 ###### ###声明一个下载的文件###
// header('Content-Type: application/octet-stream');
// header('Content-Disposition: attachment; filename="ITblog.zip"');
// header('Content-Transfer-Encoding: binary');
// readfile('test.zip');
// ###### ###对当前文档禁用缓存###
// header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');
// header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
// ###### ###显示一个需要验证的登陆对话框###
// header('HTTP/1.1 401 Unauthorized');
// header('WWW-Authenticate: Basic realm="Top Secret"');
// ###### ###声明一个需要下载的xls文件###
// header('Content-Disposition: attachment; filename=ithhc.xlsx');
// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
// header('Content-Length: ' . filesize('./test.xls'));
// header('Content-Transfer-Encoding: binary');
// header('Cache-Control: must-revalidate');
// header('Pragma: public');
// readfile('./test.xls');
// #####
?>