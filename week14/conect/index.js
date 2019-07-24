const express = require('express')
const path = require('path')
var cookieParser = require('cookie-parser');
const session = require('express-session');
var bodyParser = require('body-parser');
const PORT = process.env.PORT || 5000

var loginRouter = require('./routes/login');
var logoutRouter = require('./routes/logout');
var getServerTimeRouter = require('./routes/getServerTime');

var app = express();

app.disable('x-powered-by');  //https://expressjs.com/en/advanced/best-practice-security.html

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


app.listen(PORT, () => console.log(`Listening on ${ PORT }`));

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
