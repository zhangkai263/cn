# verifyContract

## 描述

验签已签章合同

## 请求方式

POST

## 请求地址

https://cloudsign.jdcloud-api.com/v1/contract/{contractId}

| 名称           | 类型   | 是否必需 | 默认值 | 描述   |
| -------------- | ------ | -------- | ------ | ------ |
| **contractId** | String | True     |        | 合同ID |

## 请求参数

| 名称                   | 类型                                                         | 是否必需 | 默认值 | 描述 |
| ---------------------- | ------------------------------------------------------------ | -------- | ------ | ---- |
| **contractVerifySpec** | [ContractVerifySpec](https://github.com/liangzy3/cn/blob/Electronic-Signature-1/API/Electronic-Signature/Contract-Management/verifyContract.md#contractverifyspec) | True     |        |      |

### ContractVerifySpec

| 名称                | 类型    | 是否必需 | 默认值 | 描述               |
| ------------------- | ------- | -------- | ------ | ------------------ |
| **contractId**      | String  | False    |        | 合同ID             |
| **contractContent** | String  | False    |        | 合同文件（base64） |
| **checkCertChain**  | Boolean | False    |        | 是否验证证书链     |

## 返回参数

| 名称          | 类型                                                         | 描述   |
| ------------- | ------------------------------------------------------------ | ------ |
| **result**    | [Result](https://github.com/liangzy3/cn/blob/Electronic-Signature-1/API/Electronic-Signature/Contract-Management/verifyContract.md#result) |        |
| **requestId** | String                                                       | 请求ID |

### Result

| 名称           | 类型                                                         | 描述 |
| -------------- | ------------------------------------------------------------ | ---- |
| **verifyInfo** | [VerifyInfo](https://github.com/liangzy3/cn/blob/Electronic-Signature-1/API/Electronic-Signature/Contract-Management/verifyContract.md#verifyinfo) |      |

### VerifyInfo

| 名称             | 类型                                                         | 描述                               |
| ---------------- | ------------------------------------------------------------ | ---------------------------------- |
| **success**      | String                                                       | 验签是否成功，true 成功 false 失败 |
| **message**      | String                                                       | 验证消息                           |
| **stampResults** | [StampResult[\]](https://github.com/liangzy3/cn/blob/Electronic-Signature-1/API/Electronic-Signature/Contract-Management/verifyContract.md#stampresult) | 签章验证列表                       |

### StampResult

| 名称                  | 类型    | 描述           |
| --------------------- | ------- | -------------- |
| **verified**          | Boolean | 验证结果       |
| **timestamp**         | String  | 时间戳         |
| **algorithm**         | String  | 签名算法信息   |
| **certInfo**          | String  | 证书信息       |
| **chainRootVerified** | Boolean | 是否验证根证书 |
| **subType**           | String  | 子类型         |

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
	credentials := core.NewCredentials(accessKey, secretKey)config := core.NewConfig()
	config.SetEndpoint("10.226.148.63:8000")
	config.SetScheme("http")

	client := client.NewCloudsignClient(credentials)
	client.SetConfig(config)
	// 合同验签
	{
	verifySpec := models.ContractVerifySpec{
	ContractContent: "KHDKFGHGJKGD==", // 已经验签合同Base64编码
	CheckCertChain: false, // 是否验证证书链
	}
	req := cloudsign.NewVerifyContractRequest("contract-xxxxxxxxxxxxxxxx",verifySpec)
	if resp, err := client.VerifyContract(req); err != nil {
	fmt.Println("error : ", err)
	} else {
	fmt.Println("resp : ", resp)
		}
	}
}
```

