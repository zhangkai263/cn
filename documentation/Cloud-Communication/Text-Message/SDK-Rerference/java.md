## JAVA 参考  
**一. 环境准备**  
请按以下说明准备好环境。  
JAVA环境依赖, 请确保已经安装了 JDK 8 环境，若未安装请前往 Oracle 官网下载；  

SDK环境依赖, 建议使用Maven 方式引入依赖：  

 ```
<dependency>
   <groupId>com.jdcloud.sdk</groupId>
   <artifactId>sms</artifactId>
   <version>1.2.0</version>
   //设置为 Java SDK 的最新版本号
</dependency>
 ```
 
  
关于 Java SDK 的最新版本号，请[查看](https://mvnrepository.com/artifact/com.jdcloud.sdk/sms)  

<br><br>
**二. 示例代码**  
 ```
import com.google.gson.Gson;
import com.jdcloud.sdk.auth.CredentialsProvider;
import com.jdcloud.sdk.auth.StaticCredentialsProvider;
import com.jdcloud.sdk.http.HttpRequestConfig;
import com.jdcloud.sdk.http.Protocol;
import com.jdcloud.sdk.service.sms.client.SmsClient;
import com.jdcloud.sdk.service.sms.model.*;
 
import java.util.ArrayList;
import java.util.List;
 
public class SmsClientExample {
    private static SmsClient smsClient;
    // 地域信息不用修改
    private static String region = "cn-north-1";
 
    public static void init() {
        /**
         * 普通用户ak/sk （应用管理-文本短信-概览 页面可以查看自己ak/sk）
         */
        // 请填写AccessKey ID
        String accessKeyId = "";
        // 请填写AccessKey Secret
        String secretAccessKey = "";
        CredentialsProvider credentialsProvider = new StaticCredentialsProvider(accessKeyId, secretAccessKey);
        smsClient = SmsClient.builder()
                .credentialsProvider(credentialsProvider)
                .httpRequestConfig(new HttpRequestConfig.Builder().protocol(Protocol.HTTP).build()) //默认为HTTPS
                .build();
    }
 
    /**
     * 指定模板群发短信
     */
    public static void testBatchSend() {
        BatchSendRequest request = new BatchSendRequest();
        request.setRegionId(region);
        // 设置模板ID 应用管理-文本短信-短信模板 页面可以查看模板ID
        request.setTemplateId("");
        // 设置签名ID 应用管理-文本短信-短信签名 页面可以查看签名ID
        request.setSignId("");
        // 设置下发手机号list
        List<String> phoneList = new ArrayList<>();
        phoneList.add("");
        request.setPhoneList(phoneList);
        // 设置模板参数，非必传，如果模板中包含变量请填写对应参数，否则变量信息将不做替换。
        List<String> params = new ArrayList<>();
        params.add("");
        request.setParams(params);
        BatchSendResponse response = smsClient.batchSend(request);
        System.out.println(new Gson().toJson(response));
    }
 
    /**
     * 短信发送回执接口
     */
    public static void testStatusReport() {
        StatusReportRequest statusReportRequest = new StatusReportRequest();
        statusReportRequest.setRegionId(region);
        // 设置序列号
        // 序列号从下发接口response中获取。response.getResult().getData().getSequenceNumber();
        statusReportRequest.setSequenceNumber("");
        // 设置要查询的手机号列表
        List<String> phoneList = new ArrayList<>();
        phoneList.add("");
        statusReportRequest.setPhoneList(phoneList);
        StatusReportResponse response = smsClient.statusReport(statusReportRequest);
        System.out.println(new Gson().toJson(response));
    }
 
    /**
     * 短信回复接口
     */
    public static void testReply() {
        ReplyRequest replyRequest = new ReplyRequest();
        replyRequest.setRegionId(region);
        // 设置应用ID 应用管理-文本短信-概览 页面可以查看应用ID
        replyRequest.setAppId("");
        // 设置查询日期 时间格式：2019-09-01
        replyRequest.setDataDate("");
        // 设置要查询的手机号列表 非必传
        List<String> phoneList = new ArrayList<>();
        phoneList.add("");
        replyRequest.setPhoneList(phoneList);
        ReplyResponse response = smsClient.reply(replyRequest);
        System.out.println(new Gson().toJson(response));
    }
 
    public static void main(String[] args) {
        // 初始化client
        init();
        testBatchSend();
//        testStatusReport();
//        testReply();
    }
}
 ```
