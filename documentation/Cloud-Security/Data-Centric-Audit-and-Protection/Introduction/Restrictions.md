# 使用约束


## 区域限制

当前数据安全中心支持 `华北-北京` 及 `华南-广州` 两个区域

## 语句限制

**针对存储过程、`Prepare`等语句，仅进行透传语句操作，不进行数据处理，即碰到这些语句会进行BYPASS**
```
例句：CREATE PROCEDURE findById(in sid int) BEGIN select s_name, s_phone from student where s_id = sid; END;
例句：CALL findById(1);
例句：DROP PROCEDURE findById;
效果：仅透传，不做任何处理
```

**不支持对加密字段进行除了`count`之外的聚合函数操作**

```
例句：select max(s_phone) from student ;
异常：java.sql.SQLException: unsupport cipher column [max(`s_phone-idx`)] in func()
```

**不支持对加密字段进行数据库层面的大小比较**
```
例句: select s_name,s_phone from student where s_phone between 2000 and 3000
异常：java.sql.SQLException: unsupport cipher column [`s_phone-idx` BETWEEN 2000 AND 3000] in between()
```

**不支持对加密字段进行数据库层面的逻辑运算**
```
例句：select s_name,s_phone from student where  s_phone&2 = 5
异常：java.sql.SQLException: unsupport operator [&] for [`s_phone-idx` & 2]
```

**Select Items中，不支持子查询中带有加密字段**
```
例句：select s_name,(select s_phone as a1 from student where s_phone='13344445555') from student where s_id = 5;
异常：unsupport cipher column [( SELECT s_phone AS a1, ...... )] in select subquery
```

**不支持对加密字段进行函数操作**
```
例句：select s_name from student where match(s_phone, s_name) against(s_id)
异常：java.sql.SQLException: unsupport cipher column [MATCH (`s_phone-idx`, s_name) AGAINST (s_id)] in condition
```

**不支持对加密字段进行 collate或group_concat等操作**

```
例句：select s_phone collate utf8_bin from student
例句：select group_concat(s_phone,s_name order by s_name)  from student
异常：java.sql.SQLException: unsupport operator [COLLATE] for [`s_phone-idx` COLLATE utf8_bin]
```

**不支持orderby使用加密字段，支持groupby**

```
例句：select s_phone from student where s_phone is not null order by s_phone
异常：java.sql.SQLException: unsupport cipher column [`s_phone-idx`] in order by
```

**对于lower()和upper()函数的说明**

针对密文字段，无法使用mysql的lower函数和upper函数对数据进行操作，故而加密套件支持了在insert和update阶段进行lower和upper的操作
select中不支持密文的lower()和upper

```
支持： insert into student (s_phone) values (lower("13344445555"))
不支持: select s_phone from student where lower(s_phone) = lower("13344445555")
```

**不支持语句**
```
SELECT * FROM UNNEST(['foo', ?, 'baz'])
SELECT ['foo', ?, 'baz'] as fruit

```
