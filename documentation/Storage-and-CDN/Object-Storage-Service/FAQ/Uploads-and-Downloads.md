# 上传与下载

[OSS对上传和下载带宽是否有限制？](Uploads-and-Downloads#user-content-1)

[上传文件至存储空间，已存在同名文件，是直接覆盖还是新增不同版本的文件？](Uploads-and-Downloads#user-content-2)

[上传文件的限制](Uploads-and-Downloads#user-content-3)

------

<div id="user-content-1"></div>

#### OSS对上传和下载带宽是否有限制？

请参见[限制说明](../Introduction/Restrictions.md)

<div id="user-content-2"></div>

#### 上传文件至存储空间，已存在同名文件，是直接覆盖还是新增不同版本的文件？

OSS对象存储允许用户上传同名文件，上传相同名称的文件至存储空间，会直接覆盖已存在的同名文件。

<div id="user-content-3"></div>

#### 上传文件的限制

1. 通过控制台上传的文件大小不能超过5GB；
2. 使用普通上传或分片上传，单个文件或者分片大小不能超过5GB；
3. 要上传大小超过5GB的文件必须使用分片上传方式，分片方式上传的文件大小不能超过48.8TB；
4. 如您要上传的文件大于5GB，请通过对象存储 API或SDK的方式上传。
