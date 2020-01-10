## Python 参考  
**一、安装京东云Python SDK，两种安装方式 pip安装或下载sdk手动安装。**  
京东云Python SDK适用于Python 2.7.* 和 3.* 版本  
1. pip安装：  
```
pip install -U jdcloud_sdk
```  
 
2. 下载sdk手动安装：  
sdk下载地址： [SDK-1.6.39](https://files.pythonhosted.org/packages/99/9d/48054c24d9d940a173b11d5bd87a149a1ce418330cdafa9f9d077fc6a83e/jdcloud_sdk-1.6.39.tar.gz)  
下载SDK后， 解压包，进入 ./jdcloud_sdk-1.6.39 目录 ，然后通过如下命令安装  
```
python setup.py install
```  

关于 python SDK 的最新版本号，请[查看](https://pypi.org/project/jdcloud-sdk/#history)  
<br><br>
**二. 示例代码**  

 ```
# coding=utf-8
from jdcloud_sdk.core.credential import Credential
from jdcloud_sdk.services.sms.client.SmsClient import SmsClient
from jdcloud_sdk.services.sms.apis.BatchSendRequest import BatchSendParameters, BatchSendRequest
from jdcloud_sdk.services.sms.apis.StatusReportRequest import StatusReportParameters, StatusReportRequest
from jdcloud_sdk.services.sms.apis.ReplyRequest import ReplyParameters, ReplyRequest
 
# 地域信息不用修改
regionId = 'cn-north-1'
# 请填写用户aksk （应用管理-概览 页面可以查看自己aksk）
access_key = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'
secret_key = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'
credential = Credential(access_key, secret_key)
client = SmsClient(credential)
 
 
# 发送
def testBatchSendMsg():
    try:
        # 设置模板Id
        templateId = 'bm_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'
        # 设置签名Id
        signId = 'qm_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'
        # 设置发送手机号
        phoneList = ['186xxxxxxxx', '183xxxxxxxx']
        parameters = BatchSendParameters(regionId=regionId, templateId=templateId,
                                         signId=signId, phoneList=phoneList)
        # 设置模板参数， 非必填
        params = []
        parameters.setParams(params=params)
        request = BatchSendRequest(parameters)
        resp = client.send(request)
        if resp.error is not None:
            print(resp.error.code, resp.error.message)
        print(resp.result)
    except Exception as e:
        print(e)
        # 错误处理
 
 
# 查询状态报告
def testStatusReport():
    try:
        # 设置序列号。序列号从下发接口response中获取
        sequenceNumber = '1227185xxxxxxxxxxxxxx'
        parameters = StatusReportParameters(regionId=regionId, sequenceNumber=sequenceNumber)
        # 设置需要获取回执的手机号码列表，非必传
        # phoneList = []
        # parameters.setPhoneList(phoneList=phoneList)
        request = StatusReportRequest(parameters)
 
        resp = client.send(request)
        if resp.error is not None:
            print(resp.error.code, resp.error.message)
        print(resp.result)
    except Exception as e:
        print(e)
 
 
# 查询回复信息
def testReply():
    try:
        # 设置应用Id
        appId = '22ed9c2xxxxxxxxxxxxxxxxxxx'
        # 设置查询时间
        dataDate = 'xxxx-xx-xx'
        parameters = ReplyParameters(regionId=regionId, appId=appId, dataDate=dataDate)
        # 设置查询手机号
        phoneList = []
        parameters.setPhoneList(phoneList=phoneList)
        request = ReplyRequest(parameters)
        resp = client.send(request)
        if resp.error is not None:
            print(resp.error.code, resp.error.message)
        print(resp.result)
    except Exception as e:
        print(e)
 
 
if __name__ == '__main__':
    # 发送短信
    testBatchSendMsg()
    # 查询状态报告
    # testStatusReport()
    # 查询回复信息
    # testReply()
 ```
