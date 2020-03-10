
## 创建索引
自动创建索引功能未开启的状态下，需要首先创建一个索引。

```
PUT blog_index
{

"mappings": {

"user": {

"properties": {

"title": { "type": "text" },

"name": { "type": "text" },

"age": { "type": "integer" }

               }
         }
            }
}
```
响应如下时代表索引创建成功：

```
{
  "acknowledged" : true,
  "shards_acknowledged" : true,
  "index" : "blog_index"
}
```

