# checkCompanyTransfer


## 描述

对公打款查询

## 请求方式

POST

## 请求地址

https://cloudauth.jdcloud-api.com/v1/company:check


## 请求参数

| 名称          | 类型      | 是否必需 | 默认值 | 描述 |
| ------------- | --------- | -------- | ------ | ---- |
| **checkInfo** | CheckInfo | True     |        |      |

### <div id="CheckInfo">CheckInfo</div>

| 名称              | 类型   | 是否必需 | 默认值 | 描述   |
| ----------------- | ------ | -------- | ------ | ------ |
| **paymentAmount** | String | True     |        | 金额   |
| **orderNumber**   | String | True     |        | 订单号 |

## 返回参数

| 名称          | 类型   | 描述   |
| ------------- | ------ | ------ |
| **result**    | Result |        |
| **requestId** | String | 请求ID |

### <div id="Result">Result</div>

| 名称         | 类型     | 描述 |
| ------------ | -------- | ---- |
| **authInfo** | AuthInfo |      |

### <div id="AuthInfo">AuthInfo</div>

| 名称             | 类型    | 描述                                                    |
| ---------------- | ------- | ------------------------------------------------------- |
| **success**      | Boolean | 认证结果true 成功, false 失败                           |
| **hasException** | Boolean | 是否有异常 true 有异常, false 无异常                    |
| **code**         | String  | 认证结果状态码                                          |
| **message**      | String  | 1. 认证结果信息<br>2. 查询结果信息<br>3. 状态码信息<br> |
| **detail**       | String  | 1. 认证结果信息<br>2. 查询结果信息<br>                  |

## 返回码

| 返回码  | 描述 |
| ------- | ---- |
| **200** | OK   |
| **403** | FAIL |

## 示例代码

```
import (
	"fmt"
	"time"

	core "git.jd.com/jcloud-api-gateway/jcloud-sdk-go/core"
	cloudauth "git.jd.com/jcloud-api-gateway/jcloud-sdk-go/services/cloudauth/apis"
	client "git.jd.com/jcloud-api-gateway/jcloud-sdk-go/services/cloudauth/client"
	//models "git.jd.com/jcloud-api-gateway/jcloud-sdk-go/services/cloudauth/models"
)

func IntHelper(x int) *int {
	return &x
}

func StrHelper(x string) *string {
	return &x
}

func BoolHelper(x bool) *bool {
	return &x
}

func main() {
	accessKey := "22EA946**********5D4E0C2B6"
	secretKey := "2B30ED2**********906ABEB40"
	credentials := core.NewCredentials(accessKey, secretKey)

	config := core.NewConfig()
	config.SetEndpoint("10.0.0.1:8000")
	config.SetScheme("http")
	config.SetTimeout(20 * time.Second)

	client := client.NewCloudauthClient(credentials)
	client.SetConfig(config)
 // CheckCompanyTransfer 银行小额打款验证
 {
  checkInfo := &models.CheckInfo{
   /* 金额 */
   PaymentAmount: 0.12,
   /* 订单号 */
   OrderNumber: "order_number",
  }
  req := cloudauth.NewCheckCompanyTransferRequest(checkInfo)
  if resp, err := client.CheckCompanyTransfer(req); err != nil {
   fmt.Println("error : ", err)
  } else {
   json, _ := json.Marshal(resp)
   fmt.Println("resp json : ", string(json))
  		}
 	}
}
```

