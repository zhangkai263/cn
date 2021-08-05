# 策略变量

京东云 IAM 支持使用变量作为占位符，实现概括策略。

## 策略变量的位置

京东云支持在 Condition 元素中使用策略变量。

## 策略变量的类型

使用变量作为占位符，当判断权限时，策略变量将被替换为来自请求上下文中的值。即，可以填充策略变量的值必须来自当前请求上下文。京东云 Condition 元素目前支持的策略变量类型如下：

| 变量名        | 变量描述   |  
| :--------   | :-----  |
| ${accountId}      | 当前 IAM 用户的主账号 accountId   |  
| ${name}        |   当前 IAM 用户的子用户名   |  
                    

## 策略变量的使用场景

策略变量与京东云资源标签协同，主要实现根据创建人标签（jdc-createdby）授权的功能。应用场景示例：
> 创建一条策略，允许主账号 859150329790 下的所有子用户可以管理其自己创建的云主机。策略详情如下：

```json
{
	"Version": "3",
	"Statement": [
		{
			"Effect": "Allow",
			"Action": [
				"vm:*"
			],
			"Resource": [
				"*"
			],
			"Condition": {
				"StringEquals": {
					"JDCloud:ResourceTag/jdc-createdby": [
						"${name}"
					]
				}
			}
		}
	]
}
```
