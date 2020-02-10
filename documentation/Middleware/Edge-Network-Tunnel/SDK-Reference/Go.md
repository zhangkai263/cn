SDK请在‘*[下载专区](../Download-Center.md)*’进行下载，本文档主要通过 Go Plugins 的方式使用 ENT；代码请参照SDK中ENT-Go/Example/下的两个example文件

1. 准备工作<br>
   将 entplugin 文件夹及其中的 entplugin.go 移至自己项目的根目录，同时在 Plugins 中选择合适的系统和CPU架构下的 entplugin.so 文件，将其移动的项目的 entplugin 目录下。
   
2. 以example.go的样式编写自己的应用<br>
   调用 entplugin 这个 package 的 GetEntService 获取它的返回值 EntService ，用 EntService.func 的方式调用方法。请参见 example_a.go 和  example_b.go 的写法。
   
3. 运行 example
   在 Plugins 中选择合适版本的 ent-plugin.so ,置于 example_a 和 example_b 的 entplugin 文件夹下。依次 go build 命令编译，分别在两个终端中先运行 example_b ,再运行 example_a :
   ```
   go build -o example_a example_a.go 
   go build -o example_b example_b.go 
   ./example_b
   ./example_a
   ```

4. API文档

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
