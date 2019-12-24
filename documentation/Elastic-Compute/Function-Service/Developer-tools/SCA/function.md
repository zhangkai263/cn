# 函数管理

通过sca cli，您可以查看云端函数信息，并可进行删除操作。

## 函数管理命令    
### 查看函数列表信息
`sca function list`  查看云端已存在函数资源的列表。
### 查看函数配置
`sca function info`  查看已部署云端函数配置。
### 删除云端函数
`sca function del`   删除已部署云端函数

#### 参数说明

| 简写 | 参数       | 必填 | 描述                                                         | 示例           |
| ---- | ---------- | ---- | ------------------------------------------------------------ | -------------- |
| -n   | name       | Y    | 删除指定函数                  | -n hello-world    |


## 使用示例  
查看云端函数列表。    
```
$ sca function list
FunctionName     DESCRIPTION      Runtime      CODE URL                                                            CREATE TIME  
hello_world                       Python3.6    http://oss-function-hb.s3.cn-north-1.jcloudcs.com/xxxxLATEST.zip    2019-12-20T07:47:55Z    hello_world2                      Python3.6    http://oss-function-hb.s3.cn-north-1.jcloudcs.com/xxxxLATEST.zip    2019-01-24T07:51:47Z
hello_world3                      Python2.7    http://oss-function-hb.s3.cn-north-1.jcloudcs.com/xxxxLATEST.zip    2019-01-16T14:09:50Z 
``` 
删除云端命名为hello_world的函数。
```
$ sca function del -n hello_world
FunctionName     Runtime              Status          CreateTime                  ModTime       
hello_world      Python3.6            Active          2019-12-17 11:23:47         2019-12-17 11:23:47
ensure to delete or not? Y/N
N
``` 
