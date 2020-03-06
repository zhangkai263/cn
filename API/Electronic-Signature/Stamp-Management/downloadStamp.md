# downloadStamp

## 描述

下载印章

## 请求方式

GET

## 请求地址

https://cloudsign.jdcloud-api.com/v1/stamp/{stampId}

| 名称        | 类型   | 是否必需 | 默认值 | 描述   |
| ----------- | ------ | -------- | ------ | ------ |
| **stampId** | String | True     |        | 印章ID |

## 请求参数

无

## 返回参数

| 名称          | 类型                                                         | 描述   |
| ------------- | ------------------------------------------------------------ | ------ |
| **result**    | [Result](https://github.com/liangzy3/cn/blob/Electronic-Signature-1/API/Electronic-Signature/Stamp-Management/downloadStamp.md#result) |        |
| **requestId** | String                                                       | 请求ID |

### Result

| 名称          | 类型                                                         | 描述 |
| ------------- | ------------------------------------------------------------ | ---- |
| **stampInfo** | [StampInfo](https://github.com/liangzy3/cn/blob/Electronic-Signature-1/API/Electronic-Signature/Stamp-Management/downloadStamp.md#stampinfo) |      |

### StampInfo

| 名称             | 类型   | 描述               |
| ---------------- | ------ | ------------------ |
| **stampId**      | String | 印章ID             |
| **stampName**    | String | 印章名称           |
| **stampContent** | String | 印章图片（base64） |
| **stampDigest**  | String | 印章摘要           |
| **createTime**   | String | 印章上传时间       |

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
	// 下载印章
	{
		req := cloudsign.NewDownloadStampsRequest("stamp-xxxxxxxxxxxxxxxx")
		if resp, err := client.DownloadStamps(req); err != nil {
			fmt.Println("error : ", err)
		} else {
			fmt.Println("resp : ", resp)
		}
	}
}
```

