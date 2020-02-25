# uploadStamp

## 描述

上传印章

## 请求方式

POST

## 请求地址

https://cloudsign.jdcloud-api.com/v1/stamp

## 请求参数

| 名称          | 类型                                                         | 是否必需 | 默认值 | 描述 |
| ------------- | ------------------------------------------------------------ | -------- | ------ | ---- |
| **stampSpec** | [StampSpec](https://github.com/liangzy3/cn/blob/Electronic-Signature-1/API/Electronic-Signature/Stamp-Management/uploadStamp.md#stampspec) | True     |        |      |

### StampSpec

| 名称             | 类型   | 是否必需 | 默认值 | 描述               |
| ---------------- | ------ | -------- | ------ | ------------------ |
| **stampContent** | String | False    |        | 印章图片（base64） |
| **stampName**    | String | False    |        | 印章名称           |

## 返回参数

| 名称          | 类型                                                         | 描述   |
| ------------- | ------------------------------------------------------------ | ------ |
| **result**    | [Result](https://github.com/liangzy3/cn/blob/Electronic-Signature-1/API/Electronic-Signature/Stamp-Management/uploadStamp.md#result) |        |
| **requestId** | String                                                       | 请求ID |

### Result

| 名称        | 类型   | 描述   |
| ----------- | ------ | ------ |
| **stampId** | String | 印章ID |

## 返回码

| 返回码  | 描述      |
| ------- | --------- |
| **200** | OK        |
| **404** | NOT FOUND |

## 示例代码

```
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
	// 上传印章
	{
		stamp:= models.StampSpec{
		StampName:"印章名称",//
		StampContent:"SDFFERFGSXVVL==", // 印章图片的Base64编码，图片类型只支持png格式
	}
		req := cloudsign.NewUploadStampRequest(stamp)
		if resp, err := client.UploadStamp(req); err != nil {
			fmt.Println("error : ", err)
		} else {
			fmt.Println("resp : ", resp)
		}
	}
}
```

