# 视频转码

视频处理是京东云对象存储提供的在云端完成对视频资源进行编码格式转换的服务。以下为使用OSS Java SDK创建转码任务的示例：

```
String accesskey = "your ak";
String secretkey = "your sk";
String endpoint = "oss.cn-north-1.jcloudcs.com";

String sourceBucket = "source bucket";
String sourceKey = "source key";

String targetBucket = "target bucket";
String targetKey = "target key";

//转码参数
String persistentOps = "video_mp4_480x360_440kbps";

//凭证
Credential credential = new Credential(accesskey, secretkey);
JingdongStorageService jss = new JingdongStorageService(credential);
jss.setEndpoint(endpoint);

//创建任务
String createTaskResult = jss.bucket(sourceBucket).object(sourceKey).pretreatmentStrategy(3600, new StringMap().put("saveas", targetBucket + ":" + targetKey).put("persistentOps", persistentOps), false).put();
System.out.println("createTaskResult: " + createTaskResult);

//解析taskId
JSONObject createTaskResultJson = JSON.parseObject(createTaskResult);
String taskId = createTaskResultJson.getString("persistentId");
System.out.println("taskId: " + taskId);

//根据taskId获取任务
VideoTaskInfo videoTaskInfo = jss.getVideoTask(taskId);
System.out.println("videoTaskInfo: " + JSON.toJSONString(videoTaskInfo));
```
