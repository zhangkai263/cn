# 开始使用

进入[已开通的API产品](https://apigateway-console.jdcloud.com/product)页面

选择将要使用的api，下载sdk和文档

#### 页面调试

1. 点击API分组中的api接口进入到api详情页面，查看api相应信息，如名称、区域、版本号等，分组路径等。
2. 点击API列表中的操作下的调试api，进入到调试页面
3. 输入对应参数，body使用的是json格式，请去掉空格及换行等符号，会影响到验证加密参数
4. 输入您的access key及 secret key，发送请求，进行调用
5. 调用成功后会返回相应的json格式结果



#### sdk调用

1. 下载sdk，导入sdk项目，按照sdk要求，选择线上分组参数
2. 通过genShorturlFromCloudRequest 构建请求，传入GenShorturlFromCloudBody相应的参数
3. 执行调用，成功后会返回genShorturlFromCloudResponse结果