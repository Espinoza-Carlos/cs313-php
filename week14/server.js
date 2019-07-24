var express = require("express");
var path = require('path');
var cookieParser = require('cookie-parser');
const session = require('express-session');
var bodyParser = require('body-parser');
//const request = require('request');
//const apiKey = 'edda08fa21cc80434a0465478aca78bc';
var app = express();
var loginRouter = require('./routes/login');
var logoutRouter = require('./routes/logout');
var getServerTimeRouter = require('./routes/getServerTime');
app.disable('x-powered-by');  //https://expressjs.com/en/advanced/best-practice-security.html
app.use(express.static('static_files'));
//app.use(bodyParser.urlencoded({ extended: true }));
app.set('view engine', 'ejs')
app.set('views', path.join(__dirname, 'views'));
app.use(express.static(path.join(__dirname, 'static_files')));
const fakeDatabase = {
'Carlos': {job: 'Dentist', pet:'carlos.png'},
'Ana': {job: 'Oral Surgeon', pet:'Ana.png'}, 
'Gerardo': {job: 'Orthodontist', pet: 'gerardo.png'}
};

const {Pool} = require("pg");
const connectionString = process.env.DATABASE_URL || "postgres://familyhistoryuser:elijah@localhost:5432/familyhistorydemo";
const pool = new Pool({connectionString: connectionString});

const request = require ('request');
let apiKey = 'edda08fa21cc80434a0465478aca78bc';
let city = 'ridgecrest'
let url = `http://api.openweathermap.org/data/2.5/weather?q=${city}&units=imperial&appid=${apiKey}`;


app.get('/Dental_Home', function (req, res) {
  res.render('Dental_Home', {weather: null, error: null});
})

app.post('/Dental_Home', function (req, res) {
  //let city = req.body.city;
  //let url = `http://api.openweathermap.org/data/2.5/weather?q=${city}&units=imperial&appid=${apiKey}`
request(url, function (err, response, body) {
    if(err){
      res.render('Dental_Home', {weather: null, error: 'Error, please try again'});
     // console.log('error:', error);
    } else {
    	let weather = JSON.parse(body);
    	//let message = `It's ${weather.main.temp} degrees in ${weather.name}!`;
    	//res.render('Dental_Home', {weather: message, error: null});
      
      if(weather.main == undefined){
       res.render('Dental_Home', {weather: null, error: 'Error, please try again'});
      } else {
         let weatherText = `It's ${weather.main.temp} degrees in ${weather.name}!`;
        res.render('Dental_Home', {weather: weatherText, error: null});
      //post.send(weatherText);
      
    console.log(weatherText);
     //if(weather.main == undefined){
       // res.render('Dental_Home', {weather: null, error: 'Error, please try again'});
      //} else {
       // let weatherText = `It's ${weather.main.temp} degrees in ${weather.name}!`;
//        res.render('Dental_Home', {weather: weatherText, error: null});
      }


      }
    });
  });

  
/* worknig
request(url, function (err, response, body) {
    if(err){
      //res.render('index', {weather: null, error: 'Error, please try again'});
      console.log('error:', error);
    } else {
    	let weather = JSON.parse(body);
    	let message = `It's ${weather.main.temp} degrees in ${weather.name}!`;
      //let weather = JSON.parse(body)
      //if(weather.main == undefined){
       // res.render('index', {weather: null, error: 'Error, please try again'});
      //} else {
      //   let weatherText = `It's ${weather.main.temp} degrees in ${weather.name}!`;
      //  res.render('index', {weather: weatherText, error: null});
      //post.send(message);
      
     console.log(message);


      }
    //}
  });
end working*/

app.set("port", (process.env.PORT || 5000));

app.get("/getPerson", getPerson)

app.listen(app.get("port"), function() {
	console.log("Now listening for connections on port:", app.get("port"));
});

app.get('/users', (req, res) => {
	const allUsernames = Object.keys(fakeDatabase);
	console.log('allUsernames is:', allUsernames);
	//console.log('running app.get /users');
	//res.send('hope you are having a good day!'); 
	res.send(allUsernames);
});

app.get('/users/:userid', (req, res) => {
    const nameToLookup = req.params.userid;
	console.log(nameToLookup);
	const val = fakeDatabase[nameToLookup];
	console.log(nameToLookup, '->', val);
	if (val){
	res.send(val);
} else {
	res.send({});// failed, so return an empty object instead of undefined
}


});

/*app.use(bodyParser.urlencoded({ extended: true }));
app.set('view engine', 'ejs')
app.get('/', function (req, res) {
  res.render('index', {weather: null, error: null});
})

app.post('/', function (req, res) {
  let city = req.body.city;
  let url = `http://api.openweathermap.org/data/2.5/weather?q=${city}&units=imperial&appid=${apiKey}`


  request(url, function (err, response, body) {
    if(err){
      res.render('index', {weather: null, error: 'Error, please try again'});
    } else {
      let weather = JSON.parse(body)
      if(weather.main == undefined){
        res.render('index', {weather: null, error: 'Error, please try again'});
      } else {
         let weatherText = `It's ${weather.main.temp} degrees in ${weather.name}!`;
        res.render('index', {weather: weatherText, error: null});
      }
    }
  });
})
*/
function getPerson(req, res){
	console.log("Getting person information.");

	// get the id i place 
	//var id = req.query.presonid
	//var id = req.params.presonid
	var id = req.query.id;
	console.log("Retrieving person with id ", id);

	getPersonFromDB(id,function(error, result ){
		console.log("Back from the getPersonFromDB function with the result:", result);
		if (error || result == null || result.length != 1){
			res.status(500).json({success:false, data: error});
		} else{
			res.json(result[0]);
			//res.send(res.json(result[0]));
		}
		
		
	});

	//var result  = {id: 238, fist: "John", last: "Smith", birthdate: "1950-02-05"};
	//res.json(result);
}

function getPersonFromDB(id, callback){
	console.log("getPersonFromDB called with id", id);
	//with 2 parameters
	//var sql = "SELECT id, first, last, birthdate FROM person WHERE id = $1::int AND last =$2";
	var sql = "SELECT id, first, last, birthdate FROM person WHERE id = $1::int";
	var params = [id];
	pool.query(sql, params, function (err, result){
    if (err){
    	console.log("An error with the DB occurred");
    	console.log(err);
    	callback(err, null);
    }
    console.log("Found DB result: " + JSON.stringify(result.rows));
    callback(null, result.rows);

	});
}

app.use(function (req, res, next) {
  console.log(req.body) // populated!
  next();
})

//SESSION SHOULD BE CALLED BEFORE ROUTER 
//https://stackoverflow.com/questions/39796228/req-session-is-undefined-using-express-session
//https://expressjs.com/en/advanced/best-practice-security.html
var expiryDate = new Date(Date.now() + 24 * 60 * 60 * 1000) // 24 hours
app.use(session(
{
  secret: 'ssshhhhhwq7365417236#12e3@',
  saveUninitialized: true,
  httpOnly: true,
  //proxy: true,
  resave: false,
  expires: expiryDate
}));

app.use(express.json())
app.use(express.urlencoded({ extended: false }))
app.use(cookieParser())
app.use(express.static(path.join(__dirname, 'public')))
app.use('/', express.static('html'))

app.set('views', path.join(__dirname, 'views'))
app.set('view engine', 'ejs')

app.use('/login', loginRouter);
app.use('/logout', logoutRouter);
app.use('/getServerTime', verifyLogin)
app.use('/getServerTime', getServerTimeRouter);


//app.listen(PORT, () => console.log(`Listening on ${ PORT }`));

function verifyLogin(req, res, next){
	if(req.session.userName) {
		next();
	} else {
		const response = {success: false };
		res.status(401);
		res.json(response);
	}
}

module.exports = app;

