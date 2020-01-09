## PHP 参考 
**一. 安装PHP环境**  

PHP要求使用 PHP 5.5 及以上版本，如您已经安装且满足需求，可跳过此步骤。  

**Ubuntu/Debian 安装 PHP**  

这里以 Ubuntu 18.04为例。Ubuntu 16.04 需要将以下命令中的 apt 替换为 apt-get。Debian 需先将用户切换至 root 用户，并去掉以下命令中的 sudo。  

```
sudo apt update
sudo apt install php7.0-fpm php7.0-cli php7.0-common php7.0-mbstring php7.0-json php7.0-curl
sudo systemctl enable php7.0-fpm
sudo systemctl start php7.0-fpm
```

**CentOS/RedHut/fedora 安装PHP**  

因 CentOS/RedHut 官方未提供 PHP 5.5 及以上版本支持，故本部分使用的源为第三方源，如遇到无法下载、更新或版本不满足等问题，请尝试编译方式安装 PHP。第三方源中提供的所有内容，与京东云无关。  

**CentOS/RHEL 7.x：**  

```
sudo rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpsudom
sudo rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm
sudo yum makecache
sudo yum install  php70w php70w-fpm php70w-cli php70w-common php70w-devel php70w-mbstring  php70w-json php70w-curl
sudo  systemctl  php-fpm start
```

**CentOS/RHEL 6.x:**  

```
sudo rpm -Uvh https://mirror.webtatic.com/yum/el6/latest.rpm
sudo yum makecache
sudo yum install php70w php70w-fpm php70w-cli php70w-common php70w-devel php70w-mbstring  php70w-json php70w-curl
sudo systemctl php-fpm start
```

**fedora：**  

```
sudo rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm
sudo rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm 
sudo yum makecache
sudo yum install php70w php70w-fpm php70w-cli php70w-common php70w-devel php70w-mbstring  php70w-json php70w-curl
sudo systemctl php-fpm start
```

**源码方式安装**  

以下操作建议使用 root 用户执行，样例以CentOS 7 为例，Ubuntu/Debian 用户请将 yum 替换为 apt。  
1. 下载编译环境依赖  
```
yum install gcc gcc-c++ libxml2-devel wget make openssl openssl-devel curl
```

2. 下载准备 PHP 源码  
这里以 PHP 7.0.33 为例，更多版本可以在 [PHP 官网](https://www.php.net/downloads.php) 查询  
```
# 可以将此链接替换为你所需要的版本
wget https://www.php.net/distributions/php-7.0.33.tar.gz
tar zxvf php-7.0.33.tar.gz
```

3. 编译安装 PHP  
```
cd php-7.0.33
./configure --enable-fpm --enable-json --enable-mbstring --with-openssl
make && make install
```



**二. 安装 SDK 依赖**  
使用Composer.phar安装（建议）  
1. 下载 Composer.phar  
您可以查看 [Composer 官网](https://getcomposer.org/download/) 以获取最新版本的 Composer.phar  
以下为 1.9.1 版本为例  

```
wget https://getcomposer.org/download/1.9.1/composer.phar
chmod a+x composer.phar
```
2. 创建 SDK 依赖文件  
使用编辑器创建名为 composer.json 的文件至当前目录。并输入以下内容  
```
{"require": {
	"php" : ">=5.5",
	"jdcloud-api/jdcloud-sdk-php" : ">=4.0.0"
}}
```  
或直接在您的终端中输入以下内容  
```
cat << _EOF_ >composer.json
{"require": {
	"php" : ">=5.5",
	"jdcloud-api/jdcloud-sdk-php" : ">=4.0.0"
}}
_EOF_
```
3. 安装 SDK  
在当前路径下（请确保与 composer.json 处于同一目录）执行以下命令  
```
php composer.phar install
```
4. 在您的项目中引用 SDK  
在您项目的开头加入以下内容  
```
<?php
	require 'vendor/autoload.php';
	use Jdcloud\Credentials\Credentials;
	use Jdcloud\Result;
	use Jdcloud\Sms\SmsClient;

	...
```

**三. 使用系统 Composer 安装**  
1. 安装 Composer  
以 Ubuntu 18.04 为例，使用前需先安装 Composer  
``` bash
sudo apt install composer
```

2. 创建 SDK 依赖文件  
使用编辑器创建名为 composer.json 的文件至您的项目目录。并输入以下内容  
```
{"require": {
	"php" : ">=5.5",
	"jdcloud-api/jdcloud-sdk-php" : ">=4.0.0"
}}
```  
或直接在您的终端中输入以下内容  
```  
cat << _EOF_ >composer.json
{"require": {
	"php" : ">=5.5",
	"jdcloud-api/jdcloud-sdk-php" : ">=4.0.0"
}}
_EOF_
```  
3. 安装 SDK  
在当前路径下（请确保与 composer.json 处于同一目录）执行以下命令  
```
composer install
```
4. 在您的项目中引用 SDK  
在您项目的开头加入以下内容  
```
<?php
	require 'vendor/autoload.php';
	use Jdcloud\Credentials\Credentials;
	use Jdcloud\Result;
	use Jdcloud\Sms\SmsClient;

	...
```
然后，开始使用吧！  

**四. PHP 代码样例**  

以下样例仅做参考，还需根据您的实际业务场景修改部分代码  

```
<?php
require 'vendor/autoload.php';
useJdcloudCredentialsCredentials;
useJdcloudResult;
useJdcloudSmsSmsClient;

function testSmsBatchSend() {
    $sms = new SmsClient([
        'credentials' => new Credentials('AK', 'SK'),
        'version' => 'latest',
        'scheme' => 'https'
    ]);
    try {
        $res = $sms->batchSend([
            'regionId' => 'cn-north-1',
            'templateId' => '模板id',
            'signId' => '签名Id',
            'phoneList' => ['手机号1', '手机号2'],
            'params' => ['短信模板变量对应的数据值']
        ]);
        print_r($res);
        print ("Request Id: " . $res['requestId'] . "\n");
        print_r($res['result']);
    }
    catch(JdcloudExceptionJdcloudException $e) {
        print ("Detail Message: " . $e->getMessage() . "\n");
        print ("Request Id: " . $e->getJdcloudRequestId() . "\n");
        print ("Error Type: " . $e->getJdcloudErrorType() . "\n");
        print ("Error Code: " . $e->getJdcloudErrorCode() . "\n");
        print ("Error Detail Status: " . $e->getJdcloudErrorStatus() . "\n");
        print ("Error Detail Message: " . $e->getJdcloudErrorMessage() . "\n");
    }
}
$sms = testSmsBatchSend();
?>
```

**五. 其它的使用方法**  

**在本地环境调试您的 PHP 代码**  
在本地环境使用 SDK，您可能需要证书才能完成调试。请修改您的部分代码以启用证书。证书下载地址：https://sms.s3.cn-north-1.jdcloud-oss.com/sms_sdk_example/ca-bundle.crt    

```
...
$sms = new SmsClient([
        'credentials' => new Credentials('AK', 'SK'),
        'version' => 'latest',
        'scheme' => 'https',
    	'http' => ['verify' => 'ca-bundle.crt']
    ]);
...
```

**在没有终端使用权的机器上使用 SDK**  
您可以将以下压缩包中的全部内容上传至您的服务器即可使用。使用前请修改 SmsSdkExample.php 中的内容已满足您的业务需要，并确认您的服务器中 PHP 的版本为 5.5 及以上。  

SDK 数据包下载地址：  
https://sms.s3.cn-north-1.jdcloud-oss.com/sms_sdk_example/smsSdkExample-php.zip  
