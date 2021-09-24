# Android JRTC SDK 快速集成  
本文主要介绍如何快速的将JRTC集成到您的项目中，只要按照如下步骤进行配置，就可以完成SDK的集成工作。  

+ ## 开发环境要求
    Android Studio 3.5+

    Android 5.0 (SDK API 21) 及以上系统

+ ## 集成SDK
    JRTC SDK已发布到 artifactory.jd.com 库，您可以通过配置gradle自动下载更新。

    只需要用Android Studio 打开需要集成SDK的工程，然后通过简单的几个步骤

    1.第一步: 增加对 artifactory.jd.com 的maven引用

    在工程的yourProject/build.gradle文件中配置

    buildscript{
        repositories {
            maven { url "http://artifactory.jd.com/libs-releases-local/" }
            maven { url "http://artifactory.jd.com/libs-snapshots-local/" }        
        } 
    }

    allprojects{
        repositories{
            maven { url "http://artifactory.jd.com/libs-releases-local/" }
            maven { url "http://artifactory.jd.com/libs-snapshots-local/" }
        }
    }
   

    2.第二步: 增加对jrtc-android库的引用

    在app/build.gradle文件中配置

    增加对 com.jdcloud.jrtc:jrtc-android:x.x.xx-SNAPSHOT 库的引用

    3.第三步: 在defaultConfig中，指定APP使用的CPU架构
    ndk {
            abiFilters "armeabi","arm64-v8a", "armeabi-v7a"
        }

    4.第四步: 点击Sync Now，自动下载SDK并集成到工程中
+ ## 配置App权限
    在manifest中配置APP的权限，JRTC SDK需要以下权限<br>\<uses-permission android:name="android.permission.ACCESS_NETWORK_STATE" /><br>\<uses-permission android:name="android.permission.INTERNET" /><br>\<uses-permission android:name="android.permission.ACCESS_WIFI_STATE" /><br>\<uses-permission android:name="android.permission.WRITE_EXTERNAL_STORAGE" /><br>\<uses-permission android:name="android.permission.READ_EXTERNAL_STORAGE" /><br>\<uses-permission android:name="android.permission.RECORD_AUDIO" /><br>\<uses-permission android:name="android.permission.CAMERA" /><br>\<uses-permission android:name="android.permission.READ_PHONE_STATE" /><br>\<uses-permission android:name="android.permission.MODIFY_AUDIO_SETTINGS" /><br>\<uses-permission android:name="android.permission.BLUETOOTH_ADMIN" /><br>\<uses-permission android:name="android.permission.BLUETOOTH" /><br>\<uses-permission android:name="android.permission.READ_PHONE_STATE" /><br>\<uses-feature android:name="android.hardware.camera" /><br>\<uses-feature android:name="android.hardware.camera.autofocus" />
+ ## 设置混淆规则
    在 proguard-rules.pro 文件，将JRTC SDK 相关类加入不混淆名单：
    
    -keep class com.google.gson.** {*;}
    
    -keep class com.jdcloud.jrtc.** {*;}
