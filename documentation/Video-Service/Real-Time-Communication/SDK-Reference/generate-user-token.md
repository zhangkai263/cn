## 用户Token生成

### Token算法

>JRTC native 客户端调用服务能力，需要传输 token 作为鉴权规则。
>
>计算方式
>
>1. JSON数据拼接(**按参数名字符升序排序**)
>
>  json = JSON**(appId, appKey, \**roomId,\** timestamp,\**userId\**)**
>
>2. Hmac256计算
>
>  bytes= **sha256(nonce, json)**
>
>3. Base64编码
>
>  origin = **Base64.encode(bytes)**
>
>4. 二次Base64编码 替换特殊字符
>
>  token = replaceCharacter(**Base64.encode(origin)**) //二次Base64重新计算

### 数据结构

| **字段名** | **类型** | **字段长度** | **是否必填** | **含义**                                                     |
| ---------- | -------- | ------------ | --------------- | ------------------------------------------------------------ |
| appId      | String   | 32<img width=250/>           | 是 <img width=250/>              | 应用ID，通过控制台创建。                                     |
| appKey     | String   | 64(字符)    | 是              | 应用KEY，通过控制台查看。                                    |
| roomId     | String   |              |                 | 房间ID                                                       |
| userId     | String   | 64           | 是              | 您的唯一标识，AppServer生成。同一个UserId的用户在其他端登录，先入会的端会被后入会的端踢出房间。 由字母[a-zA-Z]和数字[0-9]组成，不包含特殊字符，最大64字节。例如：2b9be4b25c2d38c409c376ffd2372be1。 |
| nonce      | String   | 1000         | 是              | 令牌随机码，建议由AppServe生成需要加上前缀AK-，以标识采用应用鉴权私钥（AppKey）方案。格式推荐您用UUID，由字母[a-zA-Z]和数字[0-9]组成，不包含特殊字符，最大64字节。例如：AK-2b9be4b25c2d38c409c376ffd2372be1。 |
| timestamp  | Long     |              | 是              | 过期时间戳，13位到毫秒级Unix时间格式，AppServer所运行的服务器需保持时间同步。例如：当前时间戳为1560415794000（2019-06-13 16:49:54）令牌2天后过期，timestamp设置为1560588594000（2019-06-15 16:49:54）。 |

### 计算结果示例

```
String appId="192bc3400174019265a7b1ad1ea7c6c7";
String appKey="SadW4EIcFmhmA7ixgK39MNegUFj0LnAkYEPlxlykexVezqsXS2Q1VOMed88ES4GxTP0Jiqv3pR/bCNE1lcrpA==";
String roomId="60";
String userId="2b9be4b25c2d38c409c376ffd2372be1";
String nonce ="AK-2b9be4b25c2d38c409c376ffd2372be1";
Long timestamp=4762379647000l;
String token=MacUtil.hmacSha256(appId,appKey,roomId,userId,nonce,timestamp);
System.out.println(token);
//输出token结果
N203UkQwM3pLdExvYURNcy9lWWhkNnJhS0FMWTlRdTh4bE9wTkcyR2ZIUT0_
```

### Java算法示例：

```
/**
 * 生成鉴权 token
 * @param appId        应用ID
 * @param appKey       应用KEY
 * @param roomId       房间ID
 * @param userId       您的唯一标识，AppServer生成
 * @param nonce        令牌随机码，由AppServe生成
 * @param timestamp    过期时间戳，13位到毫秒级
 * @return             TOKEN
 */
public static String hmacSha256(String appId, String appKey, String roomId, String userId, String nonce, Long timestamp) {
    Map map = new TreeMap();
    map.put("appId", appId);
    map.put("appKey", appKey);
    map.put("timestamp", timestamp);
    map.put("roomId", roomId);
    map.put("userId", userId);
 
    System.out.println(JSON.toJSONString(map));
    try {
        Mac hmac = Mac.getInstance(H_MAC_SHA_256);
        SecretKeySpec keySpec256 = new SecretKeySpec(nonce.getBytes(StandardCharsets.UTF_8), H_MAC_SHA_256);
        hmac.init(keySpec256);
        byte[] byteSig = hmac.doFinal(JSON.toJSONString(map).getBytes(StandardCharsets.UTF_8));
        String origin = new String(Base64.getEncoder().encode(byteSig), StandardCharsets.UTF_8);
 
        return replaceCharacter(Base64.getEncoder().encode(origin.getBytes(StandardCharsets.UTF_8)));
    } catch (NoSuchAlgorithmException e) {
        return "";
    } catch (InvalidKeyException e) {
        return "";
    }
}
 
 
/**
 * 去除特殊字符
 * @param input
 * @return
 */
private static String replaceCharacter(byte[] input) {
    byte[] base64 = new String(input, StandardCharsets.UTF_8).getBytes(StandardCharsets.UTF_8);
    for (int i = 0; i < base64.length; ++i){
        switch (base64[i]) {
            case '+':
                base64[i] = '*';
                break;
            case '/':
                base64[i] = '-';
                break;
            case '=':
                base64[i] = '_';
                break;
            default:
                break;
        }
    }
    return new String(base64,StandardCharsets.UTF_8);
}
```

### Node算法示例：

````
const Base64 = require('base-64');
const crypto=require('crypto');
 
class TokenUtil {
    static hmacSha256(appId,appKey,userId,roomId,nonce,timestamp) {
        const roomInfo = {
            appId,
            appKey,
            roomId,
            timestamp,
            userId
        };
 
        let jsonStr = JSON.stringify(roomInfo)
        console.info(jsonStr);
 
        const hmac = crypto.createHmac("sha256", nonce);
        let hash = hmac.update(jsonStr).digest('base64');
        return TokenUtil.replaceCharacter(Base64.encode(hash))
    }
 
    static replaceCharacter(str) {
        return str.replace(/\+/g, '*')
            .replace(/\//g, '-')
            .replace(/=/g, '_');
    }
}
````

