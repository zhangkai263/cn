# personalAuth


## 描述

个人实名认证

## 请求方式

POST

## 请求地址

https://cloudauth.jdcloud-api.com/v1/personal


## 请求参数

| 名称             | 类型         | 是否必需 | 默认值 | 描述 |
| ---------------- | ------------ | -------- | ------ | ---- |
| **personalSpec** | PersonalSpec | True     |        |      |

### <div id="PersonalSpec">PersonalSpec</div>

| 名称             | 类型         | 是否必需 | 默认值 | 描述                                                         |
| ---------------- | ------------ | -------- | ------ | ------------------------------------------------------------ |
| **checkType**    | Integer      | True     |        | 认证方式（0 银行卡四要素，1 银行卡三要素，2 姓名身份证二要素，3 人像三要素，4 手机号三要素）<br>0 提交姓名、身份证号、银行卡号、手机号，与在银行开户时预留的信息比对<br>1 提交姓名、身份证号、银行卡号，与在银行开户时预留的信息比对<br>2 提交姓名、身份证号，与公安身份证信息比对<br>3 提交姓名、银行卡号、人像图片，与在运营商开户留的信息比对<br>4 提交姓名、身份证号、手机号，与在运营商开户留的信息比对<br> |
| **personalUser** | PersonalUser | True     |        | 个人认证要素信息                                             |

### <div id="PersonalUser">PersonalUser</div>

| 名称          | 类型   | 是否必需 | 默认值 | 描述       |
| ------------- | ------ | -------- | ------ | ---------- |
| **name**      | String | True     |        | 姓名       |
| **idCard**    | String | True     |        | 身份证号码 |
| **bankcard**  | String | True     |        | 银行卡号   |
| **mobile**    | String | True     |        | 手机号     |
| **imgBase64** | String | True     |        | 人像图片   |

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
// PersonalAuth 个人实名认证
	{
		user := PersonalUser{
			Name:     "京东云",
			IdCard:   "10234518981234",
			Bankcard: "6289873647576518651",
			Mobile:   "13333333333",
		}
		personalSpec := models.PersonalSpec{
			CheckType:    0,
			PersonalUser: user,
		}
		req := cloudauth.NewPersonalAuthRequest(personalSpec)
		if resp, err := client.PersonalAuth(req); err != nil {
			fmt.Println("error : ", err)
		} else {
			fmt.Println("resp : ", resp)
		}
	}
}
```

