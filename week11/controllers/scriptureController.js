const scriptureModel = require("../models/scriptureModel.js");


function search(req, res){
//TODO: CHECK IF BOOK ID OR IF TOPIC ID, AND CALL THE APPROPRIATE FUNCTION...

var book = req.query.book;
scriptureModel.searchByBook(book, function(error, results){
	res.json(results);
});

//var topicId; //TODO: comes from the query
//scriptureModel.searchByTopic(topicId, function(results){
//	res.json(results); 
//});
}
function getScriptureList(req, res){
scriptureModel.getAllScriptures(topicId, function(error, results){
	res.json(results); 
});	
}

function getScripture(req, res){
var id =1; //TODO: comes from the query
scriptureModel.getScriptureById(id, function(error, results){
	res.json(results); 
});	
}

function insertNewScripture(req, res){
var book = "John";
var chapter = 3;
var verse = 16;
var content = "For God so loved ...";

scriptureModel.insertNewScripture(book, chapter, verse, content, function(error, results){
	res.json(results);
});
}

function assignTopicToScripture(req, res){
	
	var topicId =1;
	var scriptureId =1;

	scriptureModel.assignTopicToScripture(topicId, scriptureId, function(error, results){
		res.json(results);
	});
}

module.exports ={
	search: search,
	getScriptureList: getScriptureList,
	getScripture: getScripture,
	insertNewScripture: insertNewScripture,
    assignTopicToScripture: assignTopicToScripture
};


//app.get("/search", scriptureController.search);
//app.get("/scriptures", scriptureController.getScriptureList);
//app.get("/scripture", scriptureController.getScripture);
//app.post("/scripture", scriptureController.insertNewScripture);
//app.post("/assignTopicToScripture", scriptureController.assignTopicToScripture);
