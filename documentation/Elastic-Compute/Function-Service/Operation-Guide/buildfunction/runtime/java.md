# Java
函数服务前支持以下Java运行环境：

Java 8 ( 支持 Java 8 版本 )

## 使用说明

Java 语言由于需要编译后才可以在 JVM 虚拟机中运行。因此在函数服务中的使用方式，和 Python、Node.js 这类脚本型语言不同，有如下限制：

- 不支持上传代码：使用 Java 语言，仅支持上传已经开发完成，编译打包后的 jar 包。function 环境不提供 Java 的编译能力。
- 不支持在线编辑：不支持直接上传代码，所以不支持在线编辑代码。Java 运行时的函数，在函数详情页只可上传新的jar包。

## 处理程序

由于 Java 包含有包的概念，因此处理程序和其他语言有所不同，需要带有包信息。代码例子中对应的执行方法为 example.HelloFC::handleRequest，此处 example 标识为 Java package，HelloFC 标识为类，handleRequest 标识为类方法。

```
package example;

public class HelloFC {
    public String mainHandler(String name) {
        System.out.println("Hello world!");
        return String.format("HelloEC %s.", name);
    }
}
```


## 入参
