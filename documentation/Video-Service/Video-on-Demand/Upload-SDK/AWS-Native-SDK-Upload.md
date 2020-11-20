# 功能介绍

京东云视频点播支持使用AWS原生SDK进行媒资文件的上传，默认使用分片上传，最大支持48.8TB的单个文件，且支持断点续传，旨在让客户方便、快速实现媒体文件的上传。

# 准备工作

请确认您已开通了视频点播服务，如未开通，请参考[开通服务](https://github.com/jdcloudcom/cn/blob/edit/documentation/Video-Service/Video-on-Demand/Getting-Started/Service-Provisioning.md)。

# 上传步骤
![](https://github.com/jdcloudcom/cn/blob/cn-Video-On-Demand/image/Video-on-Demand/AWS%E5%8E%9F%E7%94%9FSDK%E4%B8%8A%E4%BC%A0%E6%AD%A5%E9%AA%A4.png)

**访问点播SDK获取上传地址和上传凭证信息，包含如下字段：**

<table>
<tr>
    <td>变量名</td>
    <td>含义</td>
</tr>
<tr>
    <td>videoId</td>
    <td>媒资ID,token过期后可用于刷新上传地址和凭证 </td>
</tr>
<tr>
    <td>uploadUrl</td>
    <td>上传链接，可直接put上传小文件</td>
</tr>
<tr>
    <td>authToken</td>
    <td>Base64编码后的上传凭证</td>
</tr>                
</table>

**使用Base64 解析上传凭证(authToken)，得到OSS的上传地址和授权信息**

authToken字段Base64解码后，得到JSON格式字符串，包含字段如下：
<table>
<tr>
    <td>变量名</td>
    <td>含义</td>
</tr>
<tr>
    <td>accessKey</td>
    <td>点播系统ak</td>
</tr>
<tr>
    <td>secretKey</td>
    <td>点播系统sk</td>
</tr>
<tr>
    <td>sessionToken</td>
    <td>鉴权token</td>
</tr>
<tr>
    <td>expiration</td>
    <td>过期时间</td>   
</tr>
<tr>
    <td>endpoint</td>
    <td>OSS 区域地址</td>
</tr>
<tr>
    <td>region</td>
    <td>OSS 区域</td>
</tr>
<tr>
    <td>bucket</td>
    <td>OSS Bucket名称</td>
</tr>
<tr>
    <td>objectKey</td>
    <td>媒体文件OSS位置</td>
</tr>                
</table>

**调用AWS SDK将视频文件上传至指定bucket的指定位置，（使用解析后的上传地址和授权信息初始化AWS客户端，不要使用自己的AccessKey等信息）。**

# 代码实现
**核心代码实现共分4步：**

1.使用AKSK初始化VOD客户端   
2.获取视频上传地址和凭证   
3.解析并使用上传凭证和地址初始化AWS客户端    
4.上传本地文件

使用AWS SDK在服务端上传，可参考如下版本：
# JAVA上传示例
**安装依赖**
```
<dependency>
    <groupId>com.amazonaws</groupId>  
    <artifactId>aws-java-sdk-s3</artifactId>  
    <version>1.11.136</version>  
</dependency>
```
**分片上传**

对于大文件，可以切分成片上传，分片上传(Multipart Upload)分为如下3个步骤：  
1.初始化一个分片上传任务（InitiateMultipartUpload）  
调用ossClient.initiateMultipartUpload方法返回OSS创建的全局唯一的uploadId。

2.逐个或并行上传分片（UploadPart）  
调用ossClient.uploadPart方法上传分片数据。

注意：    
A.OSS会将服务器端收到Part数据的MD5值放在ETag头内返回给用户。   
B.Part号码的范围是1~10000。如果超出这个范围，将返回400 ,错误码：TooManyParts。   
C.每次上传part时都要把流定位到此次上传块开头所对应的位置。   
D.每次上传part之后，OSS的返回结果是一个UploadPartResult对象，他是包含上传块的ETag与块编号（PartNumber）的组合.  
E.在后续完成分片上传的步骤中会用到它，因此我们需要将其保存起来。一般来讲我们将这些 UploadPartResult对象保存到List中。   

3.完成分片上传（CompleteMultipartUpload)     
所有分片上传完成后，调用ossClient.completeMultipartUpload方法将所有分片合并成完整的文件。   
在执行该操作时，需要提供所有有效的分片列表（包括分片号和分片ETAG）；OSS收到提交的分片列表后，会逐一验证每个分片的有效性。当所有的数据Part验证通过后，OSS将把这些分片组合成一个完整的Object。

**完整示例**
```
/**
 * Created on 一月 06, 2020.
 *
 * @author Zhangxi19
 */
public class Upload {
    private static final Logger logger = LoggerFactory.getLogger(Upload .class);

    public static void main(String[] args) {
        //通过点播sdk vodClient.createVideoUploadTask或vodClient.refreshVideoUploadTask ,从结果中可获取上传凭证authToken,
        //用base64解析后可得到具体的上传凭证，该凭证可用于创建aws的客户端，完成分片上传
        String region = "region";
        String endpoint = "endpoint";
        String bucket = "bucket";
        String accessKey = "accessKey";
        String secretKey = "secretKey";
        String token = "token";
        String objectKey = "objectKey";
        String localFile = "localFile";
        multipartUpload(region, endpoint, accessKey, secretKey, token, bucket, objectKey, localFile);
    }

    public static void multipartUpload(String region, String endpoint, String accessKey, String secretKey, String token, String bucket, String objectKey, String localFile) {

        AmazonS3 ossClient = initAwsClient(region, endpoint, accessKey, secretKey, token, Protocol.HTTP);
        try {
            File partFile = new File(localFile);
            String md5 = Md5Utils.md5AsBase64(partFile);
            logger.info("md5={}", md5);
            // 初始化分片上传
            InitiateMultipartUploadRequest partRequest = new InitiateMultipartUploadRequest(bucket, objectKey);
            ObjectMetadata objectMetadata = new ObjectMetadata();
            // 以具体视频源为准
            objectMetadata.setContentType("video/mp4");
            objectMetadata.setContentMD5(md5);
            partRequest.setObjectMetadata(objectMetadata);
            InitiateMultipartUploadResult initiateMultipartUpload = ossClient.initiateMultipartUpload(partRequest);
            String key = initiateMultipartUpload.getKey();
            String uploadId = initiateMultipartUpload.getUploadId();
            String bucketName = initiateMultipartUpload.getBucketName();

            logger.info("InitiateMultipartUploadResult,bucket={},key={},uploadId={}", bucket, key, uploadId);
            //根据实际需求确定分片大小
            final int partSize = 1024 * 1024 * 5;
            int partCount = (int) (partFile.length() / partSize);
            if (partFile.length() % partSize != 0) {
                partCount++;
            }
            // 创建对象的Etag列表，并取回每个分片的Etag。
            List<PartETag> partETagList = new ArrayList<>();
            for (int i = 0; i < partCount; i++) {
                FileInputStream fis = new FileInputStream(partFile);
                long skipBytes = partSize * i;
                fis.skip(skipBytes);

                long size = Math.min(partSize, partFile.length() - skipBytes);
                logger.info("partSize={}", size);
                UploadPartRequest uploadPartRequest = new UploadPartRequest();
                uploadPartRequest.setBucketName(bucketName);
                uploadPartRequest.setKey(key);
                uploadPartRequest.setUploadId(uploadId);
                uploadPartRequest.setInputStream(fis);
                uploadPartRequest.setPartSize(size);
                uploadPartRequest.setPartNumber(i + 1);
                // 上传分片并将返回的Etag加入列表中
                UploadPartResult uploadPartResult = ossClient.uploadPart(uploadPartRequest);
                PartETag partETag = uploadPartResult.getPartETag();
                partETagList.add(partETag);
                logger.info("uploadPartResult={}", JSON.toJSON(uploadPartResult));
                fis.close();
            }
            Collections.sort(partETagList, new Comparator<PartETag>() {
                public int compare(PartETag p1, PartETag p2) {
                    return p1.getPartNumber() - p2.getPartNumber();
                }
            });
            //完成上传
            CompleteMultipartUploadRequest completeMultipartUploadRequest = new CompleteMultipartUploadRequest(bucket, objectKey, uploadId, partETagList);
            Map<String, String> customRequestHeaders = completeMultipartUploadRequest.getCustomRequestHeaders();
            CompleteMultipartUploadResult uploadResult = ossClient.completeMultipartUpload(completeMultipartUploadRequest);
            ossClient.shutdown();

            logger.info("CompleteMultipartUploadResult={},customRequestHeaders={}", JSON.toJSON(uploadResult), customRequestHeaders);
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public static AmazonS3 initAwsClient(String region, String endpoint, String accessKey, String secretKey, String token, com.amazonaws.Protocol protocol) {
        BasicSessionCredentials basicSessionCredentials = new BasicSessionCredentials(accessKey, secretKey, token);
        ClientConfiguration config = new ClientConfiguration();
        config.setProtocol(protocol);
        AwsClientBuilder.EndpointConfiguration endpointConfig = new AwsClientBuilder.EndpointConfiguration(endpoint, region);

        AWSCredentialsProvider awsCredentialsProvider = new AWSStaticCredentialsProvider(basicSessionCredentials);
        return AmazonS3Client.builder()
                .withEndpointConfiguration(endpointConfig)
                .withClientConfiguration(config)
                .withCredentials(awsCredentialsProvider)
                .disableChunkedEncoding()
                .withPathStyleAccessEnabled(true)
                .build();
    }
}
```
