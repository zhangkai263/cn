 ## 一、开发环境简要介绍
 
 > 开发语言为：Java； JDK版本为: 1.8 ； 项目底层框架为：SpringBoot ； 项目管理工具为：Maven3 ；开发工具为Intellij IDEA
 
 > 准备工作
 
 1,下载JDK1.8，配置Java环境变量
 
 2,下载Maven3,配置Maven环境变量
 
 3,下载Intellij IDE或Eclipse开发工具
 
 4,搭建SpringBoot微服务框架，开发合约
 
 ## 二、合约编写步骤
 
 ### 1,初始化一个springboot框架
 
 (1).File -> New ->Project -> 左菜单选择"Spring Initializr";右侧设置JDK版本为1.8以上即可.其他选项默认,Next...
 
 (2).填写项目的元数据信息，注意：Java Version选择8。填写完成后选择Next...
 
 (3).Dependencies部分可不必选择，可选择右上角部分Spring Boot的版本号。本项目应用Spring Boot2.3.1.RELEASE。直接Next...
 
 (4).填写项目名称和项目存储位置即可。具体生成的Maven配置，详情见pom.xml文件。
 
 **注意：pom.xml中一定要"删除"关于springboot相关依赖，否则部署合约会有问题。如下部分删除掉: **
 
     <dependency>
         <groupId>org.springframework.boot</groupId>
         <artifactId>spring-boot-starter-web</artifactId>
     </dependency>
     <dependency>
         <groupId>org.springframework.boot</groupId>
         <artifactId>spring-boot-starter</artifactId>
     </dependency>
     
 ### 2,修改pom.xml，增加合约相关依赖及插件
 
 填写编写合约依赖包，及合约编译、打包、发布的插件。如下：
 
      <!-- 编写合约依赖包 -->
      <properties>
         <ledger.version>1.4.2.RELEASE</ledger.version>
       </properties>
      <dependency>
         <groupId>com.jd.blockchain</groupId>
         <artifactId>contract-starter</artifactId>
         <version>${ledger.version}</version>
         <scope>provided</scope>
     </dependency>
     
      <!-- 合约编译、打包、发布插件 -->
     <plugin>
         <groupId>com.jd.blockchain</groupId>
         <artifactId>contract-maven-plugin</artifactId>
         <version>${ledger.version}</version>
         <extensions>true</extensions>
     </plugin>
     
 ### 3,编写合约接口及实现类
 
 目录src/main/java/contract下创建接口类ContractInf.java及接口实现类ContractImpl.java
 
 **注意：JDChain合约编写目前有限制，避免使用第三方依赖(尤其有使用反射，注解等)，如fastJson等。最好使用原生代码实现。**
 
 **请关注：**
 
 >1，接口类注解必须为@Contract
 
 >2，接口类合约方法定义注解必须为@ContractEvent(name="xxx")，name为自定义的合约方法名称，外部通过该注解名称找到对应的合约方法。(具体方法名称与注解名称可以不一致)
 
 >3, JDChain合约参数目前仅支持Java8种基本数据类型，不支持数组等对象。建议：使用String、long、int、[]byte类型。
 
 >4，接口实现类必须要实现EventProcessingAware

 >5, 通过Baas平台前端上传合约，调用合约，查询合约时，合约编写规则：

    @Contract
    public interface ContractInf {
        @ContractEvent(name = "put")
        String putValue(String dataAccount, String ledger, String putKey, long putValue);
        @ContractEvent(name = "get")
        String getValue(String dataAccount, String ledger, String putKey);
    }
    
    以上注意参数规则：
    
    JDChain区块链数据存储规则均为key:value键值对形式。通过Baas前端调用合约时参数给定规则如下:
    
    (1).向区块链写入数据：第一个参数为数据账户地址；第二个参数为账本Hash值;第三个参数为写到链的上key值；第四个参数为写到链上的value值
    
    (2).从区块链根据key值查询数据：第一个参数为数据账户地址；第二个参数为账本Hash值;第三个参数为查询的key值
    
    以上，value值为支持的Java8种数据类型即可。常用string(json格式)或byte[]，可能合约内部解析再处理。

 ### 4,Maven编译打包
 
      $ mvn clean package -X -Dmaven.skip.test=true
      
      此时，在target/目录下，会生成对应的合约.car包，将此.car包发布到JDChain区块链网络即可。
 
 ## 三、智能合约调试和测试
 
 >说明:智能合约部署方式
 
 1,通过Baas平台安装、部署及调用/查询合约
 
 2,通过调用JDChain SDK部署合约
 
     JDChain SDK(Java)示例，可以使用官网发布的项目"jdchain-starter"，核心代码如下所示：
     
     @Test //发布合约
     public void testPublishContract(){
         //生成合约地址
         BlockchainKeypair contractDeployKey = BlockchainKeyGenerator.getInstance().generate();
         //将jar包转换为二进制数据,JarPath为合约编译生成的.car包所有路径
         byte[] contractCode = getChainCode(JarPath);
         TransactionTemplate txTpl = blockchainService.newTransaction(ledgerHash);
         //生成发布合约操作
         txTpl.contracts().deploy(contractDeployKey.getIdentity(), contractCode);
         //提交交易
         TransactionResponse txResp = commit(txTpl);
         System.out.println("txResp.isSuccess():"+txResp.isSuccess());
     }
     
     //获取链码
     public byte[] getChainCode(String path) {
         byte[] chainCode = null;
         File file;
         FileInputStream input = null;
         try {
             file = new File(path);
             input = new FileInputStream(file);
             chainCode = new byte[input.available()];
             input.read(chainCode);
         } catch (IOException var14) {
             var14.printStackTrace();
         } finally {
             try {
                 if (input != null) {
                     input.close();
                 }
             } catch (IOException var13) {
                 var13.printStackTrace();
             }
 
         }
         return chainCode;
     }
