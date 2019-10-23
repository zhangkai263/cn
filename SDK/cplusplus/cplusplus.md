# 京东云 C++ 签名库


## 基本说明
京东云C++签名工具提供了C++语言访问京东云OpenAPI时的请求签名功能，它以AccessKey和SecretKey为素材，将HTTP请求的相关信息经过多次处理，再加上时间和nonce随机值对请求进行签名。使用本签名工具可以节省您编写签名过程的时间，没有正确签名，有可能会造成无法正常访问京东云OpenAPI。使用签名功能，可以保证您的身份不被冒充。请注意AK/SK的安全。

本签名工具使用C++11标准，以静态库的方式提供。使用的大致流程是：
- 将依赖的头文件和静态库通过cmake工具引入您的项目
- 将HTTP请求的信息填充到签名工具的 HttpRequest对象中
- 调用签名接口
- 把返回的HttpRequest对象中Header的Authorization、x-jdcloud-date、x-jdcloud-nonce三项及其值放到您的真实请求Header中
- 然后向京东云OpenAPI网关发起调用

## 安装方法
### Linux (Ubuntu)

```
sudo add-apt-repository ppa:jdcloud/sdk
sudo apt-get update
sudo apt-get install libjdcloud-signer-dev
```

### MacOS

1. 安装 [homebrew](https://brew.sh/index_zh-cn)
2. 运行如下脚本

```sh
brew tap jdcloud-api/tap
# 稳定版
brew install libjdcloud_signer
# git head 版
brew install libjdcloud_signer --HEAD
```

### Windows
1. 安装Visual Stdio 2015以上版本，官方地址为：https://visualstudio.microsoft.com/
2. 安装CMake 3.5以上版本，官方地址为：https://cmake.org/
3. 在下载代码目录中执行`cmake .`
4. 下载openssl库并安装，地址：http://slproweb.com/products/Win32OpenSSL.html
5. 使用Visual Studio打开Demo.sln解决方案，编译。生成路径为：src/Debug。
## 使用方法

* 请参考 [examples](./examples)

### 调用方法

```cpp
// 引用头文件
#include "jdcloud_signer/Credential.h"
#include "jdcloud_signer/JdcloudSigner.h"
#include "jdcloud_signer/http/HttpTypes.h"
#include "jdcloud_signer/http/HttpRequest.h"
#include "jdcloud_signer/logging/Logging.h"
#include "jdcloud_signer/logging/ConsoleLogSystem.h"

using namespace std;
using namespace jdcloud_signer;

// 配置日志
ConsoleLogSystem* cls = new ConsoleLogSystem(LogLevel::Debug);
shared_ptr<ConsoleLogSystem> log(cls);
InitializeLogging(log);

// 创建HttpRequest对象
HttpRequest request(URI("http://www.jdcloud-api.com/v1/regions/cn-north-1/instances?pageNumber=2&pageSize=10"), HttpMethod::HTTP_GET);
request.SetHeaderValue(CONTENT_TYPE_HEADER, "application/json");
request.SetHeaderValue(USER_AGENT_HEADER, "JdcloudSdkCpp/1.0.2 vm/0.7.4");

// 创建签名对象
Credential credential("YOUR AK", "YOUR SK");
JdcloudSigner signer(credential, "vm", "cn-north-1");

// 调用签名方法
bool result = signer.SignRequest(request);
if(result)
{
    // 把Header中的三项 "Authorization、x-jdcloud-date、x-jdcloud-nonce" 放到真正的请求头中
    // 向京东云网关发起HTTP请求
}
else
{
    return;
}
```

## FAQ
### 如何使用 openssl 1.1 编译？

#### Ubuntu 18.04

```
sudo apt install libssl-dev
cmake .
make
sudo make install
```

#### MacOS X

```
brew install openssl@1.1
cmake -DOPENSSL_ROOT_DIR=/usr/local/opt/openssl@1.1/ .
make
sudo make install
```

**注意：**

- 京东云并没有提供其他下载方式，请务必使用上述官方下载方式！

- version 的版本号需要使用京东云产品提供的最新版本号。例如：示例中VM所使用的最新版本号可到官方提供的API  [更新历史](../../API/Virtual-Machines/ChangeLog.md)  中查询到。

- 每支云产品都有自己的Client，当调用该产品API时，需使用该产品的Client。例如：使用云主机的VmClient只能调用云主机（Vm）的接口；使用高可用组的AgClient只能调用高可用组（Ag）的接口。
