SDK请在‘*[下载专区](../Download-Center.md)*’进行下载。

1. 将Go SDK作为plugin来构建项目

   a) 在项目根目录下新建entplugin文件下，选择合适的.so库的版本置于其中，并将entplugin.go置于其中。

   b) 项目代码中通过import entplugin，entplugin.GetEntService()来使用我们的SDK，具体可见文档末尾的实例代码。

2. API文档

   <table>
     <tr valign="top">
       <td rowspan="4">Register</td>
       <td colspan="2">Register(demandID, peerID, serverAddr string) error</td>
     </tr>
     <tr>
       <td>功能</td>
       <td>根据PeerID注册一个Peer节点.</td>
     </tr>
     <tr>
       <td>参数</td>
       <td>demandID [in]: 供应商ID.<br>
   		peerID [in]：本端节点ID.<br>
   		serverAddr [in]： 服务器IP地址或域名,默认使用填入DEFAULT_SERVER_ADDR即可.
   	</td>
     </tr>
     <tr>
       <td width="10%">返回值</td>
       <td>成功返回值 = nil.<br>
   		失败返回值 = 错误
   	</td>
     </tr>
     <tr valign="top">
       <td rowspan="4">Unregister</td>
       <td colspan="2">Unregister(peerID string) error</td>
     </tr>
     <tr>
       <td>功能</td>
       <td>根据PeerID解注册一个Peer节点.</td>
     </tr>
     <tr>
       <td>参数</td>
       <td>peerID [in]： 本端节点ID.</td>
     </tr>
     <tr>
       <td>返回值</td>
       <td>成功返回值 = nil.<br>
   		失败返回值 = 错误.
   	</td>
     </tr>
     <tr valign="top">
       <td rowspan="4">Connect</td>
       <td colspan="2">Connect(peerID string) (string, error)</td>
     </tr>
     <tr>
       <td>功能</td>
       <td>建立与peerID对应Peer节点的连接,并返回连接对应的ConnectID.</td>
     </tr>
     <tr>
       <td>参数</td>
       <td>peerID [in]: 对端节点ID.</td>
     </tr>
     <tr>
       <td>返回值</td>
       <td>成功返回值 = ConnectID, nil.<br>
   		失败返回值 = "", 错误.
   	</td>
     </tr>
     <tr valign="top">
       <td rowspan="4">Disconnect</td>
       <td colspan="2">Disconnect(connectID string) error</td>
     </tr>
     <tr>
       <td>功能</td>
       <td>根据connectID断开对应的连接.</td>
     </tr>
     <tr>
       <td>参数</td>
       <td>connectID [in]: 连接的ConnectID.</td>
     </tr>
     <tr>
       <td>返回值</td>
       <td>成功返回值 = nil.<br>
   		失败返回值 = 错误.
   	</td>
     </tr>
     <tr valign="top">
       <td rowspan="4">SetTimeout</td>
       <td colspan="2">SetTimeOut(connectID string, timeout time.Duration) error</td>
     </tr>
     <tr>
       <td>功能</td>
       <td>设置connectID对应的连接的读写的超时时间.</td>
     </tr>
     <tr>
       <td>参数</td>
       <td>connectID [in]: 连接的ConnectID.<br>
   		timeout [in]: 读写超时时间.
   	</td>
     </tr>
     <tr>
       <td>返回值</td>
       <td>成功返回值 = nil.<br>
   		失败返回值 = 错误.
   	</td>
     </tr>
     <tr valign="top">
       <td rowspan="4">Write</td>
       <td colspan="2">Write(connectID string, data []byte) error</td>
     </tr>
     <tr>
       <td>功能</td>
       <td>向connectID对应的连接中写入数据.</td>
     </tr>
     <tr>
       <td>参数</td>
       <td>connectID [in]: 连接的ConnectID.<br>
   		data [in]: 写入的数据.
   	</td>
     </tr>
     <tr>
       <td>返回值</td>
       <td>成功返回值 = 写入数据大小.<br>
   		失败返回值 < 0.
   	</td>
     </tr>
     <tr valign="top">
       <td rowspan="4">Read</td>
       <td colspan="2">Read(connectID string, data []byte) (int, error)</td>
     </tr>
     <tr>
       <td>功能</td>
       <td>从connectID对应的连接中读出数据.</td>
     </tr>
     <tr>
       <td>参数</td>
       <td>connectID [in]: 连接的ConnectID.<br>
   		data [out]: 读出的数据.
   	</td>
     </tr>
     <tr>
       <td>返回值</td>
       <td>成功返回值 = 读出数据大小, nil.<br>
   		失败返回值 = 0, 错误.
   	</td>
     </tr>
     <tr valign="top">
       <td rowspan="4">SetConnectHandler</td>
       <td colspan="2">SetConnectHandler(handler func(string)) error</td>
     </tr>
     <tr>
       <td>功能</td>
       <td>设定连接建立时调用的回调函数,回调函数的参数为连接建立时传入的ConnectID.</td>
     </tr>
     <tr>
       <td>参数</td>
       <td>handler [in]: 回调函数,类型为func(string)</td>
     </tr>
     <tr>
       <td>返回值</td>
       <td>成功返回值 = nil.<br>
   		失败返回值 = 错误.
   	</td>
     </tr>
   </table>

3. 实例代码

   ```
   1.	package main
   2.	 
   3.	import (
   4.	    "fmt"
   5.	    "time"
   6.	 
   7.	    "git.jd.com/jdcloud-epn/example-b/entplugin"
   8.	)
   9.	 
   10.	/*
   11.	    详见资源下载中的工程结构和README文档
   12.	*/
   13.	 
   14.	func main() {
   15.	    entService := entplugin.GetEntService()
   16.	 
   17.	    signalServer := "ent.jdcloud.com"
   18.	    bPeerID := "api_test_with_id_b"
   19.	 
   20.	    _ = entService.Register("api_test", bPeerID, signalServer)
   21.	    _ = entService.SetConnectHandler(func(connectID string) {
   22.	        data := make([]byte, 50)
   23.	        for {
   24.	            n, err := entService.Read(connectID, data)
   25.	            if err != nil {
   26.	                return
   27.	            }
   28.	            fmt.Println("Read data is ", string(data[:n]))
   29.	            err = entService.Write(connectID, data[:n])
   30.	            if err != nil {
   31.	                return
   32.	            }
   33.	            fmt.Println("Write data is ", string(data[:n]))
   34.	        }
   35.	    })
   36.	    time.Sleep(1 * time.Minute)
   37.	}
   ```

