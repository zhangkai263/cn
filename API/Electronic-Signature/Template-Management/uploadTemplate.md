# uploadTemplate


## 描述
上传合同模板

## 请求方式
POST

## 请求地址
https://cloudsign.jdcloud-api.com/v1/template


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**templateSpec**|TemplateSpec|True| | |

### <div id="TemplateSpec">TemplateSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**templateContent**|String|True| |合同模板文件（base64）|
|**templateName**|String|True| |合同模板名称|
|**templateTitle**|String|True| |合同模板标题|
|**templateType**|String|False| |模板类型 pdf,word (word为可编辑模板)|
|**holdingKeys**|String[]|False| |占位符关键字,templateType为word时必传<br>在word文档中为双大括号里的内容, 比如{{单位名称}}<br>|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Result| |
|**requestId**|String|请求ID|

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**templateId**|String|合同模板ID|

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
	// 上传DOC模板
        {
            TemplateSpec spec = new TemplateSpec();
            spec.setTemplateName("temp-name-1");
            spec.setTemplateTitle("pdf模板"); // 模板标题
            spec.setTemplateType("word"); // 模板类型
            List<String> keys = new ArrayList<>();
            keys.add("乙方");
            keys.add("甲方");
            keys.add("姓名");
            spec.setHoldingKeys(keys); // 模板类型为word 时，holdingkeys 为必传参数
            spec.setTemplateContent("JSDKJGYURKFD+==="); // word文件的base64 编码(接口尽量使用docx的word文件)

            UploadTemplateRequest request = new UploadTemplateRequest();
            request.setRegionId("cn-north-1");
            request.setTemplateSpec(spec);
            //执行请求
            UploadTemplateResponse response = signClient.uploadTemplate(request);
            //处理响应
            System.out.println("templateId : " + response.getResult().getTemplateId());// 填充模板时使用
            System.out.println(new Gson().toJson(response));

        }
    }
}
```

