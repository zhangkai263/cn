# 公共代理库

## 代理库列表

京东云制品库提供了对maven公共库的代理功能，仓库列表可以在公共代理库页面查看。


## 配置指南

### maven配置指南

在maven的配置文件settings.xml中增加mirror节点，如下：

```
<mirror>
    <id>jdrepomaven</id>
    <mirrorOf>*</mirrorOf>
    <name>jdcloud-proxy</name>
    <url>https://maven.jdcloud.com/repos/content/groups/public/</url>
</mirror>

```
也可以继续在repository节点增加其他代理库，以gradle-plugin为例:

```
<repository>
    <id>gradle-plugin</id>
    <url>https:///maven.jdcloud.com/repos/content/repositories/gradle-plugin/</url>
    <releases>
        <enabled>true</enabled>
    </releases>
    <snapshots>
        <enabled>true</enabled>
    </snapshots>
</repository>

```

### gradle配置指南
在build.gradle中加入如下代码:

```
allprojects {
    repositories {
        maven { url 'https://maven.jdcloud.com/repos/content/groups/public/' }
        mavenLocal()
        mavenCentral()
    }
}
```

也可以继续增加其他代理仓库，以gradle-plugin为例：
```
allProjects {
    repositories {
        maven { url 'https://maven.jdcloud.com/repos/content/groups/public/' }
        maven { url 'https://maven.jdcloud.com/repos/content/repositories/gradle-plugin/'}
        mavenLocal()
        mavenCentral()
    }
}
```

