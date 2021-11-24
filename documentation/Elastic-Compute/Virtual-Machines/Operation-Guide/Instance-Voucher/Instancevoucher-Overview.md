# 实例抵扣券概述

实例抵扣券是计算实例的另一种付费购买方式，以接近包年包月计费的价格按月/年预付费购买抵扣券后，用于按配置计费的计算实例（云主机实例、容器实例、POD实例）费用抵扣。<br>

实例抵扣券将付费和资源创建解耦，其属性决定了可抵扣的实例特征而不限于具体某个或某些实例，因此既可满足有长期资源使用计划时的经济性考量，又可满足保持资源创删灵活的需求。

## 实例抵扣券分类
从适用实例类型的角度划分，可分为 **云主机实例抵扣券** 、 **容器实例抵扣券** 和 **POD实例抵扣券**：
* 云主机实例抵扣券：适用于按配置计费云主机实例的抵扣
* 容器实例抵扣券：适用于按配置计费容器实例的抵扣
* POD实例抵扣券：适用于按配置计费POD实例的抵扣

从资源是否预留的角度划分，可分为 **无资源预留型** 和 **资源预留型** 两类（预留型为公测阶段，如需购买请联系客服）

|                   | 无资源预留型                 | 资源预留型     |
| ------------------- | ------------------- |---------------|
| 购买方式  | 指定地域，按规格族和计算力<sup>[1](instancevoucher-overview#user-content-1)</sup>购买 | 指定地域及可用区，按规格和数量购买 |
| 使用方式  | 同地域下，任意可用区内的，规格族匹配<sup>[2](instancevoucher-overview#user-content-1)</sup>的按配置计费实例均可使用 | 同地域同可用区下， 规格完全匹配的按配置计费实例才可以使用|
| 资源预留  | 无预留，资源紧缺情况下，可能出现规格售罄实例无法创建导致抵扣券浪费的情况 | 有预留，按所购规格和数量进行资源预留，保证无论资源售卖情况如何，至少有抵扣券所购规格和数量的实例可以创建 |

## 计算实例购买方式对比
实例抵扣券是配合按配置计费实例使用的一种新的资源购买方式。几种购买方式对比如下：
* 按配置计费：后付费，实例基本计费方式，定期结算扣费，资源可随时删除。适用于短期运行或周期性运行但每月运行总时长较短的业务部署；
* 包年包月计费：预付费，实例优惠计费方式，承诺一定使用时长（数月/数年）后获得相对于按配置计费定价的优惠，但仅允许一个实例履行承诺时长，实例到期前不可删除。适用于长期运行无删除重建需求的实例；
* 实例抵扣券：预付费，一种抵扣券，与按配置计费实例配合使用，承诺一定使用时长（数月/数年）后获得相对于按配置计费定价的优惠，允许符合要求的任意实例使用抵扣券，由于按配置实例删除无限制，因此相当于同时获得了包年包月计费方式的优惠和资源创删的灵活性。

>提示：
>* 如您目前基于K8S部署业务或使用弹性伸缩服务，集群中的实例受策略影响需要经常性删除-创建进行调整，建议您评估集群内虚机运行时间考虑使用实例抵扣券以获得更多的价格优惠；
>* 如您目前使用包年包月实例且无删除调整需求，不建议您调整为实例抵扣券+按配置计费实例的模式。因为实例抵扣券目前还不支持资源预留，在资源紧张的情况下，实例删除后可能由于资源不足无法再次创建成功。

<div id="user-content-2"></div>

## 支持购买的规格类型

>注意：<br>
>* 通用共享型、计算优化共享型、裸金属及GPU虚拟化型规格暂不支持购买实例抵扣券；<br>
>* 由于实例在不同地域售卖规格有差异，因此实例抵扣券支持购买的规格族也存在地域性差异，各地域下具体可售规格族请以购买页面为准；<br>
>* 资源预留型，购买抵扣券≠创建实例，且系统会优先预占您账户下与抵扣券匹配的已创建的按配置计费实例，因此如期望通过购买此类抵扣券实现一定量的资源预留，先购买实例或先购买抵扣券均可；<br>
>* 无资源预留型，个别实例规格不在抵扣券可抵扣范围内，同时各地域不同可用区下资源售卖情况不同，请在购买抵扣券前务必对已建实例的规格进行确认，并关注计划购买实例规格的售罄情况。

### 资源预留型
资源预留型实例抵扣券，指定地域、可用区、规格和数量后购买，单实例预留价格与购买实例的价格相同，主机/原生容器中的多数规格均支持售卖。<br>

* 实例规格详见：[云主机实例规格](https://docs.jdcloud.com/virtual-machines/instance-type-family) 和 [容器/POD规格](https://docs.jdcloud.com/native-container/price-overview)<br>
* 实例抵扣券定价及计费规则详见：[价格及计费规则](https://docs.jdcloud.com/virtual-machines/price-and-billing-rules-of-instancevoucher)


### 无资源预留型
无资源预留型实例抵扣券，指定地域、适用产品和规格族后，按计算力<sup>[1](instancevoucher-overview#user-content-1)</sup>购买，目前支持售卖的规格族及不支持使用实例券抵扣的规格如下表：<br>

* 实例规格详见：[云主机实例规格](https://docs.jdcloud.com/virtual-machines/instance-type-family) 和 [容器/POD规格](https://docs.jdcloud.com/native-container/price-overview)<br>
* 实例抵扣券定价及计费规则详见：[价格及计费规则](https://docs.jdcloud.com/virtual-machines/price-and-billing-rules-of-instancevoucher)

<table>
	<thead>
   <tr>
      <th colspan="2"> 在售规格族</td>
      <th>不支持抵扣的规格</td>
      <th>主机可购</td>
      <th>容器/POD可购</td>
      <th>购买单位换算</td>
   </tr>
  	</thead>
   <tbody>   
   <tr>
      <td rowspan="3">通用-标准</td>
      <td>g.n3</td>
      <td>--</td>         
      <td>√</td>
      <td>× </td>
      <td rowspan="15">1计算力=1核</td>
   </tr>
   <tr>
      <td>g.n2</td>
      <td>--</td>         
      <td>√</td>
      <td>√ </td>
   </tr>
   <tr>
      <td>g.n1</td>
      <td>g.n1.xlarge_m</td>         
      <td>√</td>
      <td>√ </td>
   </tr>
   <tr>
      <td rowspan="3">计算优化-标准</td>
      <td>c.n3</td>
      <td>--</td>         
      <td>√</td>
      <td>× </td>
   </tr>
   <tr>
      <td>c.n2</td>
      <td>--</td>         
      <td>√</td>
      <td>√ </td>
   </tr>
   <tr>
      <td>c.n1</td>
      <td>c.n1.medium,c.n1.xlarge_m,c.n1.2xlarge_s,<br>c.n1.2xlarge_m,c.n1.4xlarge_m</td>         
      <td>√</td>
      <td>√ </td>
   </tr>
   <tr>
      <td>计算优化-密集</td>
      <td>c.c2</td>
      <td>--</td>         
      <td>√</td>
      <td>× </td>
   </tr>
   <tr>
      <td rowspan="3">内存优化-标准</td>
      <td>m.n3</td>
      <td>--</td>         
      <td>√</td>
      <td>× </td>
   </tr>
   <tr>
      <td>m.n2</td>
      <td>--</td>         
      <td>√</td>
      <td>√ </td>
   </tr>
   <tr>
      <td>m.n1</td>
      <td>m.n1.medium</td>         
      <td>√</td>
      <td>√ </td>
   </tr>
   <tr>
      <td rowspan="2">高频计算-通用</td>
      <td>h.g2</td>
      <td>--</td>         
      <td>√</td>
      <td>√ </td>
   </tr> 
   <tr>
      <td>h.g1</td>
      <td>--</td>         
      <td>√</td>
      <td>× </td>
   </tr>      
   <tr>
      <td rowspan="2">存储优化-IO</td>
      <td>s.i3</td>
      <td>s.i3.22xlarge</td>         
      <td>√</td>
      <td>× </td>
   </tr> 
   <tr>
      <td>s.i1</td>
      <td>--</td>         
      <td>√</td>
      <td>× </td>
   </tr> 
   <tr>
      <td>存储优化-大数据</td>
      <td>s.d2</td>
      <td>s.i3.22xlarge</td>         
      <td>√</td>
      <td>× </td>
   </tr>
   <tr>
      <td rowspan="3">GPU-标准</td>
      <td>p.n1p40</td>
      <td>--</td>         
      <td>√</td>
      <td>× </td>
      <td rowspan="3">1计算力=1GPU卡</td>
   </tr>
   <tr>
      <td>p.n1p40h</td>
      <td>--</td>         
      <td>√</td>
      <td>× </td>
   </tr>
   <tr>
      <td>p.n1v100</td>
      <td>--</td>         
      <td>√</td>
      <td>× </td>
   </tr>
 </tbody>
 </table>     

<div id="user-content-3"></div>


## 配额

<table>
	<thead>
   <tr>
      <th rowspan="2">  </td>
      <th colspan="2">非GPU规格（1计算力=1核）</td>
      <th colspan="2">GPU规格（1计算力=1卡）</td>
   </tr>
   <tr>	   	   
      <td> 预留型</td>
      <td>无预留型</td>
      <td> 预留型</td>         
      <td>无预留型</td>
   </tr>
   	</thead>
   <tbody>    
   <tr>
      <td>云主机 </td>	   
      <td> 500计算力/地域</td>
      <td> 500计算力/地域</td>
      <td> 100计算力/地域</td>         
      <td> 100计算力/地域</td>
   </tr>
   <tr>
      <td>原生容器 </td>	   
      <td> 500计算力/地域</td>
      <td> 500计算力/地域</td>
      <td rowspan="2"> （暂无此类规格）</td>         
      <td rowspan="2"> （暂无此类规格）</td>
   </tr>	
   <tr>
      <td>POD </td>	   
      <td> 500计算力/地域</td>
      <td> 500计算力/地域</td>
   </tr>		
 </tbody>
 </table>   

如需提升配额请[提交工单](https://ticket.jdcloud.com/applyorder/submit)。

## 抵扣规则
* 在您成功购买实例抵扣券后，系统会根据实例规格族、计算力<sup>[1](instancevoucher-overview#user-content-1)</sup>，将抵扣券按照按配置计费实例的计费周期（1小时）折合成可量化的计算量<sup>[3](instancevoucher-overview#user-content-1)</sup>（每小时可用计算量：计算力* 3600s），供按配置实例结算时抵扣；<br>
* 每有按配置计费实例结算时（整点结算或删除结算），会判断该规格是否有可用的实例抵扣券（地域、（可用区）、规格族、有效期等属性），如有则计算实例消耗的计算量，扣减本结算周期内可用计算量，若无可用实例抵扣券则正常扣款结算；<br>
* 若当前结算周期内可用计算量仅可抵扣部分实例消耗，则剩余未抵扣计算量按比例依据规格定价进行扣款结算：规格单价/（规格尺寸* 3600s）* （实例消耗计算量-已抵扣计算量），抵扣记录查看方式请参考文档[查看抵扣明细](https://docs.jdcloud.com/virtual-machines/check-usage-of-instancevoucher)；<br>
* 实例抵扣券每小时可用计算量无论是否被实例全部抵扣，都不会进行累计或退款；
* 如某一实例在抵扣时，同时有无预留型和预留型实例抵扣券可用，则会优先抵扣预留型实例抵扣券。


<div id="user-content-1"></div>

>**注释**<br>
>1.计算力：同一规格族内，反映单实例或多实例集群计算能力的指标。计算力= ∑规格尺寸×数量（规格尺寸是在同一规格族内衡量规格计算能力的依据，CPU规格通常等于核数，GPU规格通常等于GPU卡数），如您通用标准二代规格族g.n2下有2个2C8G实例和2个4C16G实例，则在该规格族下，4个实例的计算力为2×2 + 4×2=12；<br>
>2.无资源预留型实例抵扣券中，有个别规格不在可抵扣范围内，详见上方：[支持购买的规格类型](instancevoucher-overview#user-content-2)；<br>
>3.计算量：一定计算力在一定时间段内可以完成的计算任务情况，=计算力* 时长（秒）。如，1台g.n2.large实例运行一小时，则其计算量为 1×2×3600。

## 相关参考
[购买实例抵扣券](https://docs.jdcloud.com/virtual-machines/purchase-instancevoucher)

[价格及计费规则](https://docs.jdcloud.com/virtual-machines/price-and-billing-rules-of-instancevoucher)

[查看抵扣明细](https://docs.jdcloud.com/virtual-machines/check-usage-of-instancevoucher)


