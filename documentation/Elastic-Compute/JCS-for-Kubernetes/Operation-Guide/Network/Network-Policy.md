# 网络策略

## 概述

Network Policy用于定义集群内部Pod之间的网络隔离策略以及Pod与其他外部网络端点之间的网络隔离策略。Network Policy的定义由网络插件提供的控制器实现。更多详情参考[Kubernetes.io](https://kubernetes.io/docs/concepts/services-networking/network-policies/)。

默认情况下，pod之间无隔离，能够接收任何来源的流量；因此，如果您需要在集群中为Pod定义隔离策略，您可以选择在集群中开启Network Policy。

## 开启网络策略

京东云的Network Policy控制器通过集成Calico的Felix组件实现.支持基于Kubernetes标准API的NetworkPolicy来定义容器间的访问策略，并且兼容[Calico](https://docs.projectcalico.org/v3.8/security/calico-network-policy)的Network Policy。 

您可以在创建集群时选择开启"网络策略"；也可以为已有集群开启"网络策略"。

集群中开启Network Policy后，您可以在集群中定义Network Policy资源，为集群中不同类型的应用定义精确的网络隔离策略，实现集群内部应用之间或集群应用与外部网络端点之间的网络控制。

## 通过Network Policy限制集群内服务访问

1. 创建一个nginx的应用，并通过名称为ngnix的Service将其暴露。

```
kubectl run nginx --image=nginx

kubectl get pod
NAME                                           READY   STATUS              RESTARTS   AGE
nginx-7db9fccd9b-qrkgd                         1/1     Running             0          54m

kubectl expose deployment nginx --port=80

kubectl get service
NAME         TYPE        CLUSTER-IP     EXTERNAL-IP   PORT(S)   AGE
kubernetes   ClusterIP   10.0.120.1     <none>        443/TCP   130m
nginx        ClusterIP   10.0.122.240   <none>        80/TCP    89m
```

2. 创建名称为busybox的Pod，访问步骤1创建的nginx服务。

```
kubectl run busybox --image=busybox --restart=Never --command -- sleep 3600

kubectl exec -it busybox /bin/sh
/ # wget nginx
Connecting to nginx (10.0.122.240:80)
saving to 'index.html'
index.html           100% |***************************************************************************************************************************|   612  0:00:00 ETA
'index.html' saved
```

3. 创建网络策略限制集群内访问

networkpolicy.yaml
```
apiVersion: networking.k8s.io/v1
kind: NetworkPolicy
metadata:
  name: access-nginx
spec:
  podSelector:
    matchLabels:
      run: nginx
  ingress:
  - from:
    - podSelector:
        matchLabels:
          access: "true"
```

用上述的yaml文件创建network policy

```
kubectl create -f networkpolicy.yaml
```

4. 用刚刚创建的busybox测试nginx联通性

```
kubectl exec -it busybox /bin/sh
/ # wget nginx
Connecting to nginx (10.0.122.240:80)
wget: can't connect to remote host (10.0.122.240): Connection timed out
```
因为networkpolicy已经生效，busybox访问nginx失败

5. 删除刚刚创建的busybox，重新创建新的busybox并打上label

```
kubectl run busybox --image=busybox --restart=Never --labels="access=true" --command -- sleep 3600

kubectl exec -it busybox /bin/sh
/ # wget nginx
Connecting to nginx (10.0.122.240:80)
saving to 'index.html'
index.html           100% |***************************************************************************************************************************|   612  0:00:00 ETA
'index.html' saved
```
用新的busybox测试，可以正常访问nginx

## 通过Network Policy限制公网访问集群服务

1. 将上面步骤中创建的nginx service从ClusterIP变更为LoadBalancer

```
kubectl edit service nginx

apiVersion: v1
kind: Service
metadata:
  creationTimestamp: "2020-06-19T07:05:39Z"
  labels:
    run: nginx
  name: nginx
  namespace: default
  resourceVersion: "7080"
  selfLink: /api/v1/namespaces/default/services/nginx
  uid: 48080c2a-b1fb-11ea-8cbc-fa163ecd2a79
spec:
  clusterIP: 10.0.122.240
  ports:
  - port: 80
    protocol: TCP
    targetPort: 80
  selector:
    run: nginx
  sessionAffinity: None
  type: LoadBalancer
status:
  loadBalancer: {}
```
将type从ClusterIP变更为LoadBalancer，获取公网IP地址

```
kubectl get service nginx
NAME    TYPE           CLUSTER-IP     EXTERNAL-IP               PORT(S)        AGE
nginx   LoadBalancer   10.0.122.240   10.0.112.4,114.67.122.3   80:31535/TCP   119m
```

2. 通过公网访问nginx服务

登录到一台京东云虚机，然后通过wget访问nginx服务失败
```
wget 114.67.122.3
Connecting to 114.67.122.3:80... connected.
HTTP request sent, awaiting response... Read error (Connection reset by peer) in headers.
Retrying.
```

3. 更新网络策略，将测试机IP加入ipBlock网段
```
apiVersion: extensions/v1beta1
kind: NetworkPolicy
metadata:
  creationTimestamp: "2020-06-19T09:21:15Z"
  generation: 1
  name: access-nginx
  namespace: default
  resourceVersion: "27276"
  selfLink: /apis/extensions/v1beta1/namespaces/default/networkpolicies/access-nginx
  uid: 39d80783-b20e-11ea-8cbc-fa163ecd2a79
spec:
  ingress:
  - from:
    - podSelector:
        matchLabels:
          access: "true"
    - ipBlock:
        cidr: 114.67.0.0/16
  podSelector:
    matchLabels:
      run: nginx
  policyTypes:
  - Ingress
```

4. 再次验证通过公网可以访问nginx服务

## 通过Network Policy限制集群服务访问外网

1. 首先创建一个测试用的busybox
```
kubectl run busybox --image=busybox --restart=Never --command -- sleep 36000
kubectl exec -it busybox /bin/sh

```

2. 创建网络策略，默认禁止访问公网
egress-test.yaml
```
apiVersion: extensions/v1beta1
kind: NetworkPolicy
metadata:
  creationTimestamp: "2020-06-19T09:34:08Z"
  generation: 2
  name: egress-test
  namespace: default
  resourceVersion: "33225"
  selfLink: /apis/extensions/v1beta1/namespaces/default/networkpolicies/access-test
  uid: 06a8a537-b210-11ea-8cbc-fa163ecd2a79
spec:
  podSelector:
    matchLabels:
      run: busybox
  policyTypes:
  - Egress
  ```
  
  ```
  kubectl create -f egress-test.yaml
  ```



