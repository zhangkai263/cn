# 实例元数据

实例元数据是云主机实例的基本信息，包括实例id、内/外网IP地址等。您可以在云主机内通过访问元数据服务来查看该实例的元数据，以便于针对某些元数据进行实例内部的配置或与外部应用的连接。

获取元数据必须先登录实例，随后从实例内部访问获取。关于登录实例操作请参考 登录Linux实例 和 登录Windows实例。

在实例内获取元数据不需要对安全组或网络ACL做任何调整，只要有登录实例的权限，均可获取元数据。另外，如果您在实例内部修改了部分属性，如密码、密钥和hostname，这部分变更不会更新到元数据，可能导致查询结果与实际数据不一致的情况。

## 元数据信息
京东智联云现支持以下实例元数据查询：


## 查看元数据
元数据访问地址：`http://169.254.169.254/metadata/latest/ `,元数据具有目录层级，以"目录名"+"/"结尾时，将返回该目录所包含的下级元数据。
比如直接

### Linux系统

1、登录实例，方法参见[登录Linux实例](https://docs.jdcloud.com/virtual-machines/connect-to-linux-instance)。
2、在系统内获取元数据根目录：
```
curl http://169.254.169.254/jcs-metadata/latest/
```
将以以下形式返回：
```
["attributes/","disks/","network/","placement/","image/","description","instance-name","instance-type","instance-id","pin"]
```
3、参照【元数据信息】，根据目录结构指定元数据查询：
* 获取实例的hostname：
```
curl http://169.254.169.254/metadata/latest/attributes/hostname
```
* 获取实例的ID：
```
curl http://169.254.169.254/metadata/latest/instance-id
```

### Windows系统

1、登录实例，方法参见[登录Windows实例]((https://docs.jdcloud.com/virtual-machines/connect-to-linux-instance)。
2、在系统内获取元数据根目录（使用Powershell）：
```
Invoke-RestMethod http://169.254.169.254/metadata/latest/
```
3、参照【元数据信息】，根据目录结构指定元数据查询：
* 获取实例的镜像ID：
```
Invoke-RestMethod http://169.254.169.254/metadata/latest/image/image-id
```
* 获取实例网卡的内网IPv4地址（{serial-no}为网卡索引序号，主网卡填写“0”，以此类推）：
```
Invoke-RestMethod http://169.254.169.254/metadata/latest/network/{serial-no}/local-ipv4
```

