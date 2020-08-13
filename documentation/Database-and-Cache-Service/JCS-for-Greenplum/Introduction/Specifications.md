# 产品规格

数据仓库 JDW 支持用户选择Segment节点的规格与数量，支持规格如下：

## Segment 节点规格

| 节点规格代码    | CPU（核）| 内存（GB）| 可用存储空间（GB）| 双副本总存储空间（GB）|存储类型  | 节点数量 |
| --------------- | ---- | ------ | -------------- | ------------------ | -----    | -------- |
| jdw.dx2.large   | 4    | 16     | 128            | 256                |本地盘SSD | 2-16      |
| jdw.dx2.xlarge  | 8    | 32     | 256            | 512                |本地盘SSD | 2-16      |
| jdw.dx2.2xlarge | 16   | 64     | 512            | 1024               |本地盘SSD | 2-16      |
| jdw.dx2.4xlarge | 32   | 128    | 1024           | 2048               | 本地盘SSD| 2-16      |


**说明：**

- 每个Segment节点会包含数个 Primary Segment 和 Mirror Segment 。
- 规格的存储空间为用户可用的存储空间，即Primary Segment占用的存储空间。
- Segment节点的总存储空间为规格展示的2倍，用于存储Primary Segment 和 Mirror Segment 的数据。
- 控制台可选择2-16个Segment节点，如需要更多节点，可提交工单开通。

