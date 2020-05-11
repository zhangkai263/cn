## 策略元素
京东智联云 IAM 策略（Policy）由以下元素组成：
- Version 策略版本
- Effect 效力
- Action 操作
- Resource 资源
- Principal 委托人
- Condition 生效条件

## 元素详解

### Version
必填项，描述策略语法版本。京东智联云当前的策略版本为 v3。示例：
> "version": "3"

### Effect
必填项，包括 allow(允许)和deny(显式拒绝)两种情况。
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

### 生效条件(condition)
选填项，描述策略生效的约束条件。条件包括条件运算符、条件键和条件值组成。京东智联云目前支持指定资源标签作为策略生效条件。
如指定带有 department = finance 标签的资源，其 condition 为：
> "Condition": {"ForAnyValue:StringEquals": {"JDCloud:ResourceTag/department":\["finance"\]}}



策略样例
该样例描述为：允许属于主账号 876393467912下的子账号，在从IP地址 “203.0.113.0/24”的时候，能够查看和创建IAM的子用户和群组。
角色扮演者(principal)
选填项，京东云中可以扮演角色的实体用户或者服务。

语句(statement)
必填项，描述一条或多条权限的Json信息。该元素包括 action、resource、condition、effect 等多个其他元素的权限或权限集合。一条策略有且仅有一个statement 元素。

{
      "Version": "3",
      "Statement":
        [
        {
          "Effect": "Allow",
          "Action": ["iam:describe*","iam:create*"],
          "Resource": ["jrn:iam:*:*:subuser/*","jrn:iam:*:*:group/*"],
          "Condition":
             {
                "IpAddress":
                 {
                 "Jdcloud:SourceIp":"203.0.113.0/24"
                  }
              }
         }]
}
