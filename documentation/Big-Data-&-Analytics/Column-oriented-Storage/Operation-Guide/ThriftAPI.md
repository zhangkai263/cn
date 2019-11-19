## 使用Thrift API访问

Thrift API利用Thrift序列化技术，提供多种语言支持，使用方法请参考
ThriftDemo.py
```
from thrift.transport import TSocket
from thrift.transport import TTransport
from thrift.protocol import TBinaryProtocol

from hbase import Hbase
from hbase.ttypes import *

class HbaseClient(object):
    def __init__(self, host='192.168.0.59', port=9090):
        self.transport = TTransport.TBufferedTransport(TSocket.TSocket(host, port))
        protocol = TBinaryProtocol.TBinaryProtocol(self.transport)
        self.client = Hbase.Client(protocol)

    def get_tables(self):
        self.transport.open()
        tables = self.client.getTableNames()
        self.transport.close()
        return tables

    def create_table(self, table, cf):
        self.transport.open()
        column = ColumnDescriptor(name = cf)
        self.client.createTable(table, [column])
        self.transport.close()
        return

    def disable_table(self, table):
        self.transport.open()
        self.client.disableTable(table)
        self.transport.close()
        return

    def delete_table(self, table):
        self.transport.open()
        self.client.deleteTable(table)
        self.transport.close()
        return

    def mutate_row(self, table, row, col, value):
        self.transport.open()
        tmp = [Mutation(column=col, value=value)]  
        self.client.mutateRow(table, row, tmp)  
        self.transport.close()
        return

    def get_row(self, table, row, col):
        self.transport.open()
        result = self.client.get(table, row, col)
        for r in result:
            print 'the timestamp is ' , r.timestamp
            print 'the values is ' , r.value
        self.transport.close()
        return

if __name__ == "__main__":
    client = HbaseClient()
    client.create_table("test", "cf")
    print client.get_tables()
    client.mutate_row("test", "101", "cf:a", "bbb")
    client.get_row("test", "101", "cf:a")
    client.disable_table("test1")
    client.delete_table("test1")
    print client.get_tables()
```

以下是python通过Thrift API访问集群的步骤:

安装依赖包:
```
tar zxvf pip-18.1.tar.gz
cd pip-18.1/
python setup.py install

unzip setuptools-40.6.2.zip
cd setuptools-40.6.2/
python setup.py install
```
如果测试机有公网权限使用安装thrift hbase-thrift:
```
pip install thrift
pip install hbase-thrift
```

如果无外网权限，需使用离线安装:
```
tar zxvf thrift-0.11.0.tar.gz
cd thrift-0.11.0
python setup.py install

tar zxvf hbase-thrift-0.20.4.tar.gz
cd hbase-thrift-0.20.4
python setup.py install
```
执行Demo
```
python ThriftDemo.py
```
