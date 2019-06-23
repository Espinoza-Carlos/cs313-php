var express = require('express');
var app = express();
var url = require('url');

app.set('port', (process.env.PORT || 5000));

app.use(express.static(__dirname + '/public'));


app.set('views', __dirname + '/views');
app.set('view engine', 'ejs');

app.get('/', function(request, response) {
  response.render('pages/index');
});

app.get('/postalAnswer', function(request, response) {

  var requestUrl = url.parse(request.url, true);

  var postageType = requestUrl.query.postageType;      
  var weight      = Number(requestUrl.query.weight);   

  var result = 0;

  if(postageType == "lettersStamped") {
    result = LetterStamped(weight);
  }
  else if (postageType == "lettersMetered") {
    result = lettersMetered(weight);
  }
  else if (postageType == "largeEnvelopes") {
    result = largeEnvelopes(weight);
  }
  else if (postageType == "First") {
    result = First(weight);
  }

  //this will generate a JSON object of the values we want to pass
  //in the ejs file result page
  var params = {postageType: postageType, weight: weight, result: result};

  response.render('pages/postalAnswer', params);
});

app.listen(app.get('port'), function() {
  console.log('Node app is running on port', app.get('port'));
});



function LetterStamped(weight) {

  var result;

  if(weight <= 1) {
    return result = 0.55;
  }
  else if (weight <= 2) {
    return result = 0.70;
  }
  else if (weight <= 3) {
    return result = 0.85;
  }
  else if (weight <= 3.5) {
    return result = 1.00;
  }
  else {
    return result = "It does not qualyfy as a letters Stamped";
  }
}

function lettersMetered(weight) {

  var result;

  if(weight <= 1) {
    return result = 0.50;
  }
  else if (weight <= 2) {
    return result = 0.65;
  }
  else if (weight <= 3) {
    return result = 0.80;
  }
  else if (weight <= 3.5) {
    return result = 0.95;
  }
  else {
    return result = "It does not qualyfy as a letters Stamped";
  }
}

function largeEnvelopes(weight) {

  var result;

  if(weight <= 1) {
    return result = 1.00;
  }
  else if (weight <= 2) {
    return result = 1.15;
  }
  else if (weight <= 3) {
    return result = 1.30;
  }
  else if (weight <= 4) {
    return result = 1.45;
  }
  else if (weight <= 5) {
    return result = 1.60;
  }
  else if (weight <= 6) {
    return result = 1.75;
  }
  else if (weight <= 7) {
    return result = 1.90;
  }
  else if (weight <= 8) {
    return result = 2.05;
  }
  else if (weight <= 9) {
    return result = 2.20;
  }
  else if (weight <= 10) {
    return result = 2.35;
  }
  else if (weight <= 11) {
    return result = 2.50;
  }
  else if (weight <= 12) {
    return result = 2.65;
  }
  else if (weight <= 13) {
    return result = 2.80;
  }
  //this next won't run because I used parameters but just incase fails the 
  //bounderies
  else {
    return result = "It does not qualyfy as a letters Stamped";
  }
}

function First(weight) {

    var result;
    if(weight <= 1) {
      return result = 3.66;
       }
    else if (weight <= 2) {
      return result = 3.66;
    }
    else if (weight <= 3) {
      return result = 3.66;
    }
    else if (weight <= 4) {
      return result = 3.66;
    }
    else if (weight <= 5) {
      return result = 4.39;
    }
    else if (weight <= 6) {
      return result = 4.39;
    }
    else if (weight <= 7) {
      return result = 4.39;
    }
    else if (weight <= 8) {
      return result = 3.39;
    }
    else if (weight <= 9) {
      return result = 5.19;
    }
    else if (weight <= 10) {
      return result = 5.19;
    }
    else if (weight <= 11) {
      return result = 5.19;
    }
    else if (weight <= 12) {
      return result = 5.19;
    }
    else if (weight <= 13) {
      return result = 5.71;
    }
    //this next won't run because I used parameters but just incase fails the 
  //bounderies
    else {
      return result = -1;
    }
}

