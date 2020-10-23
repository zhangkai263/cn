# describeContractList


## 描述
获取已签章合同列表

## 请求方式
GET

## 请求地址
https://cloudsign.jdcloud-api.com/v1/contract


## 请求参数
| 名称              | 类型    | 是否必需 | 默认值 | 描述                                  |
| ----------------- | ------- | -------- | ------ | ------------------------------------- |
| **pageNumber**    | Integer | False    | 1      | 页码, 默认为1                         |
| **pageSize**      | Integer | False    | 10     | 分页大小, 默认为10, 取值范围[10, 100] |
| **contractTitle** | String  | False    |        | 合同标题                              |


## 返回参数
| 名称          | 类型              | 描述   |
| ------------- | ----------------- | ------ |
| **result**    | Result |        |
| **requestId** | String            | 请求ID |

### <div id="result">Result</div>
| 名称             | 类型                            | 描述     |
| ---------------- | ------------------------------- | -------- |
| **contractList** | ContractInfo | 合同列表 |
| **totalCount**   | Integer                         | 合同数量 |
### <div id="contractinfo">ContractInfo</div>
| 名称                | 类型     | 描述                     |
| ------------------- | -------- | ------------------------ |
| **contractId**      | String   | 合同ID                   |
| **contractTitle**   | String   | 合同标题                 |
| **stampNames**      | String | 印章名称(可能有多个印章) |
| **contractContent** | String   | 合同文件（base64）       |
| **contractDigest**  | String   | 合同文件摘要             |
| **createTime**      | String   | 合同签章时间             |

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
	// 获取已签章合同列表
	{

		req := cloudsign.NewDescribeContractListRequest()
		req.SetPageNumber(1)
		req.SetPageSize(10)

		if resp, err := client.DescribeContractList(req); err != nil {
			fmt.Println("error : ", err)
		} else {
			fmt.Println("resp : ", resp)
		}
	}
}
```

