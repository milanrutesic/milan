/**
 * @description: Change basic account information - password, first name, last name...
 * 
 * @author: Alef <alef@alefos.com>
 */

var AccountInfo = function($scope, $http) {
    // Load current account info
    $http.get('server/settings/getAccountInfo').success( function(data) {
        $scope.name = data.name;
        $scope.email = data.email; 
    });
    // Save changes
    $scope.changeAccountInfo = function () {
        if (true === $("#accountInfo").validationEngine("validate")) { 
            var postData = {};
            if ($scope.password !== undefined && $scope.password === $scope.confirmPassword) {
                postData.password = $scope.password;
            }

            if ($scope.name !== '') {
                postData.name = $scope.name;
            }

            helpers.displayLoader();

            $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
            $http.post('server/settings/setAccountInfo', $.param(postData)).success( function(data) {
                helpers.displayStatusMsg($scope.lang.formSavedSuccessfully); 
                // clear password fields
                $scope.password = '';
                $scope.confirmPassword = '';
            });    
        }
    }
}

/**
 * @description: Language of the application
 * 
 * @author: Alef <alef@alefos.com>
 */
var Locale = function($scope, $http) {
	// Load current locale of the user
	$http.get('server/settings/getLocale').success( function(data) {
        $scope.localeSelected = data.locale;
    });

	// When language is changed, commit change to the server
    $scope.changeLocale = function () {
        helpers.displayLoader();
    	$http.get('server/settings/setLocale?locale=' + $scope.localeSelected).success( function(data) {
	        location.reload();
	    });
    }
}