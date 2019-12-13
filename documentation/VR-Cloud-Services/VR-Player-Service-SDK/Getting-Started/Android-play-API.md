## 简单集成示例

1.UI布局：  
```
<android.opengl.GLSurfaceView
   android:id="@+id/gl_view"
   android:layout_width="match_parent"
   android:layout_height="match_parent"
   android:background="@color/transparent"
   app:layout_constraintBottom_toBottomOf="parent"
   app:layout_constraintLeft_toLeftOf="parent"
   app:layout_constraintRight_toRightOf="parent"
   app:layout_constraintTop_toTopOf="parent" />
```
2.添加集成代码：  
```  
JDVRLibrary vrLibrary=JDVRLibrary.with(this)
                .displayMode(JDVRLibrary.DISPLAY_MODE_GLASS)
//设置眼睛模式
                .interactiveMode(JDVRLibrary.INTERACTIVE_MODE_MOTION)
//设置交互模式
                .asVideo(new JDVRLibrary.IOnSurfaceReadyCallback() {
//设置播放视频(还支持预览bitmap)
                    @Override
                    public void onSurfaceReady(Surface surface) {
				//以京东云播放器为例，把渲染后的surface设置给player
                        jdCloudPlayer.setSurface(surface);
                    }
                })
                .ifNotSupport(new JDVRLibrary.INotSupportCallback() {
                    @Override
                    public void onNotSupport(int mode) {
//不支持某种展示模式的回调
                    }
                })
                .build((GLSurfaceView) findViewById(R.id.gl_view));
//设置UI中的SurfaceView
```  

## SDK的使用

* **初始化JDVRLibrary**  
```
JDVRLibrary vrLibrary=JDVRLibrary.with(this)
                .displayMode(JDVRLibrary.DISPLAY_MODE_GLASS)
//设置眼睛模式, JDVRLibrary.DISPLAY_MODE_NORMAL为正常模式显示。
                .interactiveMode(JDVRLibrary.INTERACTIVE_MODE_MOTION)
//设置交互模式
                .asVideo(new JDVRLibrary.IOnSurfaceReadyCallback() {
//设置视频
                    @Override
                    public void onSurfaceReady(Surface surface) {
                        mMediaPlayerWrapper.setSurface(surface);
                    }
                })
                .ifNotSupport(new JDVRLibrary.INotSupportCallback() {
                    @Override
                    public void onNotSupport(int mode) {
//不支持某种模式的回调
                    }
                })
                .build((GLSurfaceView) findViewById(R.id.gl_view));
//设置UI中的SurfaceView
```
* **设置JDVRLibrary**  
JDVRLibrary是VR播放器sdk的核心类，创建JDVRLibrary时通过对Build对象的设置，可以实现播放VR视频的多重效果,也可以直接对JDVRLibrary进行设置：
1.设置镜头的缩进用PinchConfig，setDefaultValue传递的参数越大镜头越近 
```
JDVRLibrary.with(this)
.pinchConfig(new PinchConfig().setMin(1.0f).setMax(8.0f).setDefaultValue(0.1f))
.pinchEnabled(true)
.build((GLSurfaceView) findViewById(R.id.gl_view));
```
2.设置Vr视频初始方向：   
```
JDVRLibrary.with(this)
.directorFactory(new BaseDirectorFactory() {
                    @Override
                    public BaseDirector createDirector(int index) {
                        return BaseDirector.builder().setPitch(90).build();
                    }
                })
.build((GLSurfaceView) findViewById(R.id.gl_view));
```
3.设置裁剪比例, setScale传递的参数越小视频被裁剪的越多，即视频越小： 
```
JDVRLibrary.with(this)
                .barrelDistortionConfig(new BarrelDistortionConfig().setDefaultEnabled(false).setScale(0.95f))
.build((GLSurfaceView) findViewById(R.id.gl_view));
```
4.鱼眼模式切换：
开启后台播放后，当用户点击home按钮后，播放器进入后台继续读取数据并播放音频。当APP回到前台后，音频继续播放。  
```
if (vrLibrary.isAntiDistortionEnabled()) {
     vrLibrary.setAntiDistortionEnabled(false);
 } else { 
vrLibrary.setAntiDistortionEnabled(true);
 }
```
5.视频模式切换：  
```
if(mVRLibrary.getDisplayMode()==JDVRLibrary.DISPLAY_MODE_GLASS){
mVRLibrary.switchDisplayMode(this, JDVRLibrary.DISPLAY_MODE_NORMAL)
}
```
6.交互模式切换,示例转换为触摸交互： 
```
if(mVRLibrary.getInteractiveMode()==JDVRLibrary.INTERACTIVE_MODE_MOTION){
mVRLibrary.switchInteractiveMode (this, JDVRLibrary. INTERACTIVE_MODE_TOUCH)
}
```

* **activity生命周期中的调用**  
在activity的生命周期中，也要加入vrLibrary相应方法的调用，以便释放资源。示例代码如下：  
```
    @Override
    protected void onResume() {
        super.onResume();
        mVRLibrary.onResume(this);
    }

    @Override
    protected void onPause() {
        super.onPause();
        mVRLibrary.onPause(this);
    }

    @Override
    protected void onDestroy() {
        super.onDestroy();
        mVRLibrary.onDestroy();
    }

    @Override
    public void onConfigurationChanged(Configuration newConfig) {
        super.onConfigurationChanged(newConfig);
        mVRLibrary.onOrientationChanged(this);
    }
```
