/**
 * @description: Add new or Edit existing listing
 * 
 * @author: Alef <alef@alefos.com>
 */

var AddEdit = function ($scope, $http) {
    console.log('AddEit');
	/**
	 * @description: Display scrollable modal window with the form elements
	 * 
	 * @author: Alef <alef@alefos.com>
	 *
	 * @params:
	 *		listingId - if set to -1 that means open add new listing window, 
	 *					otherwise populate form with data from store at the index = listingId
	 */
    $scope.displayWindow = function (listingId) {
        console.log($scope.listingCategory);
    	if (-1 === listingId) {
    		// Add new listing action
    		console.log('This is Add new!');
    		modalWindowDisplay("Add new listing");
    	} else {
    		// Edit existing listing (at index listingId in the data store)
	    	console.log(listingId);
	        console.log($scope.listData[listingId]);
	        $scope.listData[listingId].price.value = 12345;
	        modalWindowDisplay("Edit " + $scope.listData[listingId].uniqueID);
    	}
    }

    $scope.saveForm = function () {
    	console.log("Save");
    }

    
}

var modalWindowDisplay = function (title) {
	$('#addEditPopup').dialog({
        modal: true,
        resizable: true,
        title: title,
        width: 800,
        height: 600,
        close: function () {console.log('Close win')},
        buttons: { "Ok": function() { $(this).dialog("close"); } } 

    });
}