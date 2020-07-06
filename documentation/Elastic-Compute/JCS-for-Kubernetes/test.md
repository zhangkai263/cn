# 环境准备  

K8s部署在jdstack私有化环境中，jdstack部署在某个边缘节点机房中  
Demo会在环境中创建Kubernetes集群和容器镜像仓库，并在集群中创建一个nginx应用  

# 操作步骤  

1. 进入控制台 弹性计算-Kubernetes集群  点击创建  

2. 创建集群  
a)	地域，当前地域为特定边缘节点区域  
b)	名称，用户自定义  
c)	集群版本，边缘版本目前只支持1.12.3  
d)	管理节点CIDR，选择一个和当前集群所在VPC不冲突的CIDR  
e)	Access Key，选择一个激活的Access Key  
f)	私有网络，集群所在VPC  
g)	工作节点CIDR，VPC内选择一个CIDR分配给Kubernetes  
h)	规格，工作节点规格  
i)	数量，默认为3  
j)	名称，工作节点组名称，用户自定义  
k)	以上选项填写完毕后，确认创建集群  

3.	点击集群-集群名称-Kubectl客户端配置，将Kubernetes集群凭证拷贝到一台可以连接到集群的客户端主机 ~/.kube/config 文件中  


4.	验证集群连通性 
```
kubectl get nodes
```

5.	进入控制台 弹性计算-容器镜像仓库  

6.	新建注册表，用户自定义名称，点击确定创建  

7.	点击 注册表-添加镜像仓库 新建镜像仓库  

8.	点击 注册表-获取临时令牌  

9.	通过docker 命令，将测试用镜像上传到容器镜像仓库  
a)	docker login -u jdcloud -p xxx test-jcr-cn-stackstag-1.jcr.service.jdcloud.com  
b)	docker tag nginx:latest test-jcr-cn-stackstag-1.jcr.service.jdcloud.com/nginx:latest  
c)	docker push test-jcr-cn-stackstag-1.jcr.service.jdcloud.com/nginx:latest  

10.	在Kubernetes集群中创建容器镜像仓库的secret  
```
a)	kubectl create secret docker-registry my-secret --docker-server=test-jcr-cn-stackstag-1.jcr.service.jdcloud.com --docker-username=jdcloud --docker-password=xxx
```

11.	用test.yaml文件创建测试用应用  
```
apiVersion: extensions/v1beta1   
kind: Deployment
metadata:
  labels:
    run: nginx
  name: nginx
spec:
  replicas: 1
  selector:
    matchLabels:
      run: nginx
  template:
    metadata:
      labels:
        run: nginx
    spec:
      containers:
      - image: test-jcr-cn-stackstag-1.jcr.service.jdcloud.com/nginx:latest
        imagePullPolicy: Always
        name: nginx
      imagePullSecrets:
      - name: my-secret
```

12. 查看集群中应用运行情况  
```
kubectl get pods

NAME                    READY   STATUS    RESTARTS   AGE
nginx-bcb8f8d47-lrbgw   1/1     Running   0          20s
```
