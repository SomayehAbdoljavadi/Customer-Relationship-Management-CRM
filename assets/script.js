	var scotchApp = angular.module('scotchApp', ['ngRoute']);
	scotchApp.config(function($routeProvider) {
		$routeProvider
			.when('/', {
				templateUrl : 'pages/index.php',
				controller  : 'mainController'
			})
			.when('/customers', {
				templateUrl : 'pages/customers.html',
				controller  : 'customersController'
			})
			.when('/strategies', {
				templateUrl : 'pages/strategies.html',
				controller  : 'strategiesController'
			})
			.when('/new_strategy', {
				templateUrl : 'pages/new_strategy.html',
				controller  : 'newStrategyController'
			})
			.when('/backup', {
				templateUrl : 'pages/backup.html',
				controller  : 'backupController'
			})
			.when('/configuration', {
				templateUrl : 'pages/configuration.html',
				controller  : 'configurationController'
			})
			.when('/sent', {
				templateUrl : 'pages/sent.html',
				controller  : 'sentController'
			})
			.when('/new_customer', {
				templateUrl : 'pages/new_customer.html',
				controller  : 'newContactController'
			})
			.when('/custom_message', {
				templateUrl : 'pages/custom_message.html',
				controller  : 'customMessageController'
			})
			.when('/messages', {
				templateUrl : 'pages/messages.html',
				controller  : 'messagesController'
			})
			.when('/new_message', {
				templateUrl : 'pages/new_message.html',
				controller  : 'newMessageController'
			})
			.when('/events', {
				templateUrl : 'pages/events.html',
				controller  : 'eventsController'
			})
			.when('/contacts_category', {
				templateUrl : 'pages/contacts_category.html',
				controller  : 'categoryController'
			})
			.when('/contacts_title', {
				templateUrl : 'pages/contacts_title.html',
				controller  : 'titlesController'
			})
			.when('/new_event', {
				templateUrl : 'pages/new_event.html',
				controller  : 'fiveController'
			})
			.when('/tasks', {
				templateUrl : 'pages/tasks.html',
				controller  : 'tasksController'
			})
			.when('/new_admin', {
				templateUrl : 'pages/new_admin.html',
				controller  : 'newadminController'
			});
			
	});

	scotchApp.controller('mainController', function($scope) {
		$scope.message = 'Everyone come and see how good I look!';
	});
	
	scotchApp.controller('customersController', function($scope) {
		$('#selectMessages').load('pages/ajax/select_messages.php');
		$('#customers').load('pages/ajax/customers.php');
		$('#customersTable').DataTable({
            responsive: true,
            language: {
                search: "جستجو: ",
                lengthMenu: "نمایش _MENU_ سطر",
                info: "نمایش _START_ تا _END_ از _TOTAL_ سطر",
                paginate: {
                    first: "ابتدا",
                    last: "انتها",
                    next: "بعدی",
                    previous: "قبلی"
                },
            }
        });
		
	});

	scotchApp.controller('newadminController', function($scope) {
		$('#admins').load('pages/ajax/admins.php');
	});
	scotchApp.controller('strategiesController', function($scope) {
		$('#strategies').load('pages/ajax/strategies.php');
	});
	scotchApp.controller('newStrategyController', function($scope) {
		$('#newStrategy').load('pages/ajax/new_strategy.php');
	});
	scotchApp.controller('backupController', function($scope) {
		$('#backup').load('pages/ajax/backup.php');
	});
	scotchApp.controller('customMessageController', function($scope) {
		$('#customMessageLoad').load('pages/ajax/custome_message.php');
	});
	scotchApp.controller('messagesController', function($scope) {
		$('#messages').load('pages/ajax/messages.php');
	});
	scotchApp.controller('configurationController', function($scope) {
		$('#configuration').load('pages/ajax/configuration.php');
	});
	scotchApp.controller('eventsController', function($scope) {
		$('#events').load('pages/ajax/events.php');
	});
	scotchApp.controller('titlesController', function($scope) {
		$('#contactTitles').load('pages/ajax/titles.php');
	});
	scotchApp.controller('categoryController', function($scope) {
		$('#contactCategory').load('pages/ajax/categories.php');
	});
	scotchApp.controller('tasksController', function($scope) {
		$('#tasks').load('pages/ajax/tasks.php');
	});
	scotchApp.controller('newContactController', function($scope) {
		$('#newContact').load('pages/ajax/new_contact.php');
	});
	scotchApp.controller('sentController', function($scope) {
		$('#sent').load('pages/ajax/sent.php');
	});
	scotchApp.controller('newMessageController', function($scope) {
		$('#newMessage').load('pages/ajax/new_message.php');
	});
