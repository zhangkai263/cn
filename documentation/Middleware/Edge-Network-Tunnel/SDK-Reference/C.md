SDK请在‘[下载专区](www.baidu.com)’进行下载。

1.	使用共享库构建项目
		安装共享库
用如下命令安装libentapi库：

	```
sudo cp libentapi.so /usr/lib/  //动态库安装
```

		构建应用
	按照API文档编写自己的应用如: example.c
	
	```
	gcc -o example example.c -L. -Wl,-dy –lentapi
	./example
	```
	
2. 使用静态库构建项目
   	构建应用
   按照API文档编写自己的应用如: example.c，如将libentapi.a置于同一文件夹下，可使用如下命令构建：

   ```
   gcc -o example example.c -L. -Wl,-dn -lentapi -Wl,-dy -lpthread
   ./example
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

4. 实例代码

   ```
   1.	#include <sys/types.h>
   2.	#include <stdio.h>
   3.	#include <string.h>
   4.	#include <unistd.h>
   5.	#include "entapi.h"
   6.	 
   7.	void ConnectHandler(const char*);
   8.	 
   9.	int main() {
   10.	    int res;
   11.	    void (*f)(const char*);
   12.	    res = Register("test", "Peer2", DEFAULT_SERVER_ADDR);
   13.	    if (res < 0) {
   14.	        printf("register of Peer2 is %d\n", res);
   15.	    }
   16.	    f = ConnectHandler;
   17.	    SetConnectHandler(f);
   18.	    sleep(20); // hold the process
   19.	}
   20.	 
   21.	void ConnectHandler(const char* connectID) {
   22.	    char buf[50];
   23.	    int nRead, nWrite;
   24.	    SetTimeout(connectID, 5000);
   25.	    sleep(1); // wait peer1 to send
   26.	    while (1) {
   27.	        nRead = Read(connectID, buf);
   28.	        if (nRead < 0) {
   29.	            printf("Peer2 fail to read from connect: %s\n", connectID);
   30.	            return;
   31.	        }
   32.	        printf("Peer2 read data: %s\n", buf);
   33.	        nWrite = Write(connectID, buf, nRead);
   34.	        if (nWrite < 0) {
   35.	            printf("Peer2 fail to read from connect: %s\n", connectID);
   36.	            return;
   37.	        }
   38.	        printf("Peer2 write data: %s\n", buf);
   39.	    }
   40.	}
   ```

