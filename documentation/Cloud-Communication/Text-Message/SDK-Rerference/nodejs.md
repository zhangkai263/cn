# 安装 Node.JS 环境

京东云Node.js SDK适用于Node.js 8.6.0及以上，npm 5.6.0及以上。如您已经安装并且满足需求，可跳过此步骤

## 使用 NVM 安装 Node.JS （建议）

[NVM](https://github.com/nvm-sh/nvm) 是一款 Node.JS 的版本管理器，由第三方开源社区提供。NVM 可以在任何 POSIX 兼容的Shell（sh/dash/ksh/zsh/bash）上工作，尤其是在Unix/macOS/Windows Subsystem for Linux平台上。

### 一：安装 NVM

此部分参考 [NVM 的 GitHub 页面](https://github.com/nvm-sh/nvm)，安装方法会因版本迭代等因素发生改变，以 [NVM 的 GitHub 页面](https://github.com/nvm-sh/nvm)中所描述的安装方法为准。

在命令行中输入

```bash
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.35.2/install.sh | bash
```

或

```bash
wget -qO- https://raw.githubusercontent.com/nvm-sh/nvm/v0.35.2/install.sh | bash
```

待步骤执行完成后，根据提示将NVM执行文件添加至您的环境变量中。

请在环境变量配置文件 (`~/.bash_profile`, `~/.zshrc`, `~/.profile`,  `~/.bashrc`)的末尾插入以下内容

```shell
export NVM_DIR="$([ -z "${XDG_CONFIG_HOME-}" ] && printf %s "${HOME}/.nvm" || printf %s "${XDG_CONFIG_HOME}/nvm")"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"
```

### 二：使用NVM安装Node.JS和NPM

在命令行输入以下命令

```shell
nvm install --lts
nvm use --lts
```



## 安装 Node.JS 至系统环境

此部分参考 [Node.JS 官方网站](https://nodejs.org/zh-cn/)。安装方法会因版本迭代等因素发生改变，以 [Node.JS 官方网站](https://nodejs.org/zh-cn/)中所描述的安装方法为准。

### 使用Node.JS官方脚本安装

请确认您的机器可以访问无限制的 Internet，否则脚本可能会因网络连接超时而执行失败。如执行失败，请尝试以下其它方式安装。

```shell
curl -sL https://rpm.nodesource.com/setup_10.x | sudo bash -
```



### 在Ubuntu/Debian上安装Node.JS

Debian用户需要将当前用户切换为root用户，并去掉以下命令中的sudo

```shell
sudo apt-get update
sudo apt-get install nodejs npm
```

### 在CentOS/fedora上安装Node.JS

#### 1.安装EPEL

EPEL（Extra Packages for Enterprise Linux）是适用于CentOS和相关发行版的额外软件包存储库

```bash
sudo yum install epel-release
sudo yum makecache
```

#### 2.安装Node.JS和NPM

在命令行中执行以下命令

```shell
sudo yum install nodejs npm
```

### 使用Node.JS官方构建包（适用于移动终端/嵌入式设备等使用ARM芯片的设备）

下载前请先仔细核对您的ARM芯片版本。您可以通过以下命令来查看您的ARM芯片版本

```shell
cat /proc/cpuinfo
```

以下命令以ARMv7为例

#### 1.下载Linux二进制文件

```shell
wget https://nodejs.org/dist/v12.16.1/node-v12.16.1-linux-armv7l.tar.xz
```

#### 2.解压缩并将执行文件移动到系统目录

```shell
sudo tar --strip-components 1 -xzvf node-v* -C /usr/local
```



# 安装SDK

## 使用npm安装SDK（建议）

在您的工作目录下执行以下操作

```shell
npm install jdcloud-sdk-js --save
```

## 通过下载SDK源码方式使用

您可以通过下载此文件并将其保存至您的工作目录来使用。[下载地址](https://github.com/jdcloud-api/jdcloud-sdk-nodejs/archive/master.zip)。

不推荐使用此方法，在使用此方法时，您还需额外按照SDK依赖才能正常使用，以1.2.65版本jdcloud-sdk为例，依赖及依赖版本参考下表（依赖版本可能会发生变化，此处的版本仅做参考）

| 依赖                 | 依赖版本 |
| -------------------- | -------- |
| ansi-regex           | 2.1.1    |
| ansi-styles          | 2.2.1    |
| babel-code-frame     | 6.26.0   |
| babel-core           | 6.26.3   |
| babel-generator      | 6.26.1   |
| babel-helpers        | 6.24.1   |
| babel-messages       | 6.23.0   |
| babel-register       | 6.26.0   |
| babel-runtime        | 6.26.0   |
| babel-template       | 6.26.0   |
| babel-traverse       | 6.26.0   |
| babel-types          | 6.26.0   |
| babylon              | 6.18.0   |
| balanced-match       | 1.0.0    |
| base64-js            | 1.3.1    |
| brace-expansion      | 1.1.11   |
| buffer               | 5.4.3    |
| chalk                | 1.1.3    |
| cipher-base          | 1.0.4    |
| concat-map           | 0.0.1    |
| convert-source-map   | 1.7.0    |
| core-js              | 2.6.11   |
| create-hash          | 1.2.0    |
| create-hmac          | 1.1.7    |
| debug                | 3.2.6    |
| detect-indent        | 4.0.0    |
| escape-string-regexp | 1.0.5    |
| esutils              | 2.0.3    |
| globals              | 9.18.0   |
| has-ansi             | 2.0.0    |
| hash-base            | 3.0.4    |
| home-or-tmp          | 2.0.0    |
| ieee754              | 1.1.13   |
| inherits             | 2.0.4    |
| invariant            | 2.2.4    |
| is-finite            | 1.1.0    |
| js-tokens            | 3.0.2    |
| jsesc                | 1.3.0    |
| json5                | 0.5.1    |
| lodash               | 4.17.15  |
| loose-envify         | 1.4.0    |
| md5.js               | 1.3.5    |
| minimatch            | 3.0.4    |
| minimist             | 0.0.8    |
| mkdirp               | 0.5.1    |
| ms                   | 2.0.0    |
| node-fetch           | 2.6.0    |
| os-homedir           | 1.0.2    |
| os-tmpdir            | 1.0.2    |
| path-is-absolute     | 1.0.1    |
| private              | 1.0.8    |
| punycode             | 1.3.2    |
| querystring          | 0.2.0    |
| regenerator-runtime  | 0.11.1   |
| repeating            | 2.0.1    |
| ripemd160            | 2.0.2    |
| safe-buffer          | 5.1.2    |
| sha.js               | 2.4.11   |
| slash                | 1.0.0    |
| source-map           | 0.5.7    |
| source-map-support   | 0.4.18   |
| strip-ansi           | 3.0.1    |
| supports-color       | 2.0.0    |
| to-fast-properties   | 1.0.3    |
| trim-right           | 1.0.1    |
| url                  | 0.11.0   |
| uuid                 | 3.4.0    |



# Node.JS代码样例

```javascript
const JDCloud = require('jdcloud-sdk-js');

// 设置AK/SK
JDCloud.config.update({
    accessKeyId: '', // AK
    secretAccessKey: '' // SK
});

// 设置短信参数
const sms = new JDCloud.SMS();
const signId = ''; // 签名ID
const templateId = ''; // 模版ID
const appId = ''; // 应用ID


// 发送短信：以callback方式调用
const batchSendCallback = (phoneList = [], params = []) => {
    sms.batchSend({
        signId, // 签名ID
        templateId, // 模版ID
        phoneList, // 手机号列表
        params, // 短信模版替换参数
    }, 'cn-north-1', (err, res) => {
        if (err) {
            // 调用失败时的报错信息
            console.error(err);
        } else {
            // 调用成功时执行的操作
            console.info(res);
        }
    });
};

// 发送短信：以Promise方式调用
const batchSendPromise = (phoneList = [], params = []) => {
    sms.batchSend({
        signId, // 签名ID
        templateId, // 模版ID
        phoneList, // 手机号列表
        params, // 短信模版替换参数
    }, 'cn-north-1')
        .then(res => {
            // 调用成功时执行的操作
            console.info(res);
        })
        .catch(err => {
            // 调用失败时的报错信息
            console.error(err);
        });
};

// 短信发送回执查询：以callback方式调用
const statusReportCallback = (sequenceNumber, phoneList = []) => {
    sms.statusReport({
        sequenceNumber, // 发送短信的序列号（从发送短信接口的返回值res中获取）
        phoneList, // 需要获取回执的手机号码列表
    }, 'cn-north-1', (err, res) => {
        if (err) {
            // 调用失败时的报错信息
            console.error(err);
        } else {
            // 调用成功时执行的操作
            console.info(res);
        }
    })
};

// 短信发送回执查询：以Promise方式调用
const statusReportPromise = (sequenceNumber, phoneList = []) => {
    sms.statusReport({
        sequenceNumber, // 发送短信的序列号（从发送短信接口的返回值res中获取）
        phoneList, // 需要获取回执的手机号码列表（选填）
    }, 'cn-north-1')
        .then(res => {
            // 调用成功时执行的操作
            console.info(res);
        })
        .catch(err => {
            // 调用失败时的报错信息
            console.error(err);
        });
};

// 短信回复查询：以callback方式调用
const replyCallback = (dataDate, phoneList = []) => {
    sms.reply({
        appId, // 应用ID
        dataDate, // 查询时间：格式xxxx-xx-xx
        phoneList // 需要获取回复的手机号码列表（选填）
    }, 'cn-north-1', (err, res) => {
        if (err) {
            // 调用失败时的报错信息
            console.error(err);
        } else {
            // 调用成功时执行的操作
            console.info(res);
        }
    })
};

// 短信回复查询：以Promise方式调用
const replyPromise = (dataDate, phoneList = []) => {
    sms.reply({
        appId, // 应用ID
        dataDate, // 查询时间：格式xxxx-xx-xx
        phoneList // 需要获取回复的手机号码列表（选填）
    }, 'cn-north-1')
        .then(res => {
            // 调用成功时执行的操作
            console.info(res);
        })
        .catch(err => {
            // 调用失败时的报错信息
            console.error(err);
        });
};
```

