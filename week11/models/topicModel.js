
function getAllTopics(callback){
	// Get all the topics from the DB
	var results = {
   topics: [
   {id:1, name:"faith"},
   {id:2, name:"hope"},
   {id:3, name:"charity"}
   ]
  }
callback(null, results);
}

function getTopicById(id, callback){
	//get the topic from the DB that matches that id
	var results = {id:id, name: "hope"};
	callback(null, results);
}

function insertNewTopic(name, callback){
	// create the new topic in the DB with the provided name
	var results = {succes:true};
	callback(null, results);

}

module.exports = {
	getAllTopics: getAllTopics,
	getTopicById: getTopicById,
	insertNewTopic: insertNewTopic
};