
# Kubernetes ingress-nginx部署
Ingress 是从Kubernetes集群外部访问集群内部服务的入口，概念示意可参考下方说明。你可以在Ingress配置中提供外部可访问的URL、负载均衡、SSL、基于名称的虚拟主机等。用户通过POST Ingress资源到API server的方式来请求ingress。 

  ```
   internet
        |
   [ Ingress ]
   --|-----|--
   [ Services ]
  ```
Ingress controller负责实现Ingress。Ingress controller在Kubernetes集群中默认不会自动启用，您可以在一个pod中部署任意类型的自定义Ingress Controller。

Kubernetes ingress-nginx是社区提供的基于nginx开发的ingress controller。本文将以此为例，说明如何通过ingress访问dashboard及其他服务。更多详细配置请参考[Kubernetes ingress-nginx](https://github.com/kubernetes/ingress-nginx)。

一、安装Kubernetes ingress-nginx
1. 从github安装部署文件：

    ```
    
    kubectl apply -f https://raw.githubusercontent.com/kubernetes/ingress-nginx/nginx-0.30.0/deploy/static/mandatory.yaml
    ```

    **说明**：本文所有例子均在1.16版本的集群上测试运行，如集群版本不同，个别配置项可能需要微调。
2. 安装fix.yaml,避免controller不断报错；

    ```
    apiVersion: v1
    kind: Service
    metadata:
      name: ingress-nginx
      namespace: ingress-nginx
    spec:
      type: ClusterIP
      ports:
      - name: http
        port: 80
        targetPort: 80
        protocol: TCP
      - name: https
        port: 443
        targetPort: 443
        protocol: TCP
      selector:
        app: ingress-nginx
    ```

3. 执行如下命令，确定部署ingress-nginx controller的Deployment运行正常：

    ```
    
    kubectl get deployments  -n ingress-nginx

    NAME                      DESIRED   CURRENT   UP-TO-DATE   AVAILABLE   AGE
    nginx-ingress-controller   1         1         1            1           24d
    ```
4. 在 Kubernetes集群中，每个Pod都具有唯一的内部 IP 地址，但是Deployment中的Pod随时可能被删除或创建，导致Pod IP地址不断变化。因此需要创建一个Service对外暴露Pod中的应用。Service具有唯一的固定IP地址且能够为后端添加的成员Pod提供负载均衡。在京东云Kubernetes集群中您可以使用LoadBalance类型的Service，为Service关联创建一个应用负载均衡，并通过负载均衡绑定的公网IP，将Service后端关联的nginx-ingress controller应用暴露到公网：

    ```
    
    apiVersion: v1
    kind: Service
    metadata:
      name: nginx-ingress       #建议Service使用与nginx-ingress controller对应的Deployment名称相同的名称
      namespace: nginx-ingress
    spec:
      type: LoadBalancer
      ports:
      - port: 80
        targetPort: 80
        protocol: TCP
        name: http
      - port: 443
        targetPort: 443
        protocol: TCP
        name: https
      selector:
        app: nginx-ingress
    ```
    **说明**：目前spec中暂不支持使用externalTrafficPolicy: Local，请先删除Service Yaml文件中对应字段后，再部署Service。

    将上述Service定义到Yaml文件，执行如下命令创建对应的Service：

    ```
    
    kubectl create -f X.yaml        # 请使用对应的Yaml文件名称替换X.yaml
    ```
    **说明**：目前提供的config map中的data为空，您可以按需添加自定义配置。
8. 等待一段时间，确定Service已经配置完成，并获取Service上配置的External IP字段

    ```
    
    kubectl get svc -n nginx-ingress

    NAME            TYPE           CLUSTER-IP    EXTERNAL-IP    PORT(S)                      AGE
    nginx-ingress   LoadBalancer   10.X.XX.231   114.XX.XX.XX   80:30494/TCP,443:30467/TCP   24d

    说明：Service的External IP将作为nginx-ingress controller的VIP，为集群中使用nginx-ingress controller的Ingress提供公网访问入口
    ```
9. 最后，在Ingress controller的Deployment部署文件nginx-ingress.yaml中增加一对环境变量"-args -external-service=nginx-ingress",配置Ingress controller使用Service名称关联的External IP作为公网入口IP：

    ```
    
    args:
      - -nginx-configmaps=$(POD_NAMESPACE)/nginx-config
      - -default-server-tls-secret=$(POD_NAMESPACE)/default-server-secret
      - -external-service=nginx-ingress       #新增内容

    kubectl apply -f deployment/nginx-ingress.yaml        #重新部署nginx-ingress controller
    ```
10. 执行如下命令确定nginx-ingress controller相关的Pod运行正常，即可完成nginx ingress controller部署：

    ```
    
    kubectl get pod -n nginx-ingress

    输出结果：
    NAME                            READY   STATUS    RESTARTS   AGE
    nginx-ingress-6hz6b             1/1     Running   0          24d
    nginx-ingress-kbgbk             1/1     Running   0          24d
    nginx-ingress-nt68q             1/1     Running   0          24d
    ```

三、参考链接

完成Nginx-ingress Controller部署后，您可以在Kubernetes集群中部署Ingress Resource，京东云提供了如下基于Nginx-ingress Controller的部署方案，详情参考如下文档。

1. [部署http/https类型的Ingress Resource](https://docs.jdcloud.com/cn/jcs-for-kubernetes/Deploy-Ingress-Resource)；
2. [基于京东云ALB实现客户端源IP透传](https://docs.jdcloud.com/cn/jcs-for-kubernetes/nginx-ingress-source-ip)。
    
    


