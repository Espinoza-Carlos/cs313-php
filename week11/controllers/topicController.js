const topicModel = require("../models/topicModel.js");

function getTopicList(req, res){
  // get the list of all topics
  console.log("Getting all topics...");

  topicModel.getAllTopics(function(error, results){
    res.json(results);
  });
//var results = topicModel.getAllTopics();
  res.json(results);

}

function getTopic(req, res){
  // topic?id=1
  var id = req.query.id;
  //var id = req.params.id;
  //console.log("Getting  topic with param id:" + id);
console.log("Getting one topic with id:" + id);
  //get a single topic by id
  //console.log("Getting one topic...");
  //var results = {id:1, name: "faith"};
 //var results = topicModel.getTopicById(id);
 topicModel.getTopicById(id, function(error, results){
  res.json(results);
 });
  

}
function postTopic(req, res){
  var name = req.body.name;
  console.log("Creating a new topic with name:" + name);
  topicModel.insertNewTopic(name, function(error, results){
  res.json(results);  
  });
  
}

module.exports = {
getTopicList: getTopicList,
getTopic: getTopic,
postTopic: postTopic
};
