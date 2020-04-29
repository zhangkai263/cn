# checkCompanyTransfer


## 描述
企业打款以及验证

## 请求方式
POST

## 请求地址
https://cloudauth.jdcloud-api.com/v1/companyAuth


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**companySpec**|CompanySpec|True| | |

### <div id="companyspec">CompanySpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**checkType**|Integer|True| |选COMPANY_BANK_TRANSFER 随机打小额款验证账户真实性<br>选COMPANY_BANK_AMOUNT_VERIFY 验证银行账户的所属支配权<br>|
|**companyUser**|CompanyUser|True| |企业用户信息|
|**businessId**|String|True| |业务流水号(如果一天之内服务端收到两次相同的businessId，则返回上一次业务的结果)|
### <div id="companyuser">CompanyUser</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**orgName**|String|True| |组织名称|
|**idCard**|String|False| |身份证号码|
|**bankCardNum**|String|True| |银行卡号|
|**bankName**|String|True| |银行名称|
|**branchBankName**|String|True| |支行名称|
|**bankCode**|String|True| |银行代码|
|**cityCode**|String|True| |城市代码|
|**provinceCode**|String|True| |省份代码|

## 返回参数
无


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**403**|FAIL|

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
// CheckCompanyTransfer 企业打款以及验证
	{
		accountInfo := models.AccountInfo{
			/* 组织名称  */
			OrgName: "京东云",
			/* 身份证号码 (Optional) */
			IdCard: "10234518981234",
			/* 银行卡号  */
			BankCardNum: "6289873647576518651",
			/* 银行名称  */
			BankName: "中国银行",
			/* 支行名称  */
			BranchBankName: "中国银行上海支行",
			/* 银行代码  */
			BankCode: "01030000",
			/* 城市代码  */
			CityCode: "320300",
			/* 省份代码  */
			ProvinceCode: "32",
		}
		req := cloudauth.NewCheckCompanyTransferRequest(accountInfo)
		if resp, err := client.CheckCompanyTransfer(req); err != nil {
			fmt.Println("error : ", err)
		} else {
			fmt.Println("resp : ", resp)
		}
	}
}
```

