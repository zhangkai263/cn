# 实例元数据

实例元数据是云主机实例的基本信息，包括实例id、内/外网IP地址等。您可以在云主机内通过访问元数据服务来查看该实例的元数据，以便于针对某些元数据进行实例内部的配置或与外部应用的连接。

获取元数据必须先登录实例，随后从实例内部访问获取。关于登录实例操作请参考 [登录Linux实例](https://docs.jdcloud.com/virtual-machines/connect-to-linux-instance) 和 [登录Windows实例](https://docs.jdcloud.com/virtual-machines/connect-to-windows-instance)。

在实例内获取元数据不需要对安全组或网络ACL做任何调整，只要有登录实例的权限，均可获取元数据。另外，如果您在实例内部修改了部分属性，如密码、密钥和hostname，这部分变更不会更新到元数据，可能导致查询结果与实际数据不一致的情况。

## 元数据信息
京东云现支持以下实例元数据查询：
| 元数据项                 | 说明                 | 返回示例  |
| :------------------- | :-------------------|:-----------------|
| pin |实例所属用户pin|"abcdabdc"|
| instance-id  |  实例ID| "i-abcdefg123" |
| instance-type| 实例规格| "g.n3.large" |
| instance-name |实例名称| "jdcloud-instance" |
| description | 实例描述 | "京东云云主机" |
| attributes/ssh-keys | 实例绑定的密钥公钥 | "c3NoLXJzYSBBQUFBQ...p2aXJ0"|
| attributes/activation/KMS| KMS服务器地址，仅windows返回 | "169.254.169.250:1688" |
| attributes/hostname | 实例hostname | "jdcloud-server.internal" |
| placement/region | 实例所属地域 | "cn-north-1" |
| placement/availability-zone | 实例所属可用区 | "cn-north-1c"|
| image/image-id | 创建实例使用的镜像ID | "img-ix4782iy3c" |
| image/os-type | 实例操作系统类型 | "linux" |
| network/[serial-no]/| 实例网卡[serial-no]的属性目录，[serial-no]为网卡相对索引，从1开始（主网卡为1） |["local-ipv4","floating-ipv4","mac","network-interface-id","subnet-id","security-group-ids"]
| network/[serial-no]/local-ipv4 | 实例网卡[serial-no]的内网IPv4地址 | "10.0.128.6"
| network/[serial-no]/floating-ipv4 | 实例网卡[serial-no]的弹性公网IPv4地址 | "11x.xx.xx.xx"
| network/[serial-no]/mac | 实例网卡[serial-no]的mac地址 | "02:29:96:8f:xx:xx"
| network/[serial-no]/network-interface-id| 实例网卡[serial-no]的ID | 	"port-a2uvxxxxxx"
| network/[serial-no]/subnet-id| 实例网卡[serial-no]所属的子网ID|"subnet-1vfnyxxxxx"
| network/[serial-no]/security-group-ids| 实例网卡[serial-no]所绑定的安全组 | ["sg-wx0ivnxxxx","sg-jh8ebvxxxx"]
| attributes/customdata/userdata/launch-script | 用户自定义启动脚本，base64后结果 |"IyEvYmluL2Jhc2gKZWNobyAnaGVsbG8n"
| attributes/customdata/custom-metadata/[key]| 用户自定义元数据[key]对应的value值|


## 查看元数据
元数据访问地址：`http://169.254.169.254/metadata/latest/ `,元数据具有目录层级，以"目录名"+"/"结尾时，将返回该目录所包含的下级元数据项。

### Linux系统

1. 在系统内获取元数据根目录：
    ```Shell
    curl http://169.254.169.254/metadata/latest/
    ```
    将以以下形式返回：
    ```
    ["attributes/","network/","placement/","image/","description","instance-name","instance-type","instance-id","pin"]
    ```
2. 参照【元数据信息】，根据目录结构指定元数据查询：<br>
  * 获取实例的hostname：
    ```Shell
    curl http://169.254.169.254/metadata/latest/attributes/hostname
    ```
  * 获取实例的ID：
    ```Shell
    curl http://169.254.169.254/metadata/latest/instance-id
    ```

### Windows系统

1. 在系统内获取元数据根目录（使用Powershell）：<br>
    ```
    Invoke-RestMethod http://169.254.169.254/metadata/latest/
    ```
    将以以下形式返回：
    ```
    attributes/
    network/
    placement/
    image/
    description
    instance-name
    instance-type
    instance-id
    pin
    ```

2. 参照**元数据信息**，根据目录结构指定元数据查询：<br>
  * 获取实例的镜像ID：
    ```
    Invoke-RestMethod http://169.254.169.254/metadata/latest/image/image-id
    ```
  * 获取实例主网卡的内网IPv4地址（网卡索引从1开始，主网卡填写“1”，以此类推）：
    ```
    Invoke-RestMethod http://169.254.169.254/metadata/latest/network/1/local-ipv4
    ```

