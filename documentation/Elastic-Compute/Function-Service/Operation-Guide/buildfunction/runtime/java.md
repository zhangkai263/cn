# Java
函数服务前支持以下Java运行环境：

Java 8 ( 支持 Java 8 版本 )

## 使用说明

Java 语言由于需要编译后才可以在 JVM 虚拟机中运行。因此在函数服务中的使用方式，和 Python、Node.js 这类脚本型语言不同，有如下限制：

- 不支持上传代码：使用 Java 语言，仅支持上传已经开发完成，编译打包后的 jar 包。function 环境不提供 Java 的编译能力。
- 不支持在线编辑：不支持直接上传代码，所以不支持在线编辑代码。Java 运行时的函数，在函数详情页只可上传新的 jar 包。

## 处理程序

### StreamRequestHandler
一个简单的处理函数定义如下：

```Java
package example;

        import com.jdcloud.function.Context;
        import com.jdcloud.function.StreamRequestHandler;

        import java.io.IOException;
        import java.io.InputStream;
        import java.io.OutputStream;
        import java.util.concurrent.TimeUnit;

public class HelloFC implements StreamRequestHandler {

    public void handleRequest(InputStream inputStream, OutputStream outputStream, Context context) throws IOException {
        outputStream.write(new String("hello world").getBytes());;
// inputStream.read();
        System.out.println("*************** " );
        {
            // write your code here

        }
    }
}
```
由于 Java 包含有包的概念，因此处理程序和其他语言有所不同，需要带有包信息。代码例子中对应的执行方法为 example.HelloFC::handleRequest，此处 example 标识为 Java package，HelloFC 标识为类，handleRequest 标识为类方法。


### PojoRequestHandler
一个简单的处理函数定义如下：

```
package example;

import com.jdcloud.function.Context;
import com.jdcloud.function.PojoRequestHandler;

public class HelloFC implements PojoRequestHandler<SimpleRequest, SimpleResponse> {
    @Override
    public SimpleResponse handleRequest(SimpleRequest request, Context context) {
        String message = "Hello, " + request.getFirstName() + " " + request.getLastName();
        return new SimpleResponse(message);
    }
}
```


```
package example;

public class SimpleRequest {
    String firstName;
    String lastName;
    public String getFirstName() {
        return firstName;
    }
    public void setFirstName(String firstName) {
        this.firstName = firstName;
    }
    public String getLastName() {
        return lastName;
    }
    public void setLastName(String lastName) {
        this.lastName = lastName;
    }
    public SimpleRequest() {}
    public SimpleRequest(String firstName, String lastName) {
        this.firstName = firstName;
        this.lastName = lastName;
    }
}

```

```
package example;
public class SimpleResponse {
    String message;
    public String getMessage() {
        return message;
    }
    public void setMessage(String message) {
        this.message = message;
    }
    public SimpleResponse() {}
    public SimpleResponse(String message) {
        this.message = message;
    }
}
```

准备调用的输入文件：
```
{
  "firstName": "FunctionService",
  "lastName": "JDcloud"
}

```
使用 fcli 调用结果：

```
>>> invk hello-java -f /tmp/a.json
{"message":"Hello, FunctionService JDcloud"}
>>>
```


## 入参

## 部署包上传

请使用 Maven 创建 jar 部署包。创建完成后，可通过控制台页面直接上传包（小于50M），完成部署包提交。

## 日志

您可以使用如下语句来打印日志输出，并在函数日志中查看输出：
```Java
System.out.println("Hello world!");
```
