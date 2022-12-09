var express = require('express')();
const app = express();
var server = require('http').Server(app);
var io = require('socket.io')(server,{
    cors:{origin:"*"}
});
var redis = require('redis'); 
server.listen(3000,()=>{
    console.log('Server is running')
});
io.on('connection', function (socket) {
 
    console.log("client connected");
    // var redisClient = redis.createClient();

    // redisClient.subscribe('message');
 
    // redisClient.on("message", function(channel, data) {
    //     socket.emit(channel, data);
    // }); 
    socket.on('disconnect', function() {
        console.log('Disconnect')
        redisClient.quit();
    });
});