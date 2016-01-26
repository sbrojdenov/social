var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var mongoose = require('mongoose');

mongoose.connect('mongodb://localhost/chat');

var Schema = mongoose.Schema;

var chatSchema = new Schema({
    name: String,
    msg: String,
    avatar: String,
    email: String,
    recipient: String,
    created_at: Date
});

var Chat = mongoose.model('Chat', chatSchema);


app.get('/', function (req, res) {
    res.sendFile(__dirname + "/messages.html");
});

app.all('/', function (req, res, next) {
    res.header("Access-Control-Allow-Origin", "*");
    res.header("Access-Control-Allow-Headers", "X-Requested-With");
    next();
});

io.on('connection', function (socket) {
    console.log('a user connected');
});

io.on('connection', function (socket) {
    socket.on('chat message', function (from, msg,photo,email,recipient) {
        var message = new Chat({name: from, msg: msg, avatar: photo,email: email, recipient:recipient, created_at: new Date()});
        message.save(function (err) {
            if (err)
                console.log(err);
            else
                console.log(message);
        });
        io.emit('chat message', from, msg,photo);
    });

    socket.on('notifyUser', function (user) {
        io.emit('notifyUser', user);
    });
});

http.listen(3000, function () {
    console.log('listening on *:3000');
});