# 统计分析
## 应用场景
通过过滤/统计分析功能，从大量日志中筛选出满足条件的日志记录，通过类SQL的语法可以快速获取满足条件的记录信息，并通过表格、柱状图、饼图这3种形式，可以快速查看分析结果。

**示例1：分析请求的个数**

以应用负载均衡7层访问日志中，将日志按照request_method分组，统计各个请求方法出现的次数。

```
select request_method,count(1) group by request_method
```

展示结果如下，在选定的时间内，POST方法有50条日志，GET方法有9条日志。

| request_method | COUNT(1) |
| -------------- | -------- |
| POST           | 50       |
| GET            | 9        |



**示例2：获取查询较长时间的sql 语句** 

在mysql的慢日志中，按照clienthost字段分组，统计query_time 大于1s 发生的次数。

```
select clienthost,count(1) where query_time > 1 group by clienthost
```

展示结果如下，在选定的时间内，192.168.0.29超过1秒的次数有16次，192.168.0.28超过1s的次数有4次。

| clienthost   | COUNT(1) |
| ------------ | -------- |
| 192.168.0.29 | 16       |
| 192.168.0.28 | 4        |

## 支持语法
聚合统计的查询语法支持基本的SQL语法，说明如下：

1. 只支持 select 语句，不支持update,insert,delete 等语句。select 语句包含{selectExpr}，{whereExpr}，{fileds}三个部分，语句整体结构如下，不需指定 from 字段，服务会默认添加日志主题所属的日志类型。

   ```
   select {selectExpr} where {whereExpr} goup by {fileds} 
   ```

2. 在 {selectExpr} 中至少需要包含 max,min,avg,sum,count 中的一种或多种聚合函数。例如：

   ```
   select count(1),max(score) group by username                    //正确
   
   select city group by city										//错误，未包含聚合函数
   ```

3. 在 {whereExpr} 中只支持 and 和 between 关键字，不支持or,is,not 等其他关键字。

   ```
   select count(1) where city= 'bj' and age = 18					//正确
   
   select count(1) where city= 'bj' or age = 18					//错误，不支持or关键字	 
   ```

4. 支持 >,>=,<,<=,=,!=,in 等比较运算符。字符值两端需要加单引号，且只有数值类型支持>,>=,<,<= 运算符。

   ```
   select count(1),max(score) where age > 5 and city = 'bj' group by username
   ```

5. 支持分组 group by，但是在{selectExpr} 中出现的非聚合字段需要在group by 后。例如下面语法是错误的，因为 feild 字段没有出现在group by 后。

   ```
   select feild,count(1) group by pin
   ```

6. 不支持order by 字段，也就是说统计结果不会按照某个字段排序。

7. 支持limit, 最多只能返回100条统计结果。

8. 不支持子查询。

9. 需要补充说明的是，在自动生成的语句中每个字段都会用反引号`` ,这是防止查询语句中的某些字段是SQL的关键字。用户在手动数据字段时候，需注意适当加上反引号。



