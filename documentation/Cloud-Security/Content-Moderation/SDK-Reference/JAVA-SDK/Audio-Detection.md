# 		音频检测

使用语音反垃圾JAVA SDK接口检测实时语音流或语音文件中的垃圾内容。

## 背景信息

语音流检测和语音文件检测均为异步检测，检测结果需要您以轮询或者回调的方式获取。

语音检测按照检测的语音文件或语音流的时间长度进行计费。时间单位为分钟，以每天累计检测总时长进行计量统计，每天检测总时长不足一分钟的按照一分钟进行计费。

相关API接口文档，请参见[语音异步检测](https://docs.jdcloud.com/cn/content-moderation/audio-asynchronous-detection-api)。

## 准备工作

在进行具体的服务调用之前，请完成以下准备工作：

- 创建京东智联云AccessKey。具体请参见[创建AccessKey](https://uc.jdcloud.com/account/accesskey)。
- 安装JAVA依赖。具体请参见[安装JAVA依赖](Install-And-Initialization.md)。

## 提交语音异步检测任务

| 接口                  | 描述                                                         |
| :-------------------- | :----------------------------------------------------------- |
| AsyncAudioScanRequest | 异步检测语音流或语音文件中是否包含违规内容。支持调用异步检测结果查询接口（AudioResultsRequest）轮询检测结果。 |

### 提交音频审核请求

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
        AsyncAudioScanRequest request = new AsyncAudioScanRequest();
        List<String> scenes = Arrays.asList(new String[]{"antispam"});

        AudioTask task = new AudioTask();
        task.setUrl("yourAudioURL");
        task.setDataId("yourDataID");

        List<AudioTask> tasks = new ArrayList<AudioTask>();
        tasks.add(task);

        request.setScenes(scenes);
        request.setTasks(tasks);

        //4. 执行请求
        AsyncAudioScanResponse response = censorClient.asyncAudioScan(request);

        //5. 处理响应（注意task code和error code非200的返回均需要进行异常处理）
        System.out.println(new Gson().toJson(response));
    }
}


```

### 查看音频检测结果

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
        AudioResultsRequest request = new AudioResultsRequest();

        List<String> taskIds = new ArrayList<String>();
        taskIds.add("taskID");

        request.setTaskIds(taskIds);

        //4. 执行请求
        AudioResultsResponse response = censorClient.audioResults(request);

        //5. 处理响应（注意task code和error code非200的返回均需要进行异常处理）
        System.out.println(new Gson().toJson(response));
	}
}

```
