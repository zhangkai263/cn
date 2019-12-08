# AI模型转换操作指南

#### 1 确认已安装 OpenVINO

#### 2 配置 Model Optimizer

2.1 配置所有框架

```shell
cd /opt/intel/openvino/deployment_tools/model_optimizer/install_prerequisites
```

注意：/opt/intel/openvino 为安装openvino的默认路径，如果您安装 openvino 时使用的是自定义路径，则替换为 <INSTALL_DIR>

```shell
install_prerequisites.sh
```

2.2 配置特定框架

Caffe：

```shell
install_prerequisites_caffe.sh
```

TensorFlow：

```shell
install_prerequisites_caffe.sh
```

MXNet：

```shell
install_prerequisites_mxnet.sh
```

Kaldi：

```shell
install_prerequisites_kaldi.sh
```

ONNX：

```shell
install_prerequisites_onnx.sh
```

#### 3 启动 Model Optimizer 进行转换

```shell
cd /opt/intel/openvino/deployment_tools/model_optimizer
python3 mo.py --input_model INPUT_MODEL
```

For example:

```shell
python3 mo.py --input_model /home/quxinghe/Downloads/VGG_coco_SSD_300x300_iter_400000.caffemodel
```

注意：以转换 Caffe 模型为例，如果 .prototxt 和 .caffemodel 的文件名不同或者放在不同的目录下，则需要指定 .prototxt 的路径

```shell
python3 mo.py --input_model /home/quxinghe/Downloads/VGG_coco_SSD_300x300_iter_400000.caffemodel --input_proto /home/quxinghe/Downloads/deploy.prototxt
```

