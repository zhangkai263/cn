【本文档的操作环境为Linux系统 (Ubuntu、CentOS)】<br>
SDK请在‘*[下载专区](../Download-Center.md)*’进行下载；代码请参照SDK中ENT/Example/Linux下的两个.c文件<br>

1. 使用ENT动态库构建项目<br>
   a) 用如下命令安装libentapi库：<br>
   安装对应系统和 CPU 架构的 .so 库文件
   ```
   sudo cp libentapi.so /usr/lib/
   sudo ldconfig                       //动态库安装
   ```
   b) 编译 example_a.c 和 example_b.c：<br>
   将 Include 中的头文件 entapi.h 和 Example 目录下的 example_a.c、example_b.c 放在同一目录下，编译 example_a.c 和example_b.c
   ```
   gcc -o example_a example_a.c -L. -Wl,-dy -lentapi
   gcc -o example_b example_b.c -L. -Wl,-dy -lentapi
   ```
   c) 打开两个终端先启动 example_b, 再启动 example_a：
   ```
   ./example_b
   ```
   ```
   ./example_a
   ```
	
2. 使用ENT静态库构建项目<br>
   a) 编译 example_a.c 和 example_b.c：<br>
   拷贝 Include 目录中的头文件 entapi.h，Example 目录下的 example_a.c、example_b.c 以及 Lib 中相应 *.a 库文件（选择对应系统和 CPU 架构）放在同一目录下，并编译 example_a.c 和 example_b.c
   ```
   gcc -o example_a example_a.c -L. -Wl,-dn -lentapi -Wl,-dy -lpthread
   gcc -o example_b example_b.c -L. -Wl,-dn -lentapi -Wl,-dy -lpthread
   ```
   b) 打开两个终端先启动 example_b, 再启动 example_a：
   ```
   ./example_b
   ```
   ```
   ./example_a
   ```
3. API文档

   <table>
     <tr valign="top">
       <td rowspan="4">Register</td>
       <td colspan="2">int Register(const char *demandID, const char *peerID, const char *serverAddr);</td>
     </tr>
     <tr>
       <td>功能</td>
       <td>根据PeerID注册一个Peer节点</td>
     </tr>
     <tr>
       <td>参数</td>
       <td>demandID [in]: 供应商ID.<br>
   		peerID [in]: 本端节点ID.<br>
   		serverAddr [in]: 服务器IP地址或域名,默认使用填入DEFAULT_SERVER_ADDR即可.
   	</td>
     </tr>
     <tr>
       <td width="10%">返回值</td>
       <td>成功返回值 = 0.<br>
   		失败返回值 < 0.
   	</td>
     </tr>
     <tr valign="top">
       <td rowspan="4">Unregister</td>
       <td colspan="2">int Unregister(const char *peerID);</td>
     </tr>
     <tr>
       <td>功能</td>
       <td>根据PeerID解注册一个Peer节点</td>
     </tr>
     <tr>
       <td>参数</td>
       <td>peerID [in]：本端节点ID</td>
     </tr>
     <tr>
       <td>返回值</td>
       <td>成功返回值 = 0.<br>
   		失败返回值 < 0.
   	</td>
     </tr>
     <tr valign="top">
       <td rowspan="4">Connect</td>
       <td colspan="2">char * Connect(const char *peerID);</td>
     </tr>
     <tr>
       <td>功能</td>
       <td>建立本端Peer节点与对端Peer节点的连接，成功返回连接的ConnectID.</td>
     </tr>
     <tr>
       <td>参数</td>
       <td>peerID [in]: 对端节点ID.</td>
     </tr>
     <tr>
       <td>返回值</td>
       <td>成功返回值 = ConnectID.<br>
   		失败返回值 = "".
   	</td>
     </tr>
     <tr valign="top">
       <td rowspan="4">Disconnect</td>
       <td colspan="2">int Disconnect(const char *connectID);</td>
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
       <td>成功返回值 = 0.<br>
   		失败返回值 < 0.
   	</td>
     </tr>
     <tr valign="top">
       <td rowspan="4">SetTimeout</td>
       <td colspan="2">int SetTimeout(const char *connectID, int timeout);</td>
     </tr>
     <tr>
       <td>功能</td>
       <td>设置connectID对应的连接的读写的超时时间,单位ms.</td>
     </tr>
     <tr>
       <td>参数</td>
       <td>connectID[in]: 连接的ConnectID.<br>
   		timeout[in]: 读写超时时间,单位ms.
   	</td>
     </tr>
     <tr>
       <td>返回值</td>
       <td>成功返回值 = 0.<br>
   		失败返回值 < 0.
   	</td>
     </tr>
     <tr valign="top">
       <td rowspan="4">Write</td>
       <td colspan="2">int Write(const char *connectID, char *buf, int bufSize);</td>
     </tr>
     <tr>
       <td>功能</td>
       <td>向connectID对应的连接中写入数据.</td>
     </tr>
     <tr>
       <td>参数</td>
       <td>connectID [in]: 连接的ConnectID.<br>
   		buf [in]: 写入字符串的指针.<br>
   		bufSize [in]: 写入字符串的大小,单位byte.
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
       <td colspan="2">int Read(const char *connectID, char *buf, int bufSize);</td>
     </tr>
     <tr>
       <td>功能</td>
       <td>从connectID对应的连接中读出数据.</td>
     </tr>
     <tr>
       <td>参数</td>
       <td>connectID [in]: 连接的ConnectID.<br>
   		buf [out]: 读出字符串的指针.
   	</td>
     </tr>
     <tr>
       <td>返回值</td>
       <td>成功返回值 = 读出数据大小.<br>
   		失败返回值 < 0.
   	</td>
     </tr>
     <tr valign="top">
       <td rowspan="4">SetConnectHandler</td>
       <td colspan="2">int SetConnectHandler(connect_callback_fn handler);</td>
     </tr>
     <tr>
       <td>功能</td>
       <td>设定连接建立时调用的回调函数,回调函数的参数为连接建立时传入的ConnectID.</td>
     </tr>
     <tr>
       <td>参数</td>
       <td>handler [in]: 回调函数,类型为void (connect_callback_fn)(const char)</td>
     </tr>
     <tr>
       <td>返回值</td>
       <td>成功返回值 = 0.<br>
   		失败返回值 < 0.
   	</td>
     </tr>
   </table>
