/**
 * @description: List of all listings in the current category
 * 
 * @author: Alef <alef@alefos.com>
 */ 

var List = function ($scope, $http, $route) {
    
    $scope.listingCategory = $route.current.category;
    $scope.listTitle = $scope.lang[$scope.listingCategory];
    
    $scope.resFrom = 1;
    $scope.resTo = 10;
    $scope.resOf = 99;
    $http.get('server/listings/default?type=' + $scope.listingCategory).success(function(data) {
        $scope.listData = data;
    });
    /*
    
        $http.put('server/residentials/default').success(function(data) {
            console.log(data);
        });
        
        $http.post('server/residentials/default').success(function(data) {
            console.log(data);
        });
        
        $http['delete']('server/residentials/default').success(function(data) {
            console.log(data);
        });*/
}