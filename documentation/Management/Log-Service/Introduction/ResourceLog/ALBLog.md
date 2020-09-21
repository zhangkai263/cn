## 应用负载均衡（ALB）
### 简介
目前接入日志服务的ALB日志类型为**访问日志**和**健康检查日志**，目前仅支持查询7天内的日志数据。

### 访问日志字段说明
日志字段(7层/4层) | 字段描述 | 字段类型 | 字段值说明
-- | -- | -- | --
timestamp  | 时间戳 | time | 精确到毫秒，eg：2018-12-20T02:59:40.001Z
alb_id | 负载均衡ID | string | alb-[0-9][a-z]{10} , eg: alb-gmjnqw8bnh
client_ip | 客户端ip | string | eg：192.168.10.1
client_port | 客户端端口 | int | 1-65535，eg：50398
lb_vip | 负载均衡虚ip（vip） | string | eg：192.168.10.2
lb_vport | 负载均衡监听端口（vport） | int | 1-65535，eg：8080
backend_server_ip_port | 后端服务器的ip和端口 | string | eg：192.168.10.1:8080
request_time/session_time | 请求时间 | float | >0，eg：0.006 单位为秒
backend_connect_time | 连接建立时间 | float | >0，eg：0.001 单位为秒
backend_response_time/backend_session_time | 响应时间 | float | >0，eg：0.006 单位为秒
status | 状态码 | int | 类似于http code； eg: 200, 404, 503 ....
backend_server_status / - | 后端服务器返回状态码 | int | 类似于http code；eg: 200, 404, 503 ....
request_length/bytes_received | 请求数据长度 | int | >0，eg：80
bytes_sent | 已发送的数据 | int | >0，eg：197 单位为字节
scheme/protocol | scheme | string | uri scheme 或者 stream 协议；eg: http， https， tcp, udp
request_method/- | http method | string | GET, POST, DELETE, PUT , OPTION....
host / - | http host | string | 请求行中的host或请求头中的host或者一条与请求匹配的servername，eg: 192.168.2.3
request_uri/ - | 完整的原始请求的URI | string | eg : / ; /pan/beta/test1?fid=3
server_protocol / - | 请求使用的协议 | string | 通常是HTTP/1.0或HTTP/1.1
http_user_agent / - | 用户代理 | string | 客户端代理，eg: curl , chrome
ssl_cipher | ssl cipher | string | eg：EECDH+AESGCM
ssl_protocol | ssl 协议 | string | eg：SSLv2 ，TLSv1 
certificate_id | 证书id |string | eg：cert-jq3a9yhugj
docker_ip_port | docker 的ip 和端口 | string | eg：192.168.2.3:80

### 健康检查日志字段说明
日志字段| 字段描述 | 字段类型 | 字段值说明
-- | -- | -- | --
timestamp | 时间戳 | time | 精确到毫秒，eg：2018-12-20T02:59:40.001Z
alb_id | 负载均衡ID | string | alb-[0-9][a-z]{10} , eg: alb-gmjnqw8bnh
backend_id | 后端服务ID | string |backend-[0-9][a-z]{10}，eg：backend-lea4mj3kw7
backend_server_ip_port | 后端服务器的ip和端口 |string |  eg：192.168.10.1:8080|
log_detail |  日志详细内容 | string | 用于详细说明日志的类型，取值包括：1）server is unhealthy：后端服务器的健康状态变为不健康。 2)server is healthy：后端服务器的健康状态变为健康。 3)no available servers, num 1：后端服务下所有服务器的健康状态都已变为不健康，num表示服务器数量。 4)health check failed cause:ccc：本次健康检查异常及原因(原因类型见下表) 

#### health check 错误原因列表
HTTP健康检查| TCP健康检查 |说明
-- | -- | -- 
timeout | timeout | 超时
connect failed |  connect failed | 建立连接失败
peek failed | peek failed | 连接异常 
send failed | send failed | 写失败 
peer closed  |           | 对端关闭连接 
parse check error	 |parse check error | 健康检查结果验证不通过
recv failed |recv failed |  读失败 




