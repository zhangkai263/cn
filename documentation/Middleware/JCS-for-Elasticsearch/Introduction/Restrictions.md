## 限制说明
### 地域及可用区

<table>
	<thead>
	<tr>
		<th colspan="2">地域名称及编码</th>
      	<th>可用区名称及编码</th>
      	<th>所在城市</th>
   	</tr>
		</thead>
	<tbody>
   	<tr>
      	<td rowspan="6">中国大陆地域</td>
      	<td rowspan="3">华北-北京<br>cn-north-1</td>
     	<td> 可用区A<br>cn-north-1a</td>
	   	<td> 北京</td>
   </tr>
		
   <tr>
     	<td> 可用区B<br>cn-north-1b</td>
	   	<td> 北京</td>
   </tr>
   <tr>
     	<td> 可用区C<br>cn-north-1c</td>
	   	<td> 北京</td>
   </tr>
   </tr>
    	<tr>
     	<td rowspan="3">华东-上海<br>cn-east-2</td>
     	<td>可用区A<br>cn-east-2a</td>
	   	<td>上海</td>
   </tr>
      </tr>
    	<tr>
     	<td>可用区B<br>cn-east-2b</td>
	   	<td>上海</td>
   </tr>
  <tr>
     	<td> 可用区C<br>cn-east-2c</td>
	   	<td> 上海</td>
   </tr>
   </tbody>
</table>

### 规格限制

|限制项|限制规则 | 例外申请方式
:--|:---|:---
|集群版本|V5.6.9、V6.5.4、V6.7.0、V6.8.13、V7.5.2、V7.9.3|不可调整
|每个地域可创建实例数量上限|20|工单

### 网络访问

为了安全起见，云搜索Elasticsearch集群构建在私有网络VPC内，对集群数据的写入和查询也都限定在同一VPC网络内。

```
请注意：
* 云搜索Elasticsearch集群创建成功后，不支持VPC网络的切换，需要您在创建集群时，提前进行业务规划部署。

```
