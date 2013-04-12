<?php
// Protect from unauthorized direct load of the page
// Always Required
require_once 'server/configuration/alwaysRequired.php';

// Include autoloader
require_once 'php/smartFileInclusion.php';

// Auth indicator
$numberOfCompanies = count($alefosSession->listOfCompanies); 
if(!$auth->hasIdentity() || !bindec(getFlagForIndex('generalSystemAccess') & $alefosSession->permissionFlag) || 0 == $numberOfCompanies){
    header("Location: " . $config->mainUrl);
} 
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html ng-app="alefos" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html ng-app="alefos" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <!-->         <html ng-app="alefos" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html ng-app="alefos" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>AlefOS.com - Real Estate operating system</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/additional.css">
        <link rel="stylesheet" href="css/start/jquery-ui-1.10.2.custom.min.css">
        <script src="lib/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<script src="http://code.angularjs.org/1.0.5/angular.min.js"></script>
    <script src="script.js"></script>
    </head>
    <body ng-controller="Lang">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <div id="progressbar" class="shadow invisible"></div>
        <div id="statusMsg"  class="shadow invisible"></div>
        <div class="header-container">
            <header class="wrapper clearfix">
                <h1 class="title">AlefOS.com</h1>
                <nav>
                    <ul>
                        <li><a href="#/view1">{{lang.appIdeas}}</a></li>
                        <li><a href="#/view2">{{lang.help}}</a></li>
                        <li><a href="server/auth/signout">{{lang.signOut}}</a></li>
                    </ul>
                </nav>
            </header>
        </div>
        
        <div class="main-container">
            <div id="statusMsgContainer">&nbsp;</div>
            <div class="main wrapper clearfix">
                <aside>
                    <div id='wrapper'>
                        <ul class="menu" ng-controller="Menu">
                            <li class="listings"><a href="#">{{lang.listings}} <span>340</span></a>
                                <ul>
                                    <li class="subitem1"><a href="#/listings/residentialList">{{lang.residential}} <span>14</span></a></li>
                                    <li class="subitem2"><a href="#/listings/rentalList">{{lang.rental}} <span>6</span></a></li>
                                    <li class="subitem3"><a href="#/listings/holidayRentalList">{{lang.holidayRental}} <span>2</span></a></li>
                                    <li class="subitem3"><a href="#/listings/commercialList">{{lang.commercial}} <span>2</span></a></li>
                                    <li class="subitem3"><a href="#/listings/commercialLandList">{{lang.commercialLand}} <span>2</span></a></li>
                                    <li class="subitem3"><a href="#/listings/landList">{{lang.land}} <span>2</span></a></li>
                                    <li class="subitem3"><a href="#/listings/ruralList">{{lang.rural}} <span>2</span></a></li>
                                    <li class="subitem3"><a href="#/listings/businessList">{{lang.business}} <span>2</span></a></li>
                                </ul>
                            </li>
                            <li class="applications"><a href="#">{{lang.applications}}</a>
                                <ul>
                                    <li class="subitem1"><a href="#/applications/appStore">{{lang.alefOsStore}}</a></li>
                                </ul>
                            </li>
                            <li class="settings"><a href="#">{{lang.settings}}</a>
                                <ul>
                                    <li class="subitem1"><a href="#/settings/accountInfo">{{lang.accountInfo}}</a></li>
                                    <li class="subitem2"><a href="#/settings/language">{{lang.language}}</a></li>
                                </ul>
                            </li>
                            <li class="billing"><a href="#">{{lang.billing}}  <span>$70 {{lang.monthly}}</span></a>
                                <ul>
                                    <li class="subitem1"><a href="#/billing/priceSummary">{{lang.priceSummary}}</a></li>
                                    <li class="subitem2"><a href="#/billing/invoices">{{lang.invoices}}</a></li>
                                    <li class="subitem3"><a href="#/billing/deleteAccount">{{lang.deleteAccount}}</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </aside>
                <article id="mainContainer">
                    <div ng-view></div>
                </article>

            </div> <!-- #main -->
        </div> <!-- #main-container -->

        <div class="footer-container">
            <footer class="wrapper">
                <small>AlefOS - version <span app-version></span> &nbsp;&nbsp;&nbsp;Copyright &copy; 2012-2013 AlefBrain.com - All rights reserved</small>
            </footer>
        </div>

        <div id="addEditPopup" ng-include src="'partials/listings/details.html'" style="display: none;"></div>

        <!-- jQuery scripts must be loaded before angular.js -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="lib/jquery/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="lib/jquery/jquery-ui-1.10.2.custom.min.js"></script>

        

        <script src="lib/posabsolute-jQuery-Validation-Engine/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
        <script src="lib/posabsolute-jQuery-Validation-Engine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
        <link rel="stylesheet" href="lib/posabsolute-jQuery-Validation-Engine/css/validationEngine.jquery.css" type="text/css"/>
        


        <!-- In production use:
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.0.2/angular.min.js"></script>
        -->
        <script src="lib/angular/angular.js"></script>
        <!-- Translations -->
        <script type="text/javascript" src="locale/alefos-lang-<?php echo $locale;?>.js"></script>
        <script src="server/Loadjs/"></script>
        <script src="js/app.js"></script>
        <script src="js/services.js"></script>
        <script src="js/filters.js"></script>
        <script src="js/directives.js"></script>

        <script src="lib/plugins.js"></script>
        
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>

