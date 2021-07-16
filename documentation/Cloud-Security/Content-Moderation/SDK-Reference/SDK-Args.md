# 		SDK调用参数说明

本文具体描述了内容安全检测SDK的scenes、label、suggestion等参数的说明。

## scenes与label参数说明

调用内容检测API发起检测请求时，您需要指定检测场景，即**scenes**参数；而在返回结果中，**label**参数用来表示被检测对象的检测结果分类。

内容检测SDK支持多种检测场景，您可以通过各个功能的API文档查看各种场景的scenes取值以及与其对应的label取值和含义。

举例说明：您的业务中需要进行图片鉴黄，您只要在NewImageScanRequest请求的参数**scenes**中指定添加porn即可。其他的风险场景识别，按照类似方式添加。

您也可以同时指定多个检测场景，如在**scenes**中指定添加porn和ad，对目标图片同时进行鉴黄和图文违规识别。

## suggestion参数说明

返回结果中的**suggestion**表示我们建议您对目标图片执行的操作。

- 图片检测场景scenes为porn（鉴黄）、ad（图文违规识别）、terrorism（暴恐识别）时，suggestion的取值和含义如下：

  - pass：图片正常。
  - review：图片疑似违规，需要人工审核。
  - block：图片违规，可以直接删除或者做限制处理。

  

