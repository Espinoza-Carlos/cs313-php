var express = require('express');
var router = express.Router();
const { check, validationResult } = require('express-validator');
const bcrypt = require('bcrypt');

const { Pool } = require('pg');
const connectionString = process.env.DATABASE_URL;
const pool = new Pool({connectionString: connectionString});

/* GET login page. */
router.get('/', function(req, res, next) {
    const userName = req.session.userName;
    const timeDate = new Date();
    var response;
    if (userName) {
        response = {success: true, time: timeDate };
    } else {
        response = {success: false };
    }
    res.json(response);
    /*


Create a Get route for /getServerTime that returns a JSON object with a success value set to true and 
a time attribute set to the server time. You get get the server time with code like: 
var time = new Date();. Ensure that your Web service works and displays the correct time on the HTML page.

Now, create two middleware functions. First, create a function called logRequest. Set up this function to log the requested URL with code like: console.log("Received a request for: " + request.url);. Now "use" this middleware function so that it is invoked for all requests. Don't forget to call "next" at the end of the function. Verify that it is invoked and logs data on the server when you request your different endpoints.

Finally, create a middleware function called verifyLogin. It should check to see if a username is on the session.
 If it is, simply call "next()" to let the request pipeline carry on. If it is not on the session, 
 send back a JSON message with an error message, and a status code of 401 to indicate that it is unauthorized.

Add this middleware function to the route for /getServerTime so that it only returns the server time if the user is logged in. 
If the user is not logged in, they should get the 401 message. Verify that this works from your html page.

    */
    next();
});

module.exports = router;
