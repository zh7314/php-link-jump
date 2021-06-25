## 基于webman的高性能短连接跳转服务
相关组件   
php >= 8.0   
redis   
mysql 8.0

###此项目完全不建议在windows下运行业务，简单开发测试没有问题

### 如果有问题，请反馈
QQ群 247823727   
提供技术服务 QQ: 903464207

### short id设置
如果你想产出的ID看起来更习惯一点，但是short id的长度相当于来说也更长   
`alter table jump_link AUTO_INCREMENT = 10000000;`

### sql文件
`sql\short-link-jump.sql`

### 一些建议
本项目建议泡在php8以上，webman但是官方支持7.x，但是实际业务情况下   
开启opcache和JIT性能会更好
在开发模式下monitor 会可以支持热更新，但是你需要设置 process.php的文件
`monitor_dir`   
但是在-d 守护进程模式下，建议roload   

#### 守护模式下启动
` php start.php start -d`
#### 守护模式下更新代码，重启服务
`php start.php reload`
#### 查看状态
`php start.php status`

#### redis数据丢失问题
`process\RecoveryFailedRedisDataCrontab::class`  
有执行计划任务在扫描数据库，如果有丢redis数据的链接会重新写入数据到redis

#### 日志记录
路由中间件文件里
`app\middleware\CrossDomain::class`  
有记录请求url请求参数和返回数据，方便扩建项目时候，做计费统计数据

#### 进程状态

Workerman[start.php] status  
----------------------------------------------GLOBAL STATUS----------------------------------------------------  
Workerman version:4.0.19          PHP version:8.0.5   
start time:2021-06-25 12:22:37   run 0 days 2 hours     
load average: 0.09, 0, 0         event-loop:\Workerman\Events\Select   
3 workers       18 processes  
worker_name  exit_status      exit_count   
webman       0                0   
monitor      0                0   
task         0                0  
----------------------------------------------PROCESS STATUS---------------------------------------------------
pid     memory  listening           worker_name  connections send_fail timers  total_request qps    status   
2041480 6M      http://0.0.0.0:8787 webman       1           0         1       1756          0      [idle]  
2041481 6M      http://0.0.0.0:8787 webman       1           0         1       1639          0      [idle]  
2041482 6M      http://0.0.0.0:8787 webman       1           0         1       1621          0      [idle]  
2041483 6M      http://0.0.0.0:8787 webman       1           0         1       1699          0      [idle]  
2041484 6M      http://0.0.0.0:8787 webman       1           0         1       1872          0      [idle]   
2041485 6M      http://0.0.0.0:8787 webman       1           0         1       1675          0      [idle]   
2041486 6M      http://0.0.0.0:8787 webman       1           0         1       1707          0      [idle]   
2041487 6M      http://0.0.0.0:8787 webman       1           0         1       1839          0      [idle]   
2041488 6M      http://0.0.0.0:8787 webman       1           0         1       1795          0      [idle]   
2041489 6M      http://0.0.0.0:8787 webman       1           0         1       2053          0      [idle]  
2041491 6M      http://0.0.0.0:8787 webman       1           0         1       1804          0      [idle]  
2041492 6M      http://0.0.0.0:8787 webman       1           0         1       1850          0      [idle   
2041493 6M      http://0.0.0.0:8787 webman       1           0         1       1944          0      [idle]  
2041494 6M      http://0.0.0.0:8787 webman       1           0         1       1758          0      [idle]  
2041496 6M      http://0.0.0.0:8787 webman       1           0         1       1751          0      [idle]  
2041497 6M      http://0.0.0.0:8787 webman       1           0         1       1772          0      [idle]  
2041498 6M      none                monitor      0           0         1       0             0      [idle]  
2041499 6M      none                task         0           0         2       0             0      [idle]  
----------------------------------------------PROCESS STATUS---------------------------------------------------  
Summary 108M    -  

### 压力测试结果
https://www.cnblogs.com/zx-admin/p/14930657.html

### LICENSE
MIT
