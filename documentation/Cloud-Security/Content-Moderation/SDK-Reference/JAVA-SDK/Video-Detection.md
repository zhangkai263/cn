# 		视频检测

使用视频审核JAVA SDK检测视频中是否含有风险内容，支持同时检测视频中的图像和语音内容。

## 准备工作

在进行具体的服务调用之前，请完成以下准备工作：

- 创建京东智联云AccessKey。具体操作请参见[创建AccessKey](https://uc.jdcloud.com/account/accesskey)。
- 安装JAVA依赖。具体操作请参见[安装JAVA依赖](Install-And-Initialization.md)。

## 提交视频异步检测任务

| 接口                  | 描述                                                         |
| :-------------------- | :----------------------------------------------------------- |
| AsyncVideoScanRequest | 提交视频异步检测任务，对视频进行多个风险场景的识别，包括色情、暴恐涉政、图文违规。支持调用异步检测结果查询接口（VideoResultsRequest），轮询检测结果。 |

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
        AsyncVideoScanRequest request = new AsyncVideoScanRequest();
        List<String> scenes = Arrays.asList(new String[]{"porn"});

        VideoTask task = new VideoTask();
        task.setUrl("yourVideoURL");
        task.setDataId("yourDataID");
        task.setInterval(10);
        task.setMaxFrames(10);

        List<VideoTask> tasks = new ArrayList<VideoTask>();
        tasks.add(task);

        request.setScenes(scenes);
        request.setTasks(tasks);

        //4. 执行请求
        AsyncVideoScanResponse response = censorClient.asyncVideoScan(request);

        //5. 处理响应（注意task code和error code非200的返回均需要进行异常处理）
        System.out.println(new Gson().toJson(response));
    }
}
```



### 查看视频检测结果

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
        VideoResultsRequest request = new VideoResultsRequest();

        List<String> taskIds = new ArrayList<String>();
        taskIds.add("taskID");

        request.setTaskIds(taskIds);

        //4. 执行请求
        VideoResultsResponse response = censorClient.videoResults(request);

        //5. 处理响应（注意task code和error code非200的返回均需要进行异常处理）
        System.out.println(new Gson().toJson(response));
	}
}
```