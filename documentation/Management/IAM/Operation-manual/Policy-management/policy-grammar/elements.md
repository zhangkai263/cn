# 策略元素

京东智联云 IAM 策略（Policy）由以下元素组成：

- Version 策略版本
- Effect 效力
- Action 操作
- Resource 资源
- Condition 生效条件
- Principal 委托人

## 元素介绍

### Version
必填项，描述策略语法版本。京东智联云当前的策略版本为 v3。示例：

> "version": "3"

### Statement
必填项，描述一条或多条权限的Json信息。该元素包含下述的 effect、action、resource、condition等多个其他元素的权限或权限集合。一条策略有且仅有一个statement 元素。

### Effect
必填项，包括 allow（允许）和deny（显式拒绝）两种情况。
当同一操作在策略中既有允许（Allow）又有拒绝（Deny）的时，遵循 Deny 优先的原则，操作将被拒绝。示例：

> "effect":"Allow"

### Action
必填项，定义京东智联云的一个或一组api。示例：

> "action":"vm:createInstance"

### Resource
必填项，描述京东智联云的一个或多个资源。京东智联云资源采用六段式 jrn 描述，使用 jrn 可以全局指定一个资源：

    jrn:<service_name>:<region>:<accountId>:<resourceType>/<resourceId><subresouceType>/<subresouceId>
    
示例：

> "resource":"jrn:rds:cn-north-1:859150329790:database/mysql-ow3z4pnmm2/table/billing"

如指定某产品线的全部资源，其jrn为：

> "resource":"jrn:rds:\*:859150329790:\*"

### Condition
选填项，描述策略生效的约束条件。条件包括条件运算符、条件键和条件值组成。京东智联云目前支持指定资源标签作为策略生效条件。
如指定带有 department = finance 标签的资源，其 condition 为：

> "Condition": {"StringEquals": {"JDCloud:ResourceTag/department":\["finance"\]}}

### Principal
选填项，指定允许或拒绝访问资源的委托人。基于身份的策略（系统策略和自定义策略）中不可使用 principal 元素，但在角色的信任策略中，可使用 principal 元素来指定角色的信任实体。示例：

```json
{
      "Version": "3",
      "Statement":
        [
        {
          "Effect": "Allow",
          "Principal": "jrn:iam::859150329790:root",
          "Action":"sts:assumeRole",
          "Resource":"*"
         }]
}
```

## 策略示例

定义一条策略，允许查询账号下所有带有标签 department = finance 的云主机：

```json
{
	"Version": "3",
	"Statement": [
		{
			"Effect": "Allow",
			"Action": [
				"vm:describeInstance",
				"vm:describeInstances"
			],
			"Resource": [
				"*"
			],
			"Condition": {
				"StringEquals": {
					"JDCloud:ResourceTag/department": [
						"finance"
					]
				}
			}
		}
	]
}
```
