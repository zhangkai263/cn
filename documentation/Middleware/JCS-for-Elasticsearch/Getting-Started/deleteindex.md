## 删除数据
### 删除整个索引
```
DELETE blog_index
```
响应如下时表示删除成功：
```
{
  "acknowledged" : true
}
```
### 删除一条记录
```
DELETE blog_index/user/manager
```
响应如下时表示删除成功：
```
{
  "_index" : "blog_index",
  "_type" : "user",
  "_id" : "manager",
  "_version" : 1,
  "result" : "not_found",
  "_shards" : {
    "total" : 2,
    "successful" : 2,
    "failed" : 0
  },
  "_seq_no" : 1,
  "_primary_term" : 1
}

```
