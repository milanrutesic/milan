'use strict';
// Declare app level module which depends on filters, and services

angular.module('alefos', ['alefos.filters', 'alefos.services', 'alefos.directives'], function($routeProvider) {
    //Listings
    $routeProvider.when('/listings/residentialList',    {templateUrl: 'partials/listings/list.html', controller: List, category: 'residential' });
    $routeProvider.when('/listings/rentalList',         {templateUrl: 'partials/listings/list.html', controller: List, category: 'rental' });
    $routeProvider.when('/listings/holidayRentalList',  {templateUrl: 'partials/listings/list.html', controller: List, category: 'holidayRental' });
    $routeProvider.when('/listings/commercialList',     {templateUrl: 'partials/listings/list.html', controller: List, category: 'commercial' });
    $routeProvider.when('/listings/commercialLandList', {templateUrl: 'partials/listings/list.html', controller: List, category: 'commercialLand' });
    $routeProvider.when('/listings/landList',           {templateUrl: 'partials/listings/list.html', controller: List, category: 'land' });
    $routeProvider.when('/listings/ruralList',          {templateUrl: 'partials/listings/list.html', controller: List, category: 'rural' });
    $routeProvider.when('/listings/businessList',       {templateUrl: 'partials/listings/list.html', controller: List, category: 'business' });
    
    // Applications
    $routeProvider.when('/applications/appStore',       {templateUrl: 'partials/applications/appStore.html', controller: AppStore});
    
    // Settings
    $routeProvider.when('/settings/accountInfo',        {templateUrl: 'partials/settings/accountInfo.html', controller: AccountInfo});
    $routeProvider.when('/settings/language',           {templateUrl: 'partials/settings/language.html', controller: Locale});
    
    // Billing
    $routeProvider.when('/billing/priceSummary',        {templateUrl: 'partials/billing/priceSummary.html', controller: PriceSummary});
    $routeProvider.when('/billing/invoices',            {templateUrl: 'partials/billing/invoices.html', controller: Invoices});
    $routeProvider.when('/billing/deleteAccount',       {templateUrl: 'partials/billing/deleteAccount.html', controller: DeleteAccount});
    
    //Default
    $routeProvider.when('/default',                     {templateUrl: 'partials/default.html', controller: DefaultController});
    $routeProvider.otherwise({redirectTo: '/default'});

});
