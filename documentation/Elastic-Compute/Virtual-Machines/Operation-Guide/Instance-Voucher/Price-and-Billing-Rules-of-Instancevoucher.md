# 价格及计费规则

## 价格总览

云主机和容器/POD支持购买的规格族详见：[实例抵扣券支持购买的规格类型](https://docs.jdcloud.com/virtual-machines/instancevoucher-overview#user-content-2)

### 预留型实例抵扣券
预留型实例抵扣券，指定地域、可用区、规格和数量后购买，单实例预留价格与购买实例的价格相同，可直接参考实例价格：[云主机价格](https://docs.jdcloud.com/virtual-machines/price-overview) 和 [容器/POD价格](https://docs.jdcloud.com/native-container/price-overview)。

### 无预留型实例抵扣券
无资源预留型实例抵扣券价格（暂不支持华东-宿迁地域购买）：

<table>
	<thead>
   <tr>
      <th colspan="2" rowspan="2" align="center"> 规格族</td>
      <th align="center">包月价格（元/计算力*月）</td>
   </tr>
   <tr>
      <th align="center">华北-北京/华东-上海/华南-广州/华东-宿迁</td>         
   </tr>
   </thead>
   <tbody>  
   <tr>
      <td rowspan="3">通用-标准</td>
      <td>g.n3</td>
      <td align="right">120</td>         
   </tr>
   <tr>
      <td>g.n2</td>
      <td align="right">121.13</td>              
   </tr>
   <tr>
      <td>g.n1</td>
      <td align="right">147</td>         
   </tr>
   <tr>
      <td rowspan="3">计算优化-标准</td>
      <td>c.n3</td>
      <td align="right">93.5</td>         
   </tr>
   <tr>
      <td>c.n2</td>
      <td align="right">89.5</td>         
   </tr>
   <tr>
      <td>c.n1</td>
      <td align="right">97</td>         
   </tr>
   <tr>
      <td>计算优化-密集</td>
      <td>c.c2</td>
      <td align="right">85</td>         
   </tr>
   <tr>
      <td rowspan="3">内存优化-标准</td>
      <td>m.n3</td>
      <td align="right">159</td>         
   </tr>
   <tr>
      <td>m.n2</td>
      <td align="right">154.85</td>         
   </tr>
   <tr>
      <td>m.n1</td>
      <td align="right">249</td>         
   </tr>
   <tr>
      <td rowspan="2">高频计算-通用</td>
      <td>h.g2</td>
      <td align="right">166</td>         
   </tr> 
   <tr>
      <td>h.g1</td>
      <td align="right">171.5</td>         
   </tr>      
   <tr>
      <td rowspan="2">存储优化-IO</td>
      <td>s.i3</td>
      <td align="right">174.46</td>         
   </tr> 
   <tr>
      <td>s.i1</td>
      <td align="right">177.25</td>         
   </tr> 
   <tr>
      <td>存储优化-大数据</td>
      <td>s.d2</td>
      <td align="right">208.63</td>         
   </tr>
   <tr>
      <td rowspan="3">GPU-标准</td>
      <td>p.n1p40</td>
      <td align="right">4483.75</td>         
   </tr>
   <tr>
      <td>p.n1p40h</td>
      <td align="right">4315.75</td>         
   </tr>
   <tr>
      <td>p.n1v100</td>
      <td align="right">6211.25</td>         
   </tr>
</tbody>  
</table>     

## 计费规则
### 计费说明
* 实例抵扣券仅支持预付费，购买时长支持1个月~9个月、1年、2年及3年；
* 有效时间：（无论您在一个自然小时内的何时下单成功购买抵扣券，在第一个自然小时结算周期内均具有相当于1个小时的计算量，因此购买成功后抵扣券的生效时间会早于创建时间）
  * 起始时间：购买成功时刻的上一个整点时刻，如购买时刻为"2020-04-25 9:50:00"，则生效起始时间为"2020-04-25 9:00:00"
  * 终止时间：到期日期当前的23:59:59，如购买日期为"2020-04-25"，时长为1个月，则生效终止时间为"2020-05-25 23:59:59"
      

### 到期停服说明
* 当您购买的实例抵扣券到期时间早于或等于当前时间，其计费状态会变更为已到期。到期后抵扣券即刻失效无法再用于实例抵扣；<br>
* 由于实例抵扣券**到期后不支持续费**，请您务必留意资源到期情况，在到期前完成续费或提前设置[自动续费](https://docs.jdcloud.com/online-buying/renew-management)；<br>
* 实例抵扣券到期后不会自动删除，以便您查看既往购买记录，您可在控制台随时删除此类过期实例抵扣券。抵扣券到期后配额会自动释放，不会影响您新购资源。

## 相关参考

[云主机实例规格](https://docs.jdcloud.com/virtual-machines/instance-type-family) 

[云主机价格总览](https://docs.jdcloud.com/virtual-machines/price-overview)

[容器/POD规格及价格](https://docs.jdcloud.com/native-container/price-overview)<br>
