## 性能测试步骤
通过Elasticsearch官方提供的geonames（大小为3.3G, 总计11396505 个doc），以及benchmark rally脚本，我们对华北-北京区域的京东云搜索Elasticsearch（V6.7.0）进行了压测，针对不同的[云搜索Elasticsearch规格](https://docs.jdcloud.com/cn/jcs-for-elasticsearch/specifications)，集群性能不同。


## 测试环境
- 所有测试均在华北-北京，可用区A完成
- 测试用的云主机规格：8C 32GB
- 测试用的云主机镜像：CentOS 7.4 64位
- 测试用的Elasticsearch版本：V6.7.0

## 测试工具
### rally
[rally](https://github.com/elastic/rally) 是 elastic 官方开源的一款基于 python3 实现的针对 es 的压测工具。rally主要功能如下：</br>
- 自动创建、压测和销毁 ES 集群</br>
- 可分ES版本管理压测数据和方案</br>
- 完善的压测数据展示，支持不同压测之间的数据对比分析，也可以将数据存储到指定的ES中进行二次分析</br>
- 支持收集 JVM 详细信息，比如内存、GC等数据来定位性能问题</br>

## 安装rally

### 前提条件
- Python3.5及以上版本
- git1.9及以上版本
- JDK 1.8以上版本
- 安装Python3.7

### 安装Python3.7

**步骤一**:安装开发者工具

```
yum -y groupinstall "Development Tools"
```

**步骤二**:安装Python编译依赖包

```
yum -y install openssl-devel zlib-devel bzip2-devel sqlite-devel readline-devel libffi-devel systemtap-sdt-devel
```

**步骤三**:下载安装包

```
wget https://www.python.org/ftp/python/3.7.0/Python-3.7.0.tgz
```

**步骤四**: 解压安装

```
tar zvxf Python-3.7.0.tgz -C /usr/local/

cd Python-3.7.0

./configure --prefix=/usr/local/python3.7

make

make install
```

**步骤五**:创建软链接文件到执行文件路径

```
ln -s /usr/local/python3.7/bin/python3 /usr/bin/python3

ln -s /usr/local/python3.7/bin/pip3 /usr/bin/pip3
```

**步骤六**:配置环境变量

/etc/pfofile 文件中加入以下两个环境变量：

```
export PYTHON37_HOME=/usr/local/python3.7

export PATH=${PYTHON37_HOME}/bin:${PATH}
```

执行 source /etc/pfofile

**步骤七**:验证是否安装成功

```
python3 --version
```


### 安装git2.5.5

**步骤一**:卸载低版本git

```
yum remove git
```

**步骤二**:安装相关依赖


```
yum install curl-devel expat-devel gettext-devel openssl-devel zlib-devel asciidoc

yum install gcc perl-ExtUtils-MakeMaker
```

**步骤三**:下载git 2.5.5

```
wget https://mirrors.edge.kernel.org/pub/software/scm/git/git-2.5.5.tar.gz
```

**步骤四**:解压安装

```
tar -xzvf git-2.5.5.tar.gz

cd git-2.5.5

./configure --prefix=/usr/local/git --with-openssl=/usr/local/openssl

make && make install
```

**步骤五**:配置环境变量

/etc/pfofile 文件中加入以下两个环境变量

```
export GIT_HOME=/usr/local/git/bin

export PATH=$PATH:$GIT_HOME
```

执行 source /etc/pfofile

**步骤六**:查看git版本

```
git --version
```


### 安装JDK1.8

```
yum install java-1.8.0-openjdk* -y
```



### 安装esrally工具

```
pip3 install esrally==1.0.0  //官方文档 https://esrally.readthedocs.io/en/stable/install.html

esrally configure    //官方详细配置 https://esrally.readthedocs.io/en/stable/configuration.html
```


## 测试命令

```
#test mode
esrally --test-mode --target-hosts=es-nlb-XXX.jvessel-open-hb.jdcloud.com:9200 --pipeline=benchmark-only
 
#geonames
esrally  --track=geonames --target-hosts=es-nlb-XXX.jvessel-open-hb.jdcloud.com:9200  --pipeline=benchmark-only
```
