## 创建文档

### 创建单个文档

```
POST blog_index/user
{

"title": "manager",

"name": "Tom Jerry",

"age": 34

}
```

### 创建多个文档
```
POST _bulk
{"index":{"_index":"blog_index","_type":"user"}}
{"title":"manager1","name":"Tom1","age":35}
{"index":{"_index":"blog_index","_type":"user"}}
{"title":"manager2","name":"Tom2","age":36}
{"index":{"_index":"blog_index","_type":"user"}}
{"title":"manager3","name":"Tom3","age":37}
```
