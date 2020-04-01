<?php

$host = '0.0.0.0'; // 监听所有
$port = 5656;

// 创建 table
$table = new Swoole\Table(1024);

$table->column("id", $table::TYPE_INT, 4); // 创建一行 存放fd
$table->column('name', $table::TYPE_STRING, 64); // 存放用户名称

$table->create();

// 创建一个 websocket 服务器
$ws = new Swoole\WebSocket\Server($host, $port);

// 赋值table
$ws->table = $table;

// 监听 打开时间
$ws->on('open', function ($ws, $request) use ($table) {
    // todo 做一些记录
    // 记录
    $ws->table[$request->fd] = ['id' => $request->fd, 'name' => $request->get['name']];

    foreach ($table as $k => $v) {
        $user[] = $v;
    }

    // 通知所有用户有新的用户上线
    foreach ($ws->connections as $k) {
        $ws->push($k, json_encode(['user' => $user])); // 返回当前的用户表示 用来进行消息转发
    }
});

// 监听 消息事件
$ws->on('message', function($ws, $frame) {
    $data = json_decode($frame->data, true);

    // 发送消息
    if ('message' == $data['title']) {
        foreach ($data['user'] as $k) {
            $res = [
                'message' => $data['message'],
                'send_user_id' => $frame->fd,
                'send_user' => $ws->table->get($frame->fd, 'name')
            ];

            $ws->push($k, json_encode(['message' => $res]));
        }
    }
});

// 监听 关闭事件
$ws->on('close', function($ws, $fd) use ($table) {
    // todo 做一些记录
    // 删除table
    $table->del($fd);
});

// 启动
$ws->start();