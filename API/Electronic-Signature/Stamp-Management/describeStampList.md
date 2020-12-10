# describeStampList

## 描述

获取印章列表

## 请求方式

GET

## 请求地址

https://cloudsign.jdcloud-api.com/v1/stamp

## 请求参数

| 名称           | 类型    | 是否必需 | 默认值 | 描述                                  |
| -------------- | ------- | -------- | ------ | ------------------------------------- |
| **pageNumber** | Integer | False    | 1      | 页码, 默认为1                         |
| **pageSize**   | Integer | False    | 10     | 分页大小, 默认为10, 取值范围[10, 100] |
| **stampName**  | String  | False    |        | 印章名称                              |

## 返回参数

| 名称          | 类型                                                         | 描述   |
| ------------- | ------------------------------------------------------------ | ------ |
| **result**    | [Result](https://github.com/liangzy3/cn/blob/Electronic-Signature-1/API/Electronic-Signature/Stamp-Management/describeStampList.md#result) |        |
| **requestId** | String                                                       | 请求ID |

### Result

| 名称           | 类型                                                         | 描述       |
| -------------- | ------------------------------------------------------------ | ---------- |
| **stampList**  | [StampInfo[\]](https://github.com/liangzy3/cn/blob/Electronic-Signature-1/API/Electronic-Signature/Stamp-Management/describeStampList.md#stampinfo) | 印章列表   |
| **totalCount** | Integer                                                      | 印章的数量 |

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
	// 获取印章列表
	{
		req := cloudsign.NewDescribeStampListRequest()
		req.SetPageNumber(2)
		req.SetPageSize(10)
		if resp, err := client.DescribeStampList(req); err != nil {
			fmt.Println("error : ", err)
		} else {
			fmt.Println("resp : ", resp)
		}
	}
}
```

