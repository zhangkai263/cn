# 地域及可用区

云Redis支持您在不同地域部署云业务。为避免单地域部署可能带来的单点风险，建议在部署方案设计阶段考虑多地域多可用区部署。目前，实例创建后不支持更换地域或更换可用区。

* 若您的业务要求有较高容灾能力，建议将实例部署在同一地域不同可用区内；
* 若您的业务要求有较低网络时延，建议将实例部署在同一可用区内。
* 创建云 Redis 时，建议主副本、从副本不在同一可用区，以便增强在发生可用区中断情况时的容错性。




## 京东智联云地域及可用区分布
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
      	<td rowspan="10">中国大陆地域</td>
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
   <tr>
     	<td>华东-宿迁<br>cn-east-1</td>
     	<td>可用区A<br>cn-east-1a</td>
	   	<td>宿迁</td>
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
     	<td>可用区C<br>cn-east-2c</td>
	   	<td>上海</td>
   </tr>
  <tr>
     	<td rowspan="3">华南-广州<br>cn-south-1</td>
     	<td>可用区A<br>cn-south-1a</td>
	   	<td>广州</td>
  </tr>
  <tr>
	<td>可用区B<br>cn-south-1b</td>
	   	<td>广州</td>
   </tr>
   <tr>
	<td>可用区C<br>cn-south-1c</td>
	   	<td>广州</td>
   </tr>
   </tbody>
</table>

![](../../../../image/vm/region-and-az.png)
