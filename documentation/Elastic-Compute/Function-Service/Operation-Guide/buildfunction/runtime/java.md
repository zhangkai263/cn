# Java
函数服务前支持以下Java运行环境：

Java 8 ( 支持 Java 8 版本 )

## 使用说明

Java 语言需要编译后才可在容器中运行。因此在函数服务中的使用方式，和 Python、Node.js 这类脚本型语言不同，有如下限制：

- 不支持上传代码：使用 Java 语言，仅支持上传已经开发完成，编译打包后的 jar 包。function 环境不提供 Java 的编译能力。
- 不支持在线编辑：不支持直接上传代码，所以不支持在线编辑代码。Java 运行时的函数，在函数详情页只可上传新的 jar 包。



## 处理程序

由于 Java 包含有包的概念，因此处理程序和其他语言有所不同，需要带有包信息。

**函数执行入口 Handler” 的格式为 {package}.{class}::{method}** 。包名和类名可以是任意的，但是需要与创建函数时的 “Handler” 字段相对应，类方法必须为handleRequest。


用户使用Java编程时，需要实现函数服务的接口类，包括以下2个预定义接口可以选择：

1.`StreamRequestHandler`以流的方式接受输入event和返回执行结果，用户需要从`inputStream`中读取调用函数时的输入，处理完成后把函数执行结果写入到outputStream中返回。

2.`PojoRequestHandler`通过泛型的方式，用户可以自定义输入和输出的类型，但必须是`POJO`类型。

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

代码例子中对应的函数执行入口 Handler为 : example.HelloFC::handleRequest，此处 example 为 Java package，HelloFC 为类，handleRequest 为类方法。                    
用户的代码中必须要实现函数服务预定义的接口。上面的例子中实现了StreamRequestHandler，其中， inputStream 参数是调用函数时传入的数据，outputStream 用于返回函数的执行结果。



### PojoRequestHandler
一个简单的处理函数定义如下：

```Java
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


```Java
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

```Java
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

测试事件如下：
```JSON
{
  "firstName": "FunctionService",
  "lastName": "JDcloud"
}

```
返回如下：

```Java

"message":"Hello, FunctionService JDcloud"

```


## 入参

事件入参和函数返回目前支持的类型包括 Java 基础类型和 POJO 类型；函数运行时目前为`com.jdcloud.function.Context` 类型。

- 事件入参及返回参数类型支持
1. Java 基础类型，包括 byte，int，short，long，float，double，char，boolen 这八种基本类型和包装类，也包含 String 类型。           
2. POJO 类型，Plain Old Java Object，您应使用可变 POJO 及公有 getter 和 setter，在代码中提供相应类型的实现。
- Context 入参              
使用 Context 需要在代码中使用 `com.jdcloud.function.Context`; 引入包，并在打包时带入 jar 包。

**引入接口库说明**

代码中引用的` com.jdcloud.function ` 依赖包，可通过以下 pom.xml引用：

```
<dependency>
    <groupId>com.jdcloud.function</groupId>
    <artifactId>java-runtime</artifactId>
    <version>1.0.0</version>
</dependency>

```

通过[ maven ](https://mvnrepository.com/artifact/com.jdcloud.function/java-runtime) 仓库可获取java-runtime的最新版本号，亦可直接下载添加打入 jar 包。

## 部署包上传

请使用 Maven 创建 jar 部署包，或使用IDEA打包jar。

创建完成后，可通过控制台页面直接上传（小于50M），完成部署包提交。


