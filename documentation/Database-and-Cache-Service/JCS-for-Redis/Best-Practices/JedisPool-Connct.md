#  JedisPool 连接池优化

##  概述

jedis、spring data redis等SDK都提供了连接池配置。根据不同的应用场景，通过调整合理的连接池参数，可有效提升Redis性能。本文档详细说明常见的连接池参数含义，同时提供优化配置建议。

##  使用

以Jedis 3.5.0为例，maven依赖如下：

    <dependency>
        <groupId>redis.clients</groupId>
        <artifactId>jedis</artifactId>
        <version>3.5.0</version>
    </dependency>


与连接池有关的类有：JedisPool、JedisPoolConfig、ShardedJedisPool（集群版）、JedisSentinelPool（主从版-带哨兵的）。下面以JedisPool为例，简单说明连接池的使用方法。



      //1. 初始化一个连接池：host 为redis服务的连接IP或域名，port 为连接端口，password 为连接密码，timeout 为连接、读写超时时间
      JedisPool jedisPool = new JedisPool(new JedisPoolConfig(), host, port, timeout, password);


      Jedis jedis;
      try {
          //2. 从连接池获取连接
          jedis = jedisPool.getResource();

          //3. 执行命令
          String userName = jedis.get("username");
      } catch (Exception e) {
          logger.error(e.getMessage(), e);
      } finally {
          //4. 归还连接给资源池
          if (jedis != null) 
              jedis.close();
      }


**注意：** 如果用户使用的是spring data redis、spring boot starter data redis等更高级的SDK，则不需要自己管理连接池，用户只需要执行命令即可，当然连接池参数仍然可以配置。



##  连接池常用参数说明

Jedis连接池底层使用了 Apache Commons Pool 2，相关的类包括：GenericObjectPool、GenericObjectPoolConfig、GenericKeyedObjectPool、GenericKeyedObjectPoolConfig，下表列举了GenericObjectPoolConfig类中常见的参数，理解每个参数的含义，有助于更好的使用连接池，同时也可定位到一些异常原因。

| 参数 |  说明  | 默认值	  |  建议值   | 
|   :---   |   :---  |:---  |:---  |
|   maxTotal	   |   连接池的最大连接数，-1表示无限制   |   	8	   |   根据应用的具体情况设置。具体参考下文的参数设置建议   |   
|   maxIdle	   |   连接池允许的最大空闲连接数，多余的空闲连接会立即释放   |   	8	   |   根据应用的具体情况设置。具体参考下文的参数设置建议   |   
|   minIdle   |   	连接池至少要保证多少个空闲连接，不足的会新建连接   |   	0	   |   根据应用的具体情况设置。具体参考下文的参数设置建议   |   
|   testWhileIdle   |   	空闲连接检测时，是否同时检测连接的有效性，无效连接会被释放，且该值只在timeBetweenEvictionRunsMillis > 0时有效   |   	false	   |   建议使用true。或使用JedisPoolConfig。
|   timeBetweenEvictionRunsMillis   |   	空闲连接的检测周期（单位毫秒），-1表示不开启空闲连接检测   |   	-1	   |   根据应用的具体情况设置，增大该值可加快空闲连接检测速度。由于京东云Redis，服务端开启了5分钟空闲连接关闭策略，故建议取值在1000~300000。或使用JedisPoolConfig。   |   
|   minEvictableIdleTimeMillis   |   	连接的最小空闲时间（单位毫秒），达到此值后空闲连接将被释放，-1表示不释放，且该值只在timeBetweenEvictionRunsMillis > 0有效   |   	1800000（30分钟）	   |   根据应用的具体情况设置，由于京东云Redis，服务端开启了5分钟空闲连接关闭策略，故建议取值小于300000。或使用JedisPoolConfig。    |     |   
|   numTestsPerEvictionRun	   |   检测空闲连接时，每次检测的连接数，如果为负数-n，则表示检测1/n个连接   |   	3	   |   根据应用的具体使用情况设置，增大该值可加快空闲连接检测速度。或使用JedisPoolConfig。   |   
|   blockWhenExhausted	   |   当连接池里的连接用尽后，新建连接时是否阻塞等待。false会抛出异常，true会阻塞直到超时maxWaitMillis   |   	true	   |   使用默认值   |   
|   maxWaitMillis   |   	当连接池的连接用尽后，调用者的最大等待时间（单位毫秒），-1表示一直阻塞   |   	-1	   |   建议设置一个合理的超时时间，避免出现当连接池用尽后，应用阻塞不响应的情况   |   
|   lifo   |   	借用连接时是否使用LIFO方式，true使用LIFO（后进先出）方式，false使用FIFO（先进先出）方式   |   	true   |   	大部分情况想使用默认值。具体参考下文的参数设置建议   |   
|   testOnBorrow   |   	每次向资源池借用连接时是否做连接有效性检测，无效连接会被释放   |   	false	   |   使用默认值。设为true相当于在每个命令执行完前先发一个PING命令，对高并发请求大应用的性能有影响。   |   
|   testOnReturn   |   	每次向资源池归还连接时是否做连接有效性检测，无效连接会被释放   |   	false   |   	使用默认值。设为true相当于在每个命令执行完后再发一个PING命令，对高并发请求大应用的性能有影响。   |   
|   fairness	   |   并发获取连接时，是否按并发的先后顺序从连接池获取   |   	false   |   	使用默认值   |   
|   jmxEnabled	   |   是否开启jmx监控   |   	true	   |   使用默认值，同时应用也需要开启   |   

与空闲连接检测有关的参数包括：testWhileIdle、timeBetweenEvictionRunsMillis、minEvictableIdleTimeMillis、numTestsPerEvictionRun。这些参数控制着是否开启空闲连接、空闲连接检测周期与速度。     



由于jedis、spring data redis等SDK时用的是JedisPoolConfig类，而JedisPoolConfig类继承自GenericKeyedObjectPoolConfig类。JedisPoolConfig为了方便使用在构造函数中设置了一些参数，具体如下：

    public class JedisPoolConfig extends GenericObjectPoolConfig {
      public JedisPoolConfig() {
        // defaults to make your life with connection pool easier :)
        setTestWhileIdle(true);
        setMinEvictableIdleTimeMillis(60000);
        setTimeBetweenEvictionRunsMillis(30000);
        setNumTestsPerEvictionRun(-1);
      }
    }

这些参数对JedisPool连接池的具体含义是：JedisPool连接池默认最多有8个连接，最多有8个空闲连接，同时开启空闲连接检测，每30s检测一次（且会通过发送PING命令，检测连接的有效性），如果有连接60s内仍然处于空闲状态（60s内一直没有使用）或无效（连接异常），该连接就会被释放，一次释放一个。当然这些配置都可以通过调用set方法修改。


##  参数设置建议

###  maxTotal、maxIdle、minIdle

这些参数在连接池中的含义是：maxTotal是连接池的容量，包括空闲连接和使用中的连接。将连接归还给连接池时，如果空闲连接数超过maxIdle，会被直接释放。同时连接池还要保证其中至少要有minIdle个空闲连接，如果不足也会新建连接加入其中。



**注意：** 京东云Redis后端的代理有最大连接数限制，单个代理的最大连接数为10000，连接数超过10000后，再新建连接会报错。因此maxTotal、maxIdle最大不能超过：10000*代理数。


这些参数，可结合云监控中的【客户端到代理的TCP连接数】监控项的历史数据，给出合理值。

###   testWhileIdle、timeBetweenEvictionRunsMillis、minEvictableIdleTimeMillis

由于京东云Redis服务端会主动关闭超过5分钟的空闲连接，因此把testWhileIdle设为true，可以防止连接因服务端执主动关闭，而客户端继续使用导致的异常。同时由于服务端有5分钟空闲连接关闭逻辑，故timeBetweenEvictionRunsMillis与minEvictableIdleTimeMillis不能超过5分钟，否则客户端的连接池空闲连接检测就没有意义了，同时这两个值也不宜设置过小，否则会影响客户端负载，避免连接池大部分时间都在检测空闲连接、新建连接与释放老连接。

###  numTestsPerEvictionRun

增大该值，可加快空闲连接清理速度。如果应用大部分时间流量都比较低，但偶尔会有流量突增，同时出现了JedisConnectionException: Unexpected end of stream异常，建议把该值调大，可调多次，直到该异常不再出现。具体原因是，当有流量突增时客户端连接池会新建一些连接，流量恢复后这些连接就会逐渐变成空闲连接，但默认的Jedis连接池1分钟内只会释放一个空闲连接，而京东云Redis服务端会主动关闭超过5分钟的空闲连接，如果连接池中的空闲连接超过5个，5分钟后就会出现服务端已关闭了该连接，但客户端连接池中该连接还没来得及释放就被使用了的情况，导致异常。

###  lifo

京东云Redis的标准版、集群版后端有多个代理，用户通过NLB再连接到后端的某个代理上。如果用户使用了连接池且都是默认的连接池参数，当通过云监控观察到某个代理出现连接倾斜（即连接数、ops比其他代理大很多），且该代理的延迟也其他代理大时，可以把该参数设为false，运行一段时间再观察现象是否消失。具体原因是，连接池默认使用后进先出的方式获取连接，如果某个代理响应慢，则会导致他会被优先使用，即响应慢的连接越有可能被优先使用，这样运行一段时间后，该代理会建立更多连接，进一步导致延迟变大，出现连接倾斜。


##  参考文档

  - Jedis github：https://github.com/redis/jedis

  - Apache Commons Pool2：http://commons.apache.org/proper/commons-pool/apidocs/org/apache/commons/pool2/impl/GenericObjectPoolConfig.html
