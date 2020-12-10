# 安装Edge系统

Edge系统需要您手动在边缘节点上进行安装和配置。

## 前提条件

- 已经完成新建边缘节点的操作，并下载好配置文件和Edge系统安装包。

  - 如未创建边缘节点，请登录 [物联网智能边缘计算控制台](https://iot-console.jdcloud.com/edge) 创建边缘节点
  - 如未下载Edge系统安装包或者丢失配置信息，请进入 **Edge详情** 重新下载和获取。
  - 边缘节点设备需要一直保持联网状态。

- 已经开通对象存储业务，并创建好一个用于存储边缘计算结果数据的Bucket。如未开通，请先进入[对象存储](https://oss-console.jdcloud.com/)控制台申请开通服务。

  

## 操作步骤

1. 安装Edge系统前，请先安装docker和docker-compose。

   ```
   sudo apt install docker.io
   sudo curl -L "https://github.com/docker/compose/releases/download/1.24.1/docker-compose-$(uname -s)-$(uname -m)" -o    /usr/local/bin/docker-compose
   sudo chmod +x /usr/local/bin/docker-compose
   ```

   将当前用户$USER添加至docker用户组下

   ```
   sudo gpasswd -a $USER docker
   ```

   **注意：完成上述所有步骤后，请重启系统。**

2. 解压缩Edge安装包至任意目录下（${destdir}）

   ```
   tar zxvf jdcloud-iot-edge-install.tar.gz –C ${destdir}
   ```

3. 拷贝边缘节点配置文件**configuration.toml**至安装包解压目录 edge-mgmt-agent/res/ 下

   ```
   cp configuration.toml ${destdir}/edge-mgmt-agent/res/
   ```

4. 进入解压缩后的目录${destdir}，执行安装脚本，完成Edge系统安装。

   ```
   sudo ./install.sh   
   ```

5. 系统安装完成后，您可在物联网智能边缘计算控制台查看到当前边缘节点已经激活并处于在线状态。

## 相关参考

- [创建边缘计算节点](Create-Edgenode.md)
