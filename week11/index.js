const express = require("express");
// this is in case we use heroku or local 
const path = require("path");
require('dotenv').config();

const topicController = require("./controllers/topicController.js");
const scriptureController = require("./controllers/scriptureController.js");

const PORT = process.env.PORT || 5000;

var app = express();


app.use(express.static(path.join(__dirname, "public")));
app.use(express.json()); //this will support json encoded bodies
app.use(express.urlencoded({extended: true})); //support url encoded bodies //this next will parse the body for you

app.get("/topics", topicController.getTopicList);
app.get("/topic", topicController.getTopic);
app.post("/topic",topicController.postTopic);


app.get("/search", scriptureController.search);
app.get("/scriptures", scriptureController.getScriptureList);
app.get("/scriptures", scriptureController.getScripture);
app.post("/scripture", scriptureController.insertNewScripture);
app.post("/assignTopicToScripture", scriptureController.assignTopicToScripture);

app.listen(PORT, function() {
console.log ("Server listening on port " + PORT);
});



// app.get("/topics", function(req, res){
// 	//get the lis of all topics
// 	console.log("getting all topics..");
// 	var results = {
// 		topics:[
// 			{id: 1, name:"faith"},
// 			{id: 2, name:"hope"},
// 			{id: 3, name:"charity"}
// 		]
// 	}
// 	res.json(results);

// });
// app.get("/topic", function(req, res){
// 	//get a single topic by id

// 	//too see by id 
// 	//topic ?id=1;
// 	// we write on the html http://localhost:5000/topic?id=1
// 	//or

// 	var id = req.query.id;

// 	console.log("Getting topic with id:" + id);
// 	console.log("Getting one topic...");
// 	//var results = {id:1, name:"faith"};
// 	var results = {id:id, name:"faith"};
// 	//to set the id written we writte
// 	//var results = {id:id, name:"faith"};
// 	//or I can use // we write on the html http://localhost:5000/topic/21
// 	//app.get("/topic/:id", function(req, res){
//     //if we use the above line we need to change var id to params instead of query
//     //var id = req.params.id;
// 	res.json(results);
// });
// app.post("/topic", function( req, res){
// 	var name = req.body.name;
// 	console.log("Creating a new topic with name: " + name);
// 	res.json({success:true});
// });