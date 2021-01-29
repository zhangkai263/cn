# checkLegalPerson


## 描述

法人信息校验

## 请求方式

POST

## 请求地址

https://cloudauth.jdcloud-api.com/v1/company:legalPerson


## 请求参数

| 名称                | 类型            | 是否必需 | 默认值 | 描述 |
| ------------------- | --------------- | -------- | ------ | ---- |
| **legalPersonSpec** | LegalPersonSpec | True     |        |      |

### <div id="LegalPersonSpec">LegalPersonSpec</div>

| 名称                | 类型    | 是否必需 | 默认值 | 描述                                                         |
| ------------------- | ------- | -------- | ------ | ------------------------------------------------------------ |
| **companyType**     | Integer | True     |        | 企业类型：<br>0: 企业(ET_PE_QiYe)<br>1: 个体工商户(ET_SE_GeTiGongShangHu)<br>2: 政府机构/事业单位(ET_OU_ZhengFu_ShiYeDanWei)<br> |
| **companyName**     | String  | True     |        | 企业名称                                                     |
| **idCode**          | String  | True     |        | 统一社会信用代码或营业执照注册号                             |
| **legalPersonName** | String  | True     |        | 法定代表人姓名                                               |
| **legalPersonId**   | String  | True     |        | 法定代表人身份证号                                           |

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
// CheckLegalPerson 企业法人信息核验
	{
		legalPersonSpec := models.LegalPersonSpec{
			/* 企业类型*/
			CompanyType: 0,
			/* 企业名称  */
			CompanyName: "京东云",
			/* 统一社会信用代码或营业执照注册号  */
			IdCode: "91210200MA0QE7GT5L",
			/* 法定代表人姓名  */
			LegalPersonName: "刘代理",
			/* 法定代表人身份证号  */
			LegalPersonId: "410702123123123123",
		}
		req := cloudauth.NewCheckLegalPersonRequest(legalPersonSpec)
		if resp, err := client.CheckLegalPerson(req); err != nil {
			fmt.Println("error : ", err)
		} else {
			fmt.Println("resp : ", resp)
		}
	}
}
```

