# JSON方式定义迁移对象

源数据库的库表内容较多时，可通过JSON方式定义迁移对象。

示例如下：

```JSON
[
    {
        "dbName":"待迁移库名",
        "schemaName":"待迁移 Schema名",
        "tableIncludes":[
               {
                "tableName":"*"
            }
        ],
        "tableExcludes":[
            {
                "tableName":"不迁移的表名"
            } 
        ]
    },
    {
        "dbName":"待迁移库名",
        "schemaName":"待迁移 Schema名",
        "tableIncludes":[
            {
                "tableName":"待迁移表名1"
            },
            {
                "tableName":"待迁移表名2"
            }            
        ]
    },
    {
        "dbName":"123*",
        "schemaName":"*",
        "tableIncludes":[
            {
                "tableName":"*"
            }       
        ]
    }
]
```

说明：

- SQL Server 填写 dbName、schemaName、tableName。
- MySQL 填写 schemaName、tableName，不需要填写dbName。
- MongoDB 填写 dbName、tableName，不需要填写schemaName。
- dbName、schemaName、tableName支持“*”通配，如： * hello，he * o，hello * （数据库类型为PostgreSQL时暂仅支持 *）。 
- 支持使用TableExcludes指定不迁移的表，如使用TableExcludes，则TableIncludes需定义表名为 * 。
- 如dbName使用通配符则schemaName、tableName均需为 *；如schemaName使用通配符则tableName需为 *。
