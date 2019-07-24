var express = require('express');
var router = express.Router();
const { check, validationResult } = require('express-validator');
const bcrypt = require('bcrypt');

const { Pool } = require('pg');
const connectionString = process.env.DATABASE_URL;
const pool = new Pool({connectionString: connectionString});

/* GET login page. */

router.post('/', function(req, res, next) {
    const userName = req.session.userName;
    var response;
    if (userName) {
        //Destroy the session
        req.session.destroy();
        response = {success: true };
    } else {
        response = {success: false };
    }
    res.json(response);
    /*


Change your /login so that if the correct username and password are received it stores the username on the session.

Implement the /logout method. It should first check if the username is on the session. If it is, it should destroy the session and return a JSON object with a success value set to true. If the username is not present on the session, return a JSON object with success set to false.

Verify that your functions work as expected (e.g., try logging out before loggin in and verify that you cannot, etc.).

    */
    next();
});

module.exports = router;
