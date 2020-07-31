## .net 参考  
**一. 环境准备**  
下载安装dotnet开发环境，[下载地址](https://dotnet.microsoft.com/download)  
执行如下命令
```
dotnet --version
```
确认安装成功  
 
注意：dotnet需要2.0以上版本，具体要求参考[京东云官网帮助文档](https://docs.jdcloud.com/cn/sdk/dotnet)  
<br><br>
**二. SDK安装**  
构建工程，在新建的工程目录下执行如下命令  
```
dotnet new console -lang "C#"
```  
安装京东云核心包  
```
dotnet add package JDCloudSDK.Core --version 0.2.10
```  
关于 .net 核心包的最新版本号，https://www.nuget.org/packages/JDCloudSDK.Core/  

安装短信包  
```
dotnet add package JDCloudSDK.Sms --version 1.2.0.1
```  
如果使用vscode工具开发，可以使用NuGet Package Manager插件，搜索京东云核心包(JDCloudSDK.Core)和短信包(JDCloudSDK.Sms)  
注意：所安装的版本需要参考官网最新版本做响应修改  
关于 .net 短信包的最新版本号，https://www.nuget.org/packages/JDCloudSDK.Sms/  

<br><br>
**三. 示例代码**  

 ```
using System;
 
 
using Newtonsoft.Json;
using System.Collections.Generic;
 
using JDCloudSDK.Core.Auth;
using JDCloudSDK.Core.Http;
using JDCloudSDK.Sms.Apis;
using JDCloudSDK.Sms.Client;
 
namespace JDCloudSDK.ConsoleTest
{
    class Program
    {
        static void Main(string[ ] args)
        {
            //1. 设置accessKey和secretKey
            string accessKeyId = "{{accessKeyId}}";
            string secretAccessKey = "{{secretAccessKey}}";
            CredentialsProvider credentialsProvider = new StaticCredentialsProvider(accessKeyId, secretAccessKey);
             
            //2. 创建XXXClient
            SmsClient smsClient = new SmsClient.DefaultBuilder()
                     .CredentialsProvider(credentialsProvider)
                     .HttpRequestConfig(new HttpRequestConfig(Protocol.HTTP,10))
                     .Build();
 
            Program p = new Program();
            //发送短信
            p.testBatchSend(smsClient);
            //获取状态报告
            // p.testStatusReport(smsClient);
            //获取回复
            // p.testReply(smsClient);
        }
 
        /*
         * 发送短信
         */
        public void testBatchSend(SmsClient smsClient) {
            //3. 设置请求参数
            BatchSendRequest request = new BatchSendRequest();
            request.RegionId="cn-north-1";
            // 设置模板ID 应用管理-文本短信-短信模板 页面可以查看模板ID
            request.TemplateId="{{TemplateId}}";
            // 设置签名ID 应用管理-文本短信-短信签名 页面可以查看签名ID
            request.SignId="{{SignId}}";
            // 设置下发手机号list
            List<string> phoneList = new List<string>(){
                "13800138000"
                // ,
                // "phone number"
            };
            request.PhoneList = phoneList;
            // 设置模板参数，非必传，如果模板中包含变量请填写对应参数，否则变量信息将不做替换
            List<string> param = new List<string>(){
                "123456"
            };
            request.Params = param;
             
            //4. 执行请求
            var response = smsClient.BatchSend(request).Result;
            Console.WriteLine(JsonConvert.SerializeObject(response));
            Console.ReadLine();
        }
 
        /*
         * 获取状态报告
         */
        public void testStatusReport(SmsClient smsClient) {
            //3. 设置请求参数
            StatusReportRequest request = new StatusReportRequest();
            request.RegionId="cn-north-1";
             
            // 设置要查询的手机号列表
            List<string> phoneList = new List<string>(){
                "13800013800"
                // ,
                // "phone number"
            };
            request.PhoneList = phoneList;
            // 设置序列号
            // 序列号从下发接口response中获取。response.getResult().getData().getSequenceNumber();
            request.SequenceNumber = "{{SequenceNumber}}";
             
            //4. 执行请求
            var response = smsClient.StatusReport(request).Result;
            Console.WriteLine(JsonConvert.SerializeObject(response));
            Console.ReadLine();
            // Result.Data.Status = 0, 成功
        }
 
        /*
         * 获取回复
         */
        public void testReply(SmsClient smsClient) {
            //3. 设置请求参数
            ReplyRequest request = new ReplyRequest();
            request.RegionId="cn-north-1";
            // 设置应用ID 应用管理-文本短信-概览 页面可以查看应用ID
            request.AppId = "{{AppId}}";
            // 设置查询日期 时间格式：2019-09-01
            request.DataDate = "{{DataDate}}";
            // 设置要查询的手机号列表 非必传
            List<string> phoneList = new List<string>(){
                "13800013800"
                // ,
                // "phone number"
            };
            request.PhoneList = phoneList;
             
            //4. 执行请求
            var response = smsClient.Reply(request).Result;
            Console.WriteLine(JsonConvert.SerializeObject(response));
            Console.ReadLine();
        }
    }
}
 ```
