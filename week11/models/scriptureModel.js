const { Pool } = require ("pg");

const db_url = process.env.DATABASE_URL;

//console.log("DB URL: " + db_url);
const pool = new Pool({connectionString: db_url});

function searchByBook(book, callback){
	console.log("Searching the DB for book: " + book)

	//this next shows all on those rows
	//var sql = "SELECT id, book, chapter, verse, content FROM scripture";
	var sql = "SELECT id, book, chapter, verse, content FROM scripture WHERE book =$1::text";
	var params = [book];

	pool.query(sql, params, function(err, db_results){
		if (err) {
			throw err;
		} else {
			//We got some successful results from the DB
			//console.log("Back from the DB with: ")
			//console.log(db_results);
			var results = {
				success:true,
				list:db_results.rows
			};

			//var results = {list:[{id:1, book:book, chapter:1, verse:3, content: "test"},
	//{id:1, book:book, chapter:1, verse:3, content: "test"},
	//{id:1, book:book, chapter:1, verse:3, content: "test"}]};
	
	callback(null, results);
		}
	});
	
	
}


function searchByTopic(topicId, callback){
	var results = {list:[{id:1, book:"Gen", chapter:1, verse:3, content: "test"},
	{id:1, book:"Gen", chapter:1, verse:3, content: "test"},
	{id:1, book:"Gen", chapter:1, verse:3, content: "test"}]};

	callback(null, results);
}

function getAllScriptures(callback){
var results = {list:[{id:1, book:"Gen", chapter:1, verse:3, content: "test"},
	{id:1, book:"Gen", chapter:1, verse:3, content: "test"},
	{id:1, book:"Gen", chapter:1, verse:3, content: "test"}]};
	callback(null, results);
}

function getScriptureById(id, callback){
var results = {id:1, book:"Gen", chapter:1, verse:3, content: "test"};
callback(null, results);
}

function insertNewScripture(book, chapter, verse, content, callback){
	var results = {sucess:true,
	               scriptre:{id:1, book:book, chapter:chapter, verse:verse}};
	               callback(null, results);
	           }

function assignTopicToScripture(topicId, scriptureId, callback){
	
	var results = {sucess:true};
	callback (null, results);
}

module.exports ={
	searchByTopic: searchByTopic,
	searchByBook: searchByBook,
	getAllScriptures: getAllScriptures,
	getScriptureById: getScriptureById,
	insertNewScripture: insertNewScripture, 
	assignTopicToScripture: assignTopicToScripture
};