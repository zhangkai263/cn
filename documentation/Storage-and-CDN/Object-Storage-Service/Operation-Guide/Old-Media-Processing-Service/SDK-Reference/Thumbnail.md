# 视频截图

视频截图支持指定视频媒体文件按照一定规则进行视频截图操作,此功能可以为视频生成预览图、或通过截图来做视频封面等使用场景。以下为使用OpenAPI Java SDK创建转码任务的示例。

## 环境准备

在Maven项目中加入依赖项：

```
<dependency>
    <groupId>com.jdcloud.sdk</groupId>
    <artifactId>core</artifactId>
    <version>1.0.0</version>
</dependency>
<dependency>
    <groupId>com.jdcloud.sdk</groupId>
    <artifactId>mps</artifactId>
    <version>0.3.6</version>
</dependency>
```

更多环境准备信息请参考[OpenAPI Java SDK简介](https://docs.jdcloud.com/cn/sdk/java)

## 视频转码

```
package com.jdcloud.mps.client;

import com.jdcloud.sdk.auth.StaticCredentialsProvider;
import com.jdcloud.sdk.http.HttpRequestConfig;
import com.jdcloud.sdk.http.Protocol;
import com.jdcloud.sdk.service.mps.client.MpsClient;
import com.jdcloud.sdk.service.mps.model.*;

public class MpsClientExample {
    public static void main(String[] args) {
        // 以下参数均为必填项
        String region = "cn-north-1"; // cn-north-1/cn-south-1/cn-east-1/cn-east-2
        String sourceBucketName = ""; // 源bucket
        String sourceObjectKey = ""; // 源bucket中要截图的文件
        String destBucketName = ""; // 截图放置的目标bucket
        String accessKey = ""; // 用户AccessKey
        String secretKey = ""; // 用户SecretKey
   
        MpsClient client = MpsClient.builder()
                .credentialsProvider(new StaticCredentialsProvider(accessKey, secretKey))
                .httpRequestConfig(new HttpRequestConfig.Builder().protocol(Protocol.HTTP).build())
                .build();
   
        // 创建任务
        ThumbnailTaskSource createSource = new ThumbnailTaskSource().bucket(sourceBucketName).key(sourceObjectKey);
        ThumbnailTaskTarget createTarget = new ThumbnailTaskTarget().destBucket(destBucketName);
        
        // 设置截图规则，默认可不设置
        ThumbnailTaskRule rule = new ThumbnailTaskRule();
        rule.setCount(1); // 截图数量, mode=single时不可选. default:1
        rule.setStartTimeInSecond(1); // 截图在视频中开始时间（秒）, default: 0
        rule.setEndTimeInSecond(10); // 截图在视频中结束时间（秒）, default:-1(代表视频时长)
        rule.setKeyFrame(true); // 是否开启关键帧截图, default: true
        rule.setMode("multi"); // 截图模式 单张: single 多张: multi 平均: average default: single
        CreateThumbnailTaskRequest createRequest = new CreateThumbnailTaskRequest().source(createSource).target(createTarget).rule(rule).regionId(region);
        CreateThumbnailTaskResult createResult = client.createThumbnailTask(createRequest).getResult();
   
        // 获取任务
        GetThumbnailTaskRequest getRequest = new GetThumbnailTaskRequest().taskId(createResult.getTaskID()).regionId(region);
        GetThumbnailTaskResult getResult = client.getThumbnailTask(getRequest).getResult();
   
        // 任务列表
        ListThumbnailTaskRequest listRequest = new ListThumbnailTaskRequest().regionId(region);
        ListThumbnailTaskResult listResult = client.listThumbnailTask(listRequest).getResult();
    }
}
```
