# 函数管理

通过sca cli，您可以查看云端函数信息，并可进行删除操作。

## 函数管理命令    
### 查看函数信息
`sca function del`  
### 删除云端函数
`sca function del`  



## 参数说明

| 简写 | 参数       | 必填 | 描述                                                         | 示例           |
| ---- | ---------- | ---- | ------------------------------------------------------------ | -------------- |
| -n   | name       | N    | 生成的项目名称。如果不填写，默认值为demo。                   | hello-world    |
| -r   | runtime    | N    | 生成的项目运行环境，可选值为python2.7、python3.6、3.7。默认值为 python3.6 | python2.7      |
| -o   | output-dir | N    | 指定项目生成的目录，默认为当前目录。                         | /root/sca/code |

## 使用示例  
在/home/xxx/sca目录下创建名称为helloworld，运行时为python 3.6的项目。    
```
$ scf init --runtime python2.7 --name testproject --output-dir /Users/xxx/code/scf/
[+] Initializing project...
Template: gh:NevenMoore/demo-python
Output-Dir: /Users/xxx/code/scf/
Project-Name: testproject
Runtime: python2.7
[*] Project initialization is complete

$ tree /Users/xxx/code/scf/testproject
/Users/xxx/code/scf/testproject
├── README.md
├── main.py
└── template.yaml

1 directory, 3 files
```
