## 简单视频编辑示例

1.在布局文件中加入预览视频的View, 当前支持GLSurfaceView：
```
<RelativeLayout
            android:id="@+id/preview_layout"
            android:layout_width="match_parent"
            android:layout_height="match_parent"
            android:background="@color/white">
            <android.opengl.GLSurfaceView
                android:id="@+id/edit_preview"
                android:layout_width="match_parent"
                android:layout_height="match_parent" />
            <com.jdcloud.media.shortvideo.sticker.StickerView
                android:id="@+id/sticker_panel"
                android:layout_width="fill_parent"
                android:layout_height="fill_parent"
                android:layout_gravity="center"
                android:visibility="gone" />
        </RelativeLayout>
``` 
注：StickerView是贴纸的view。  
2.利用ButterKnife初始化预览View：
```
    @BindView(R.id.edit_preview)
GLSurfaceView mEditPreviewView; 
```

3.创建视频编辑类JDCloudVideoEdit实例并配置相关参数，在时间线上添加视频：
```
 JDVideoEditParam param = new JDVideoEditParam.Build().build();
 param.setRatio(Constants.SCALE_TYPE_9_16);//设置视频的比例
 mVideoEdit = new JDCloudVideoEdit(this, param); //实例化mVideoEdit

JDTimeLine  mMainTimeLine =mVideoEdit.createTimeLine();//建立时间线
AudioTrack audioTrack = mMainTimeLine.getAudioTrackByIndex(1);//添加音频
audioTrack.appendClip(audioClip);
audioTrack.setVolume(audioVolume, audioVolume);

VideoTrack videoTrack = mMainTimeLine.initVideoTrack();//添加视频
VideoClip videoClip = new VideoClip.Builder()；
videoTrack.appendClip(videoClip);
videoTrack.setVolume(videoVolume, videoVolume);

mVideoEdit.initVideoClip();//初始化所有的视频信息；

mVideoEdit.setDisplayView(mEditPreviewView); // 设置预览view
```

4.添加预览监听，开始预览:
```
在开始预览时候可以同时添加预览监听
        mVideoEdit.startPreview(new EditorPlayerListener(){
            @Override
            public void onVideoSizeChanged(int width, int height) {
                //视频大小发生变化的回调
            }

            @Override
            public void onStateChanged(int var1) {//播放器状态改变回调，//EditorPlayerStatus枚举类保存了所有的状态，var1是status.ordinal()，如：//EditorPlayerStatus. Playing.ordinal();
            }

            @Override
            public void onProgress(long var1, long var4) {
//播放进度回调
            }

            @Override
            public void onCompleted() {
//播放完成的回调
            }
        }); 
```

5.预览播放，暂停，seek:
```
mVideoEdit.pause()；//暂停预览
mVideoEdit.seekTimeLine(TimeLineUtil.getMainTimeLine(), 0);//seek指定timeline上的视频//到某个时间，单位：毫秒
mVideoEdit.play();//暂停后重新播放
```

6.Activity生命周期的回调处理：
```
public class VideoEditActivity extends Activity {
    @Override
    public void onResume() {
        super.onResume();
        if (mVideoEdit != null) {
            mVideoEdit.onResume();
        }
        }
    @Override
public void onPause() {
    if (mVideoEdit != null) {
      mVideoEdit.pause();
    }
        super.onPause();
    }

    @Override
    public void onDestroy() {
        if (mVideoEdit != null) {
            mVideoEdit.stopPreview();
            mVideoEdit.onDestroy();
        }
super.onDestroy();
    }
}
```

## 更多接口

* **视频编辑**
```
mVideoEdit.updateSource(index,currentClip,oldDration);//更新指定视频，currentClip是新视频信息，oldDration是更新前index处视频的时长。

mMainEdit.addSource(index,videoClip);//在指定位置添加视频

mMainEdit.deleteSource(index,deleteDuration);//删除指定位置的视频，deleteDuration是要删除的视频的时长

mVideoEdit.setSpeed(speed);//设置变速，speed可选参数：0.5、0.75、1、1.5、2

mVideoEdit.setRotation(mRotateDegrees);//设置旋转，旋转角度：0、90、180，270；
```

* **滤镜**  
```
ImgFilterBase filter = new ImgBeautySpecialEffectsFilter(mVideoEdit.getGLRender(),
                        context, mEffectFilterIndex);
// mEffectFilterIndex为滤镜index，所有的可用滤镜在ImgBeautySpecialEffectsFilter中。
mVideoEdit.applyFilter(filter);//添加滤镜

mVideoEdit.replaceFilter(lastFilter, null, false);//移除滤镜
mVideoEdit.queueLastFrame();//暂停状态时，使得滤镜在预览区域立即生效
```

* **字幕贴纸**  

1.在xml中布局StickerView，参照：5.4. 简单视频编辑示例的第一步。并实例化StickerView
@BindView(R.id.sticker_panel)
StickerView mTickerView;  //贴纸预览区域（图片贴纸和字幕贴纸公用）

2.初始化字幕贴纸区域的外观：
```
StickerBox  mStickerBox = new StickerBox();
mStickerBox.setDelete(mStickerDeleteBitmap);//设置删除贴纸的图片
mStickerBox.setRotate(mStickerRotateBitmap);//设置旋转贴纸的图片
Paint helpBoxPaint = new Paint();
helpBoxPaint.setColor(Color.BLACK);
helpBoxPaint.setStyle(Paint.Style.STROKE);
helpBoxPaint.setAntiAlias(true);
helpBoxPaint.setStrokeWidth(4);
mStickerBox.setHelpBoxPaint(helpBoxPaint);//设置绘制贴纸区域的画笔
```

3.添加贴纸 
```
StickerConfig info = new StickerConfig();
//设置动态贴纸
info.setAnimateUrl("assets://AnimateSticker/1.gif");
info.setStickerType(StickerConfig.STICKER_TYPE.ANIMATE_IMAGE);
//设置静态贴纸
info.setBitmap(getImageFromAssetsFile(path));
info.setStickerType(StickerConfig.STICKER_TYPE.IMAGE);

//字幕贴纸的文字相关信息
StickerText textParams = new StickerText();
textParams.setTextPaint(new TextPaint());//设置字体画笔
textParams.getTextPaint().setTextSize(2 * Constants.DEFAULT_TEXT_SIZE);
textParams.getTextPaint().setColor(mTickerView.getCurrentTextColor());
textParams.getTextPaint().setTextAlign(Paint.Align.LEFT);
textParams.getTextPaint().setStyle(Paint.Style.FILL);
textParams.getTextPaint().setAntiAlias(true);
textParams.getTextPaint().setTypeface(typeface);//设置字体类型
textParams.setText(getResources().getString(R.string.subtitle_text));
textParams.setAutoNewLine(true);//设置自动换行
info.setTextParams(textParams);

//添加贴纸到视频上（一次设置只能添加一个贴纸）
info.setStartTime(0);//设置贴纸在视频上展示的开始时间
info.setDuration(3000);//设置展示贴纸的时长
stickerId = mTickerView.addSticker(info, mStickerBox);//返回贴纸的id，可以利用该id访问到贴纸。
```

4.其他操作
```
mTickerView.removeTextStickers();//移除所有的字幕
mTickerView.removeBitmapStickers();//移除所有的静态贴纸
mTickerView.removeAnimateStickers();//移除所有的动态贴纸
mTickerView.removeSticker(stickerId);//根据stickerId移除贴纸

//添加贴纸操作的回调
mTickerView.setOnStickerSelected(new StickerView.OnStickerStateChanged() {
@Override
public void selected(int index, String text) {
}//某个贴纸被选中，text若为非null说明为字幕贴纸
@Override
public void deleted(List<Integer> list, String text) {
//贴纸被删除的回调，text若为非null说明为字幕贴纸
        });
```

* **背景音乐**  
```
mVideoEdit.setMusicRange(0, newDur, true);//设置背景音乐在整个时间线的开始和结束时间
mVideoEdit.applyMusic(new AudioClip(audioPath, duration));//设置背景音乐
mVideoEdit.setMusicVolume(0.3f);//设置背景音乐的音量

mVideoEdit.removeMusic(new AudioClip(null, 0));//移除背景音乐
```

* **合成** 

1.合成参数配置
```
JDVideoEditParam mComposeConfig = new JDVideoEditParam.Build().build();
mComposeConfig.setResolutionMode(BaseConstants.VIDEO_RESOLUTION_360P);//设置生成视频的分辨率
mComposeConfig.setFrameRate(25);//设置帧率[10-60]
mComposeConfig.setVideoBitrate(10000);// 设置码率[128-10000]
```

2.开始合成：
```
mVideoEdit.compose(mComposeConfig,videoPath, new IComposeCallback() {
            @Override
            public void onProgress(final float progress) {
//合成进度，progress为1时，合成完成
                        }
                    }
                });
            }
            @Override
            public void onErrors(int errorCode, String errorMsg) {
//合成出错的回调
                          }

            @Override
            public void onFinish() {//合成完成
            }
        });
//videoPath是导出视频的路径
```

3.设置监听，接收合成过程中的回调
```
    private BaseListener mBaseListener = new BaseListener() {
        @Override
        public void onMessage(int what, String msg) {
            switch (what) {
                 case Constants.VIDEO_COMPOSE_START: {//开始合成
                    mVideoEdit.pausePreview();
                    if (mComposeProgressRl != null) {
                        mComposeProgressRl.setVisibility(View.VISIBLE);
                    }
                    break;
                }
                case Constants.VIDEO_COMPOSE_FINISHED: {//合成完成
                    LogUtil.d(TAG, "compose finished");
                    if (mComposeProgressRl != null) {
                        mComposeProgressRl.setVisibility(View.GONE);
                    }
                    isComposing = false;
                    break;
                }
                case Constants.VIDEO_COMPOSE_ABORTED://合成取消
                    LogUtil.d(TAG, "compose aborted by user");
                    isComposing = false;
                    break;
                default:
                    break;
            }
        }

        @Override
        public void onError(int errorCode, String errorMsg) {
            isComposing = false;
            switch (errorCode) {
                case Constants.ERROR_COMPOSE_FAILED_UNKNOWN:
                case Constants.ERROR_COMPOSE_FILE_CLOSE_FAILED:
                case Constants.ERROR_COMPOSE_FILE_FORMAT_NOT_SUPPORTED:
                case Constants.ERROR_COMPOSE_FILE_OPEN_FAILED:
                case Constants.ERROR_COMPOSE_FILE_WRITE_FAILED:
                    LogUtil.d(TAG, "compose failed:" + errorCode);
                default:
                    break;
            }
        }
    };
mVideoEdit.setBaseListener(mBaseListener);
```
