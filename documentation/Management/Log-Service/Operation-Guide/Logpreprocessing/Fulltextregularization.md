# 单行全文正则提取模式
## 概述
单行全文正则是指将以换行符为结束标志的单行日志，按照用户提供的正则表达式进行结构化处理。处理完成后，会把日志内容以key-value的键值对形式存储。用户在检索日志的时候可以按照提取的字段，进行键值检索。

## 前置条件
1. 已创建日志集日志主题。
2. 日志源选择了业务应用日志，并完成了日志源的设置。
3. 进入日志预处理步骤。

## 操作步骤
1. 将键值提取模式切换至“单行全文正则”。
2. 输入或粘贴日志样例。
3. 输入或粘贴正则表达式。（[查看正则表达语法](https://www.runoob.com/regexp/regexp-intro.html)）
4. 点击“提取字段”，将会按照刚才输入的正则表达式对日志样例中的日志进行键值提取。提取结果展示在下方的日志提取字段列表中。如果提取失败，则需要检查输入的日志样例是否正确或填写的正则表达式是否正确。

   <img src="https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/operationguide/Onelinefulltextregular.jpg" width=60% height=60% />

## 单行正则提取示例
- 示例日志
   
```java
21-03-28.19:35:33.907 [jdcloud_consumer_t1] INFO ConsumerService e2ecadf2258706e18edfaaa13347fdc7 - "hello world" env=test
```

- 正则表达式
   
```bash
^(?P<date>[\d]{2}-[\d]{2}-[\d]{2}).(?P<time>[\d:\.]+)\s+\[(?P<thread>.+)\]\s(?P<level>\w+)\s+(?P<class>\w+)\s+(?P<traceId>\w+)\s+-\s+(?P<content>.+)
```

  说明：字段名称须通过正则语句 `(?p<name>expression)`中的name进行修改，在提取结果列表中修改不生效。

- 正则调试

  填写正则表达式过程中，您可使用[https://regex101.com/](https://regex101.com/检查和调试正则表达式) 检查和调试正则表达式，以使其完全匹配示例日志
  
   <img src="https://github.com/jdcloudcom/cn/blob/0330log/image/LogService/operationguide/regex101.png" width=60% height=60% />

- 操作截图

  提取出字段后，可根据实际情况更改字段类型。
  
   <img src="https://github.com/jdcloudcom/cn/blob/0330log/image/LogService/operationguide/regex-eg.png" width=60% height=60% />

## 注意事项
1. 单行正则的日志样例大小不能超过1K
2. 单行正则表达式的长度不超过256个字符
3. 提取的字段数量及类型的限制如下：字符串(String)类型的字段不能超过30个,整数(Integer)类型的字段不能超过20个,浮点数(Float)类型的字段不能超过20个,时间(Time)类型的字段不能超过5个,IP类型的字段不能超过5个。 
4. 至少保留一个提取后的字段，不可删除所有提取的字段。
5. Time类型的字段需要用户设置时间解析格式。
