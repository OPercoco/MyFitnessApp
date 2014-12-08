var express = require('express');
var app = express();

var data = [
	{"id":"2","created_at":"2014-10-19 18:19:44","updated_at":"2014-11-28 11:51:13","Name":"Breakfast","Calories":"199","Fat":"5","Carbs":"19","Fiber":"7","Time":"2014-10-19 18:19:44","UserId":"3","Type_id":"1","T_Name":"Pasta and Bread"},
	{"id":"6","created_at":"2014-11-03 10:17:01","updated_at":"2014-11-28 11:52:53","Name":"Waffles and creme","Calories":"200","Fat":"10","Carbs":"19","Fiber":"4","Time":"2014-11-03 09:30:00","UserId":"3","Type_id":"1","T_Name":"Pasta and Bread"},
	{"id":"11","created_at":"2014-11-06 09:54:06","updated_at":"2014-11-29 18:58:41","Name":"Pizza","Calories":"49","Fat":"16","Carbs":"19","Fiber":"5","Time":"1969-12-31 19:00:00","UserId":"3","Type_id":"1","T_Name":"Pasta and Bread"},
	{"id":"12","created_at":"2014-11-10 09:42:50","updated_at":"2014-11-13 10:11:12","Name":"Slimbar","Calories":"98","Fat":"0","Carbs":"3","Fiber":"3","Time":"2014-11-10 09:42:00","UserId":"3","Type_id":"1","T_Name":"Pasta and Bread"},
	{"id":"13","created_at":"2014-11-10 10:38:31","updated_at":"2014-11-13 10:11:18","Name":"Orange","Calories":"48","Fat":"0","Carbs":"2","Fiber":"0","Time":"1969-12-31 19:00:00","UserId":"3","Type_id":"1","T_Name":"Pasta and Bread"},
	{"id":"14","created_at":"2014-11-13 10:09:01","updated_at":"2014-11-20 10:32:22","Name":"Oatmeal with raisins","Calories":"398","Fat":"1","Carbs":"10","Fiber":"8","Time":"1969-12-31 19:00:00","UserId":"3","Type_id":"1","T_Name":"Pasta and Bread"},
	{"id":"22","created_at":"2014-11-20 10:00:26","updated_at":"2014-11-20 10:00:26","Name":"Lunch","Calories":"2","Fat":"2","Carbs":"4","Fiber":"3","Time":"6000-11-20 14:16:54","UserId":"3","Type_id":"3","T_Name":"Beans & Rice"},
	{"id":"26","created_at":"2014-11-28 09:58:45","updated_at":"2014-11-28 09:58:45","Name":"Dinner","Calories":"200","Fat":"4","Carbs":"4","Fiber":"4","Time":"1969-12-31 19:00:00","UserId":"3","Type_id":"1","T_Name":"Pasta and Bread"}
];


app.use(function(req, res, next) {
  res.header("Access-Control-Allow-Origin", "*");
  res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
  next();
});

app.get('/', function (req, res) {
  res.send(server.address());
});

app.route('/food')
	.get(function (req, res) {
	  res.send(data);
	});

var server = app.listen(3000, function () {
  console.log('Example app listening at http://localhost:%s', server.address().port);
});