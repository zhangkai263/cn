## 周期创建索引
周期创建索引功可以帮助用户实现索引从创建到删除的全生命周期过程的管理。

### 前提条件
在执行周期创建索引任务前，需要先在保证已存在可用的索引模板。

### 创建索引任务
在列表页面，点击“操作-更多-周期创建索引”可进入周期创建索引页面，点击“添加”可进入索引任务创建页面。
- 索引模板：可通过命令行工具或kibana-Dev Tools创建。</br>

命令行工具创建的示例索引模板：</br>
```
curl -XPUT localhost:9200/_template/template05 \
-H"Content-Type:application/json" \
-d '{
  "index_patterns": ["template05*"],    //适用于6.X以上版本，6.X以下版本此处应替换为 "template": "xie-", 
  "settings": {
    "number_of_shards": 2
  },
  "mappings": {
    "_doc": {
      "_source": {
        "enabled": false
      },
      "properties": {
        "name": {
          "type": "keyword"
        },
        "created_at": {
          "type": "date",
          "format": "EEE MMM dd HH:mm:ss Z YYYY"
        }
      }
    }
  }
}'
```
Kibana - Dev Tools创建的示例索引模板：</br>

```
PUT /_template/my_logs 
{
  "index_patterns": ["template05*"],    //适用于6.X以上版本，6.X以下版本此处应替换为 "template": "template05*",  
  "order": 1, 
  "settings": {
    "number_of_shards": 1 
  },
  "mappings": {
    "_default_": { 
      "_all": {
        "enabled": false
      }
    }
  },
  "aliases": {
    "last_3_months": {} 
  }
}
```


- 索引前缀：对应模版匹配索引的结果，即与index_patterns字段的值保持一致。示例中，对应索引前缀为template05。</br>
- 开始执行时间：每次执行周期创建索引任务的时间。</br>
- 执行周期：支持按天、按月2种。</br>
- 索引后缀：时间格式的定义。示例："2018-10-10"对应"yyyy-MM-dd"。</br>
- 定期删除索引：开关打开时可设置索引保存的时间，超过该保存时间的索引自动删除。</br>
- 索引保存时间：该项设置后索引到期自动删除。</br>
- 删除忽略索引：该项设置后索引不会被定期删除，多个间逗号(,)分隔。例"pop_jd_log_"模板需要长期保留，则填写pop_jd_log_20180618,pop_jd_log_20181111。</br>
- 索引模板内容：对应显示所选择的索引模板的内容。</br>

### 编辑索引任务
添加周期创建索引的任务后，可以通过点击“操作-编辑”对任务进行修改，支持索引前缀、执行周期、索引后缀、定期删除索引的修改。</br>

### 查看索引任务
添加或编辑周期创建索引任务后，可以通过点击“操作-详情”查看索引任务的基本信息和模板信息。</br>

### 删除索引任务
周期任务确认不再使用后，可以通过点击“操作-删除”完成周期任务的删除。
