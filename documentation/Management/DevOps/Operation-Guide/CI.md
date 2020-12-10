# 编译构建


DevOps编译构建为开发者提供基于容器的自动化持续集成服务。支持多语言构建环境，自动/手动触发任务，查看构建结果及日志。

点击菜单栏中的“持续交付”，进入“编译构建”。

**编译构建**

左侧选中服务树中某应用，点击右侧的“新增构建”。填写代码库地址等信息，保存后进入编译构建列表，点击“立即构建”，可进行编译构建操作。构建成功即可在 模块—查看版本，看到已编译构建的模块版本。

- Git代码地址：填写代码库地址，命名规范如下： group名需>两个字符 命名规范为小写字母+数字+下划线+中划线（大写字母会自动转为小写字母），不支持/等特殊字符
- 代码分支：选择需要编译的代码分支
- 模块名：根据代码地址自动生成，模块名用于关联“编译构建”与“线上发布”
- 构建镜像：选择编译环境，目前支持Java、golang、node、static_resource等不同语言的多个版本的编译环境。支持自定义编译环境，详见镜像广场
- 编译依赖：可添加编译依赖
- 构建方式：支持build.sh和makefile两种方式。构建脚本放在代码根目录，详见 编译构建-规范
- 构建参数：填写构建过程中，需要的参数
- 触发条件：手动构建，或提交代码到分支时自动触发编译构建
- 构建类型：代码包
- 版本规则：提供版本命名规则，可在模块-->查看版本
- 缓存编译工作区：是否缓存工作区，对于多次编译构建，可加速编译过程
- 构建上传位置（多选）：为加速“线上发布”获取编译结果的速度，可根据云主机所在地域，选择构建包上传位置 

高级选项：
- 开启LFS：应对代码库中的大文件
- webhook地址：可填写需要触发的notification
- 邮件通知：可填写邮箱地址
- 通知频率：可设置通知频率为构建异常发送或每次构建都发送


可以选择某模块，查看构建job

![Alt text](https://github.com/jdcloudcom/cn/blob/DevOps/image/DevOps/Operation15.png)

在构建历史页，可查看构建详情及日志

![Alt text](https://github.com/jdcloudcom/cn/blob/DevOps/image/DevOps/Operation16.png)


**模块**

在模块分页中，查看编译的模块及版本详情。支持上传编译好的包（依然要符合编译构建规范）到模块中，用于后续的线上发布。

![Alt text](https://github.com/jdcloudcom/cn/blob/DevOps/image/DevOps/Operation17.png)

点击“查看版本”

![Alt text](https://github.com/jdcloudcom/cn/blob/DevOps/image/DevOps/Operation18.png)


**规范**

1.在代码库的根目录增加编译脚本build.sh

创建build.sh，需满足编译产出在同级目录output/下，build.sh中接收不同的模块名称作为参数。

编译后的产出物放在output中，output中的所有内容表示后续要上线用到的包。

示例代码如下：
```
#以golang为例，需要在代码库的根路径增加编译脚本，示例build.sh如下：
#!/bin/bash
#编译脚本的原理是将编译结果放到output目录中，这个样例模版提供一个产生一个最基本golang运行程序包的编译脚本，对于特殊的需求请酌情考虑
#
#1、该脚本支持参数化，参数将传入build_package函数（内容为最终执行的编译命令）
#   ，用$1,$2....表示，第1,2...个参数
#2、部署需要启动程序，所以需要提供control文件放在当前目录中，用于启动和
#   监控程序状态
#用户修改部分
readonly PACKAGE_DIR_NAME=""    #main文件相对于src文件夹所在的目录,可选项
readonly PACKAGE_BIN_NAME=""    #定义产出的运行程序名,必填项
readonly CONF_DIR_NAME=""       #定义配置文件目录,此路径为相对路径,可选项
#最终的抽包路径为$OUTPUT
if [[ "${PACKAGE_BIN_NAME}" == "" ]];then
    echo "Please set "PACKAGE_BIN_NAME" value"
    exit 1
fi
function set_work_dir
{
    readonly OUTPUT=$(pwd)/output
    readonly WORKSPACE_DIR=$(pwd)
}
#清理编译构建目录操作
function clean_before_build
{
    cd ${WORKSPACE_DIR}
    rm -rf bin pkg
    rm -rf ${OUTPUT}
}
#实际的编译命令
#这个函数中可使用$1,$2...获取第1,2...个参数
function build_package()
{
    cd ${WORKSPACE_DIR}
    export GOPATH=$(pwd)
    go install ${PACKAGE_DIR_NAME} || return 1
}
#建立最终发布的目录
function build_dir
{
    mkdir -p ${OUTPUT}/bin || return 1
}
function dir_not_empty()
{
    if [[ ! -d $1 ]];then
        return 1
    fi
    if [[ $(ls $1|wc -l) -eq 0 ]];then
        return 1
    fi
    return 0
}
#拷贝编译结果到发布的目录
function copy_result
{
    cd ${WORKSPACE_DIR}
    cp -r ./bin/${PACKAGE_BIN_NAME} ${OUTPUT}/bin/${PACKAGE_BIN_NAME} || return 1
    cp -r ./control ${OUTPUT}/bin || return 1
    (dir_not_empty ${WORKSPACE_DIR}/${CONF_DIR_NAME} && mkdir -p ${OUTPUT}/${CONF_DIR_NAME};cp -rf ./${CONF_DIR_NAME}/* ${OUTPUT}/${CONF_DIR_NAME}/);return 0
}
#执行
function main()
{
    cd $(dirname $0)
    set_work_dir
    echo "At: "$(date "+%Y-%m-%d %H:%M:%S") 'Cleaning...'
    clean_before_build || exit 1
    echo "At: "$(date "+%Y-%m-%d %H:%M:%S") 'Clean completed'
    echo
    echo "At: "$(date "+%Y-%m-%d %H:%M:%S") 'Building...'
    build_package $@ || exit 1
    echo "At: "$(date "+%Y-%m-%d %H:%M:%S") 'Build completed'
    echo
    echo "At: "$(date "+%Y-%m-%d %H:%M:%S") 'Making dir...'
    build_dir || exit 1
    echo "At: "$(date "+%Y-%m-%d %H:%M:%S") 'Make completed'
    echo
    echo "At: "$(date "+%Y-%m-%d %H:%M:%S") 'Copy result to publish dir...'
    copy_result || exit 1
    echo "At: "$(date "+%Y-%m-%d %H:%M:%S") 'Copy completed'
    echo
    exit 0
}
main $@
```

2.在output中有 bin/control，用来启动、停止、服务健康检查。以下是control脚本模板文件，可在其基础上进行修改/扩展使用。

部署路径默认为/export/Instances/应用名/实例名/runtime下

在执行control的时候，会自动加载在线上发布->分组 分页中，配置的配置文件及环境变量，不会加载待部署主机上的bashrc、profile文件

在主机中调试control，可直接在部署路径下，执行 bin/control start

启动命令需使用nohup后台执行，并且为避免内存被打满，建议将日志重定向到默认log路径，即../log/

伪代码如下：
```
a. 控制程序启动的相关操作 start 
source env.sh 
nohup command  > /dev/null 2>&1 &
check status
b.控制程序停止的相关操作stop 
find pid by port or process name 
kill  pid
check status
c.检查程序是否启动/停止的相关操作，间隔10s调用 status 
check port
check process name
check url
```

示例代码如下:
```
#!/bin/bash
cd "$(dirname $0)"/.. || exit 1
PROC_NAME=confcenter # 进程名 一般就是二进制的名字java类程序一般就是java
START_COMMAND='bin/confcenter' #在output目录下启动你程序的命令
PROC_PORT=8055 # 程序占用的端口，建议写，程序不占用端口的话只用ps来判断进程是否启动，机器上有同名程序是可能有问题
WAIT_TIME=60 # 执行START_COMMAND后到程序能完全启动listen端口需要花的时间
  
PROC_NAME=${PROC_NAME::15}
if [ -f default_env.sh ];then
    source default_env.sh
fi
help(){
    echo "${0} <start|stop|restart|status>"
    exit 1
}
  
checkhealth(){
    if [[ -n "$PROC_PORT" ]] ; then
        PORT_PROC=$(/usr/sbin/ss -nltp "( sport = :$PROC_PORT )" |sed 1d |awk '{print $NF}' |grep -oP '".*"' |sed "s/\"//g" |uniq)
        if [ X"$PORT_PROC" = X"$PROC_NAME" ] ; then
                echo "running"
            return 0
        fi
        echo "not running"
        return 1
   else
       ps -eo comm,pid |grep -P  "^$PROC_NAME"
       if [ "$?" = 0 ] ; then
       echo "running"
           return 0
       fi
       echo "not running"
       return 1
   fi
}
  
start(){
    checkhealth
    if [ $? = 0 ]; then
        echo "[WARN] $PROC_NAME is aleady running!"
        return 0
    fi
    mkdir -p log
  
    nohup $START_COMMAND  </dev/null &>> /dev/termination-log  &
  
  
    for i in $(seq $WAIT_TIME) ; do
        sleep 1
        checkhealth
        if [ $? = 0 ]; then
            echo "Start $PROC_NAME success"
            return 0
        fi
    done
    echo "[ERROR] Start $PROC_NAME failed"
    return 1
}
  
stop(){
    if [[ -n "$PROC_PORT"  ]] ; then
        PROC_ID=$(  /usr/sbin/ss -nltp "( sport = :$PROC_PORT )" |sed 1d  | awk '{print $NF}' |  grep -oP ',.*,' | grep -oP "d+" |  uniq )
    else
        PROC_ID=$(ps -eo comm,pid  | grep "^$PROC_NAME" |awk '{print $2}')
    fi
  
    if [[ -z "$PROC_ID" ]] ; then
        echo "[WARN] $PROC_NAME is aleady exit, skip stop"
        return 0
    fi
  
    checkhealth
    if [ "$?" != "0" ] ; then
        echo "[WARN] $PROC_NAME is aleady exit, skip stop"
        return 0
    fi
    kill $PROC_ID
    for i in $(seq $WAIT_TIME) ; do
        sleep 1
        checkhealth
        if [ "$?" != "0" ] ; then
            echo "Stop $PROC_NAME success"
            return 0
        fi
    done
  
    kill -9 $PROC_ID
    sleep 1
    checkhealth
    if [ "$?" != "0" ] ; then
        echo "Stop $PROC_NAME success"
        return 0
    fi
  
    echo "[ERROR] Stop $PROC_NAME failed"
    return 1
}
  
case "${1}" in
    start)
        start
        ;;
    stop)
        stop
        ;;
    status|health|checkhealth)
        checkhealth
        ;;
    restart)
        stop && start
        ;;
    *)
        help
        ;;
esac
```
