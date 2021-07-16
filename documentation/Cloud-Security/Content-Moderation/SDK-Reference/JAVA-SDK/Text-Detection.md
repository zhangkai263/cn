# 		文本检测

- 使用JAVA SDK文本反垃圾接口对文本内容进行色情、暴恐、涉政等反垃圾风险识别。

  ## 背景信息

  文本反垃圾目前仅支持同步检测。

  一次请求可以检测多条文本，也可以检测单条文本。按实际检测的文本条数进行计费。

  相关API接口文档，请参见[文本检测](https://docs.jdcloud.com/cn/content-moderation/text-synchronous-detection-api)。

  ## 准备工作

  在进行具体的服务调用之前，请完成以下准备工作：
  
- 创建京东智联云AccessKeyId和AccessKeySecret。具体请参见[创建AccessKey](https://uc.jdcloud.com/account/accesskey)。

- 安装JAVA依赖。具体请参见[安装JAVA依赖](Install-And-Initialization.md)。

  ## 文本内容检测

  文本垃圾检测支持自定义关键词，例如添加一些竞品关键词等。如果被检测的文本中包含您添加的关键词，算法会返回您suggestion=block。

  | 接口            | 描述                                                         |
  | :-------------- | :----------------------------------------------------------- |
  | TextScanRequest | 提交文本反垃圾检测任务，检测场景参数请传递antispam（scenes=antispam） |

代码示例：

```
import com.google.gson.Gson;
import com.jdcloud.sdk.auth.CredentialsProvider;
import com.jdcloud.sdk.auth.StaticCredentialsProvider;
import com.jdcloud.sdk.http.HttpRequestConfig;
import com.jdcloud.sdk.http.Protocol;
import com.jdcloud.sdk.service.censor.client.CensorClient;
import com.jdcloud.sdk.service.censor.model.*;
import com.jdcloud.sdk.client.Environment;
import java.util.*;

public class CensorClientApplication {
    public static void main(String[] args) {
		//1. 设置accessKey和secretKey
        String accessKeyId = "yourAccessKeyID";
        String secretAccessKey = "yourSecretKeyID";
        String endPoint = "censor.jdcloud-api.com";
        CredentialsProvider credentialsProvider = new StaticCredentialsProvider(accessKeyId, secretAccessKey);
        Environment env = new Environment.Builder().endpoint(endPoint).build(); //指定非默认Endpoint

        //2. 创建CensorClient
        CensorClient censorClient = CensorClient.builder()
			.credentialsProvider(credentialsProvider)
			.httpRequestConfig(new HttpRequestConfig.Builder()
				.connectionTimeout(10*1000) //设置连接超时为10s
				.socketTimeout(10*1000) //设置读响应超时为10s
				.protocol(Protocol.HTTPS) //设置使用HTTP而不是HTTPS，默认HTTPS
				.build())
			.environment(env)
			.build();

        //3. 设置请求参数
        TextScanRequest request = new TextScanRequest();
        List<String> scenes = Arrays.asList(new String[]{"antispam"});

        TextTask task = new TextTask();
        task.setContent("测试文本审核");
        task.setDataId("yourDataID");

        List<TextTask> tasks = new ArrayList<TextTask>();
        tasks.add(task);

        request.setScenes(scenes);
        request.setTasks(tasks);

        //4. 执行请求
        TextScanResponse response = censorClient.textScan(request);

        //5. 处理响应（注意task code和error code非200的返回均需要进行异常处理）
        System.out.println(new Gson().toJson(response));
    }
}
```

### 
