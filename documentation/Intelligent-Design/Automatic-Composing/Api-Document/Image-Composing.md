# 智能合图


## 接口描述
智能合图服务是稳定、高效、智能的图片设计工具，用户输入图片和文案素材，可快速输出图片设计结果。系统会围绕输入的内容综合运用图像识别、风格识别等技术，完成素材解析、排版、配色等复杂费力的设计步骤。

## 请求说明

### 1.请求地址
http://wkq5y1h4uomy.cn-north-1.jdcloud-api.net/api/compose/design

### 2.请求方式
POST

### 3. 请求参数
该接口采用 `FormData` 格式上传，如有不明白请参考demo！

#### （1）body请求参数
|名称|类型|必填|示例值|描述|
|---|---|---|---|---|
|service|int| 是 | 1 | 1 表示自定义模板合图，2 表示智能多尺寸模板合图 |
|template_id|string| 是 |  | 模板 id |
|texts|[]| 是 | ['文案1', '文案2'] | 文案数组 |
|images|[file]| 是 | [] | 图片数组 |

### 4. 请求示例
Request：

```http
POST /api/compose/design HTTP/1.1
Host: <HOST>
Content-Type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW


Content-Disposition: form-data; name="images"; filename="/Users/zhushijie/Documents/test-psd-800x600.psd

------WebKitFormBoundary7MA4YWxkTrZu0gW--
Content-Disposition: form-data; name="texts"

<TEXT>
------WebKitFormBoundary7MA4YWxkTrZu0gW--
Content-Disposition: form-data; name="texts"

<TEXT>
------WebKitFormBoundary7MA4YWxkTrZu0gW--
Content-Disposition: form-data; name="template_id"

<TEMPLATE_ID>
------WebKitFormBoundary7MA4YWxkTrZu0gW--
Content-Disposition: form-data; name="service"

<SERVICE>
------WebKitFormBoundary7MA4YWxkTrZu0gW--
```
## 返回说明

### 1. 返回参数

#### （1）公共返回参数

|名称|类型|示例值|描述|
|---|---|---|---|
|code|string | 1001 | 参见-[系统级错误码](https://docs.jdcloud.com/cn/image-matting/error-codes) |
|msg|string | 查询成功 | 参见-[系统级错误码](https://docs.jdcloud.com/cn/image-matting/error-codes) |
|result|object | {...} | 结果 |

#### （2）业务返回参数
result参数信息

|名称|类型|示例值|描述|
|---|---|---|---|
|status|string | 0 | 返回结果，0表示成功；非0为对应错误号，参见错误码-业务级错误码|
|requestid|string | 6979e9bd79b944b49e0d6e74079d5098 | 请求id |
|message|string | success | 结果状态，成功为 success |
|image_url|string | http://example.com/xxx.png | 合成后的图片地址 |

### 2. 返回示例
```http
HTTP/1.1 200
Content-Type: application/json

{
    "code": 10000,
    "msg": "查询成功",
    "result": {
        "image_url": "https://img30.360buyimg.com/tu/jfs/t1/80487/39/15221/177188/5dcbab45E5b7a420d/fdc002d76f4e40f0.jpg",
        "status": 0,
        "message": "OK",
        "requestId": "45d7a845-420f-450d-8460-fbddf3feafa1"
    }
}
```
