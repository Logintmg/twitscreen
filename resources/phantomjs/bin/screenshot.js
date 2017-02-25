var page = require('webpage').create();

var system = require('system');
var args = system.args;

if (!args[1]) {
	console.log('no url given');
	phantom.exit(2);
}

if (!args[2]) {
	console.log('no filename given');
	phantom.exit(3);
}

page.viewportSize = {
  width: 1920,
  height: 1080
};

page.onCallback = function(elementPosition) {
	console.log(JSON.stringify(arguments));
	
	page.clipRect = {
		top: elementPosition.top,
		left: elementPosition.left,
		width: elementPosition.width,
		height: elementPosition.height
	};
	
	page.render(args[2]);
	
	phantom.exit();
}

page.open(args[1], function(status) {
		
	if (status !== 'success') {
		console.log('cant open page');
		phantom.exit(1);
	}
	
	page.evaluateJavaScript('function(){var elements = document.getElementsByClassName(\'permalink-tweet-container\');if (!elements.length) {	console.log(\'no element\');}var element = elements[0];window.callPhantom(element.getBoundingClientRect());}');
});