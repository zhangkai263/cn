# 函数管理

通过sca cli，您可以查看云端函数信息，并可进行删除操作。

## 函数管理命令    
### 查看函数列表信息
`sca function list`  
### 删除云端函数
`sca function del`  

#### 参数说明

| 简写 | 参数       | 必填 | 描述                                                         | 示例           |
| ---- | ---------- | ---- | ------------------------------------------------------------ | -------------- |
| -n   | name       | Y    | 删除指定函数                  | -n hello-world    |


## 使用示例  
查看云端函数列表。    
```
$ sca function list 
FunctionName     Runtime              Status          CreateTime                  ModTime                                             hello_world      Python3.6            Active          2019-12-17 11:23:47          2019-12-17 11:23:47
hello_world2      Python3.6            Active          2019-12-17 11:23:47          2019-12-17 11:23:47
hello_world3      Python3.6            Active          2019-12-17 11:23:47          2019-12-17 11:23:47
``` 
删除云端命名为hello_world的函数。
```
$ sca function del -n hello_world
FunctionName     Runtime              Status          CreateTime                  ModTime
hello_world      Python3.6            Active          2019-12-17 11:23:47          2019-12-17 11:23:47
ensure to delete or not? Y/N
N
``` 
