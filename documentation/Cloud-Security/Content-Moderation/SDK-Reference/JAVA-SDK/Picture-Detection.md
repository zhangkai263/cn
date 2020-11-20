# 		图片检测

使用图片审核JAVA SDK检测图片中是否含有风险内容。

## 背景信息

图片审核支持同步检测和异步检测两种方式。

| 检测方式                            | 支持的检测对象          | 获取检测结果                                                 |
| :---------------------------------- | :---------------------- | :----------------------------------------------------------- |
| （推荐）同步检测NewImageScanRequest | 支持传入互联网图片URL。 | 同步返回检测结果。                                           |
| 异步检测AsyncImageScanRequest       | 支持传入互联网图片URL。 | 支持通过以下方式获取检测结果：提交异步检测任务后，调用异步检测结果查询接口（ImageResultsRequest），轮询检测结果。 |

相关API文档：

- [同步检测](https://docs.jdcloud.com/cn/content-moderation/image-synchronous-detection-api)
- [异步检测](https://docs.jdcloud.com/cn/content-moderation/image-asynchronous-detection-api)

## 准备工作

在进行具体的服务调用之前，请完成以下准备工作：

- 创建京东云AccessKey。具体操作请参见[创建AccessKey](https://uc.jdcloud.com/account/accesskey)。
- 安装JAVA依赖。具体操作请参见[安装JAVA依赖](Install-And-Initialization.md)。

## （推荐）提交图片同步检测任务

| 接口             | 描述                                                         |
| :--------------- | :----------------------------------------------------------- |
| ImageScanRequest | 提交图片同步检测任务，对图片进行多个风险场景的识别，包括色情（传递scenes=porn）、暴恐涉政（传递scenes=terrorism）、图文违规识别（传递scenes=ad）。 |

### 同步图片审核调用

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
        ImageScanRequest request = new ImageScanRequest();
        List<String> scenes = Arrays.asList(new String[]{"yourScene"});

        ImageTask task = new ImageTask();
        task.setUrl("yourURL");
        task.setDataId("yourDataID");

        List<ImageTask> tasks = new ArrayList<ImageTask>();
        tasks.add(task);

        request.setScenes(scenes);
        request.setTasks(tasks);

        //4. 执行请求
        ImageScanResponse response = censorClient.imageScan(request);

        //5. 处理响应（注意task code和error code非200的返回均需要进行异常处理）
        System.out.println(new Gson().toJson(response));	
    }
}

```

### 异步图片审核调用

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
        AsyncImageScanRequest request = new AsyncImageScanRequest();
        List<String> scenes = Arrays.asList(new String[]{"porn"});

        ImageTask task = new ImageTask();
        task.setUrl("yourImageURL");
        task.setDataId("yourDataID");

        List<ImageTask> tasks = new ArrayList<ImageTask>();
        tasks.add(task);

        request.setScenes(scenes);
        request.setTasks(tasks);

        //4. 执行请求
        AsyncImageScanResponse response = censorClient.asyncImageScan(request);

        //5. 处理响应（注意task code和error code非200的返回均需要进行异常处理）
        System.out.println(new Gson().toJson(response));	
    }
}
```



### 查询图片检测结果

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
        ImageResultsRequest request = new ImageResultsRequest();

        List<String> taskIds = new ArrayList<String>();
        taskIds.add("taskID");

        request.setTaskIds(taskIds);

        //4. 执行请求
        ImageResultsResponse response = censorClient.imageResults(request);

        //5. 处理响应（注意task code和error code非200的返回均需要进行异常处理）
        System.out.println(new Gson().toJson(response));
	}
}
```