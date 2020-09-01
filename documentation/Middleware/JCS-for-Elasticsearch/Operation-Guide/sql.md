## SQL支持
 京东智联云Elasticsearch 支持使用 SQL 代替 DSL 查询语言。对于ES的初学者，使用 SQL 语言进行查询，能够降低他们使用 ES 的学习成本。</br>

### 使用限制
除7.5.2版本外，其余开源版本均支持SQL方式查询

### 通过Kibana使用SQL API查询

```
POST /_sql
{
"sql":"select * from {index_name}"
}
```

### 通过Curl使用SQL API查询

```
curl -u {username}:{password} -H "Content-Type: application/json" -XPOST 'http://{domain}:9200/_sql' -d 'select * from {index_name}'
```
