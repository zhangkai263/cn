# companyTransfer


## 描述

对公银行账户打款(随机小额)

## 请求方式

POST

## 请求地址

https://cloudauth.jdcloud-api.com/v1/company:transfer


## 请求参数

| 名称            | 类型        | 是否必需 | 默认值 | 描述 |
| --------------- | ----------- | -------- | ------ | ---- |
| **accountInfo** | AccountInfo | True     |        |      |

### <div id="AccountInfo">AccountInfo</div>

| 名称               | 类型   | 是否必需 | 默认值 | 描述     |
| ------------------ | ------ | -------- | ------ | -------- |
| **orgName**        | String | True     |        | 组织名称 |
| **bankCardNum**    | String | True     |        | 银行卡号 |
| **bankName**       | String | True     |        | 银行名称 |
| **branchBankName** | String | True     |        | 支行名称 |
| **bankCode**       | String | False    |        | 银行代码 |
| **cityCode**       | String | False    |        | 城市代码 |
| **provinceCode**   | String | False    |        | 省份代码 |

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
// CompanyTransfer，返回订单号以及打款金额，供CheckCompanyTransfer使用
 {
  accountInfo := &models.AccountInfo{
   /* 组织名称 */
   OrgName: "京东云",
   /* 身份证号码 (Optional) */
   IdCard: "10234518981234",
   /* 银行卡号 */
   BankCardNum: "6289873647576518651",
   /* 银行名称 */
   BankName: "中国银行",
   /* 支行名称 */
   BranchBankName: "中国银行上海支行",
   /* 银行代码 */
   BankCode: "01030000",
   /* 城市代码 */
   CityCode: "320300",
   /* 省份代码 */
   ProvinceCode: "32",
  }
  req := cloudauth.NewCompanyTransferRequest(accountInfo)
  if resp, err := client.CompanyTransfer(req); err != nil {
   fmt.Println("error : ", err)
  } else {
   json, _ := json.Marshal(resp)
   fmt.Println("resp json : ", string(json))
  		}
 	}
}
```

