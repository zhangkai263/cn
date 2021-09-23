# 网络性能测试

## 概述

本文主要介绍vpc内的网络性能测试的方法，您可根据测试后的数据判断网络性能。网络性能受多种因素的影响，例如：实例的物理距离、云主机的性能、操作系统参数等，请结合实际情况判断

## 操作步骤

#### 搭建测试环境

|参数|服务器|客户端|
|----|----|----|
|镜像|CentOS 7.4 64 位|CentOS 7.4 64 位|
|规格|g.n4.4xlarge|g.n4.4xlarge|
|数量|1|1|
|IP地址|10.0.0.1|10.0.0.2|


#### 部署测试工具

> **注：** 在测试环境搭建和测试时都需要保证自己拥有 root 用户权限。

##### 安装iperf3

按以下步骤在服务器和客户端上安装iperf3工具。

1. 依次执行以下命令，下载iperf3。

   ```
   yum install git -y
   git clone https://github.com/esnet/iperf
   ```

2. 依次执行以下命令，安装iperf3。

   ```
   cd iperf
   ./configure && make && make install && cd ..
   cd src
   ADD_PATH="$(pwd)"
   PATH="${APP_PATH}:${PATH}"
   export PATH
   ```

3. 执行`iperf3 -h`命令，确认安装成功。

### UDP 网络性能测试

推荐使用两台相同配置的云服务器进行测试，避免性能测试结果出现偏差。其中一台云服务器作为服务端，另一台云服务器作为客户端。本示例中指定10.0.0.1与10.0.0.2进行测试。

#### 服务端

执行以下命令：

```
iperf -s
```

#### 客户端端

执行以下命令，其中 `${网卡队列数目}` 可通过 `ethtool -l eth0` 命令获取。

```
iperf -c ${服务器IP地址} -b 2048M -t 300 -P ${网卡队列数目}
```

例如，服务器端的 IP 地址为10.0.0.1，该 **-b** 参数将带宽从 [UDP 默认值的每秒 1 Mb](https://iperf.fr/iperf-doc.php#doc) 更改为 2048M ，网卡队列数目为8，则在客户端执行以下命令：

```
iperf -c 10.0.0.1 -b 2048M -t 300 -P 8
```

输出显示了间隔（时间）、传输的数据量、实现的带宽、抖动（数据报周期性到达的时间偏差）以及丢失/总 UDP 数据报数：

```plainText
------------------------------------------------------------------------------------
Client connecting to 10.0.0.1, UDP port 5001
Sending 1470 byte datagrams, IPG target: 2.35 us (kalman adjust)
UDP buffer size: 208 KByte (default)
------------------------------------------------------------------------------------
[ 41] local 10.0.0.2 port 49244 connected with 10.0.0.1 port 5001
[ 39] local 10.0.0.2 port 44429 connected with 10.0.0.1 port 5001
[ 40] local 10.0.0.2 port 43990 connected with 10.0.0.1 port 5001
[ 5] local 10.0.0.2 port 58342 connected with 10.0.0.1 port 5001
[ 32] local 10.0.0.2 port 34897 connected with 10.0.0.1 port 5001
[ 43] local 10.0.0.2 port 38864 connected with 10.0.0.1 port 5001
...
[SUM] 0.0-10.0 sec 106 GBytes 90.7 Gbits/sec
[SUM] Sent 77152959 datagrams
...
[ 19] Server Report:
[ 19] 0.0-10.2 sec 1.36 GBytes 1.14 Gbits/sec 15.614 ms 307228/1303368 (24%)
[ 19] 0.00-10.25 sec 18 datagrams received out-of-order
[ 17] Server Report:
[ 17] 0.0-10.2 sec 1.85 GBytes 1.55 Gbits/sec 15.423 ms 1155619/2510063 (46%)
[ 17] 0.00-10.25 sec 31 datagrams received out-of-order
```

### TCP 网络性能测试

推荐使用两台相同配置的云服务器进行测试。其中10.0.0.1为服务端，10.0.0.2作为客户端。

#### 服务端

为服务器配置默认端口

```
 sudo iperf -s [-p 5001]
```

#### 客户端

执行以下命令：

```
./netperf -H <服务端内网IP地址> -l 300 -t TCP_RR -- -r 1,1 &
```


例如，服务端内网 IP 地址为10.0.0.1，则执行以下命令：

```
 iperf -c 10.0.0.1 --parallel 40 -i 1 -t 2
```

使用这些指定的 iperf 参数，输出将显示每个客户端流的间隔、每个客户端流传输的数据以及每个客户端流使用的带宽。以下 iperf 输出显示了两个实例的测试结果。在所有连接之间传输的总带宽为 92.2 Gb/秒：

```plainText
------------------------------------------------------------------------------------
Client connecting to 10.0.0.1, TCP port 5001
TCP window size: 715 KByte (default)
------------------------------------------------------------------------------------
[ 39] local 10.0.0.2 port 54666 connected with 10.0.0.1 port 5001
[ 41] local 10.0.0.2 port 54670 connected with 10.0.0.1 port 5001
[ 33] local 10.0.0.2 port 54660 connected with 10.0.0.1 port 5001
[ 42] local 10.0.0.2 port 54672 connected with 10.0.0.1 port 5001
[ 38] local 10.0.0.2 port 54664 connected with 10.0.0.1 port 5001
[ 5] local 10.0.0.2 port 54598 connected with 10.0.0.1 port 5001
...
[SUM] 0.0- 2.0 sec 21.5 GBytes 92.2 Gbits/sec
```
