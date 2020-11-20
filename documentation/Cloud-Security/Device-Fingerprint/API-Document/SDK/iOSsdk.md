# 设备指纹SDK iOS接入

本文档介绍了设备指纹服务SDK（iOS系统）的接入流程。

1.下载[iOS SDK](https://eid-console.jdcloud.com/settings/access)，并完成解压。选择**工程配置**，修改***\*Build Phases\** > \**Link Binary With Libraries\****，添加deviceiOS.framework依赖包：在添加Build Phases中添加 

```
libstdc++.dylib
```

2.增加 Build Setting 中 Other link Flag 中添加 -ObjC

3.将 SDK JDBFingerPrintModule.framework 拖入工程

4.在启动的时候配置信息

```
 [JDBFingerPrintModule configHost:@"https://eid-api.jdcloud.com" appKey:@"xxx" userPin:@"xxx"];
```

5.获取设备指纹

```
  [[JDBFingerPrintModule sharedInstance] fetchCUIDOnComplete:^(NSString *cuid, NSError *error) {
        if(cuid.length > 0){
            self.label.text = cuid;//cuid 就是设备指纹
        }else{
            self.label.text = @"未获取到设备指纹";
        }

}];
```


