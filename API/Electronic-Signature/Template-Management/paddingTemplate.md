# paddingTemplate


## 描述
填充合同模板

## 请求方式
PATCH

## 请求地址
https://cloudsign.jdcloud-api.com/v1/template/{templateId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**templateId**|String|True| |合同模板ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**paddingSpec**|PaddingSpec|True| | |

### <div id="PaddingSpec">PaddingSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**paddingInfo**|PaddingInfo|True| |填充信息<br>1. 成对出现(占位符，替换值)<br>2. 填充信息必须全部填写(与word模板上传时holdingKeys数量以及名称保持一致)<br>|
### <div id="PaddingInfo">PaddingInfo</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**key**|String|True| |填充关键字|
|**value**|String|True| |填充数据|
|**page**|Integer|False| |页码|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Result| |
|**requestId**|String|请求ID|

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**templateId**|String|填充完成的合同模板ID|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT FOUND|

```
package main

import (
	"fmt"
	core "git.jd.com/jcloud-api-gateway/jcloud-sdk-go/core"
	cloudsign "git.jd.com/jcloud-api-gateway/jcloud-sdk-go/services/cloudsign/apis"
	client "git.jd.com/jcloud-api-gateway/jcloud-sdk-go/services/cloudsign/client"
	models "git.jd.com/jcloud-api-gateway/jcloud-sdk-go/services/cloudsign/modles"
)
	
func main() {
	accessKey := "C16D2F049162BBE5AA604B3E63D246FC"
	secretKey := "E6F88C0C6C21AAF36FBC38CCE7093D03"
	credentials := core.NewCredentials(accessKey, secretKey)
	config := core.NewConfig()
	config.SetEndpoint("10.226.148.63:8000")
	config.SetScheme("http")

	client := client.NewCloudsignClient(credentials)
	client.SetConfig(config)
	// DOC 模板填充
        {
            String templateId = "template-112233445566"; // 此ID为上传DOC模板 上传成功结果返回的templateId
            PaddingTemplateRequest request = new PaddingTemplateRequest();
            request.setRegionId("cn-north-1");
            PaddingSpec spec = new PaddingSpec();
            List<PaddingInfo> padInfo = new ArrayList<>();
            PaddingInfo info1 = new PaddingInfo();
            info1.setKey("姓名");
            info1.setValue("22020");
            PaddingInfo info2 = new PaddingInfo();
            info1.setKey("甲方");
            info1.setValue("天下公司");
            PaddingInfo info3 = new PaddingInfo();
            info1.setKey("乙方");
            info1.setValue("xiaomi");
            padInfo.add(info1);
            padInfo.add(info2);
            padInfo.add(info3);
            request.setPaddingSpec(spec);
            //执行请求
            PaddingTemplateResponse response = signClient.paddingTemplate(request);
            //处理响应
            System.out.println("templateId : " +response.getResult().getTemplateId());// 填充完成的模板Id,供签章使用
            System.out.println(new Gson().toJson(response));
        }
    }
}        
```

