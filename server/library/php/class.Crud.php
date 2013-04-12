<?php
// Copyright 2012 AlefOS. All Rights Reserved.

/**
 * @fileoverview Implements CRUD (Create, Retrieve(Read), Update, Delete) for listings of all types
 * 				 Works with MongoDB database where all listings are stored in collections representing
 *               different types of listings (Residentials, Rentals...)
 * 
 * @author alef@alefos.com (Alef)
 */
 
class Crud {

    private static $mDb = ''; // MongoDB database selection goes into this variable
    
    function __construct() {
        //$this->mDb = $this->mDb();
    }
    
    /**
     * @description Create new listing and return his unique id  (Interface)
     * @param 
     * @return newly created listing's unique id
     * @author alef@alefos.com (Alef)
     */
    public function create() {
        return $this->doCreate();
    }
    
    /**
     * @description Retrieve list of listings according to given criteria  (Interface)
     * @param 
     * @return JSON containing listings per search criteria
     * @author alef@alefos.com (Alef)
     */	
    public function retrieve($type) {
        return $this->doRetrieve($type);
    }
    
    /**
     * @description Update given listing  (Interface)
     * @param 
     * @return true on success, false otherwise
     * @author alef@alefos.com (Alef)
     */
    public function update() {
        return $this->doUpdate();
    }
    
    /**
     * @description Soft delete listing (Interface)
     * @param 
     * @return true on success, false otherwise
     * @author alef@alefos.com (Alef)
     */
    public function delete() {
        return $this->doDelete();
    }
    
    /**
     * @description Here we are creating new listing and return his unique id
     * @param 
     * @return newly created listing's unique id
     * @author alef@alefos.com (Alef)
     */
    private function doCreate() {
        
    }
    
    /**
     * @description Here is happening real retrieval of list of listings according to given criteria
     * @param 
     * @return JSON containing listings per search criteria
     * @author alef@alefos.com (Alef)
     */
    private function doRetrieve($type) {
        $listing =  '
        [{
            "status": "current",
            "uniqueID": "ABCD1234",
            "authority": "exclusive",
            "underOffer": "no",
            "isHomeLandPackage": "no",
            "newConstruction": "yes",
            "listingAgent1": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent2": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent3": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent4": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "price": {
                "display": "yes",
                "value": "500000000"
            },
            "priceView": "Between $400,000 and $600,000",
            "address": {
                "site": "Kragujevac",
                "display": "yes",
                "subNumber": "2",
                "streetNumber": "39",
                "street": "Main Road",
                "suburb": { 
                    "display": "yes",
                    "name": "RICHMOND"
                },
                "state": "vic",
                "postcode": "3121",
                "country": "AUS"
            },
            "municipality": "Yarra",
            "category": "House",
            "headline": "SHOW STOPPER!!!",
            "description": "Don\'t pass up an opportunity like this! First to inspect will buy! Close to local amenities and schools. Features lavishly appointed bathrooms, modern kitchen, rustic outhouse.Don\'t pass up an opportunity like this! First to inspect will buy! Close to local amenities and schools. Features lavishly appointed bathrooms, modern kitchen, rustic outhouse.",
            "features": {
                "bedrooms": "4",
                "bathrooms": "2",
                "ensuite": "2",
                "garages": "3",
                "carports": "2",
                "remoteGarage": "yes",
                "secureParking": "yes",
                "airConditioning": "1",
                "alarmSystem": "1",
                "vacuumSystem": "no",
                "intercom": "no",
                "poolInGround": "yes",
                "poolAboveGround": "no",
                "spaInside": "no",
                "spaOutside": "no",
                "tennisCourt": "yes",
                "balcony": "yes",
                "deck": "yes",
                "courtyard": "yes",
                "outdoorEnt": "yes",
                "shed": "yes",
                "fullyFenced": "yes",
                "openFirePlace": "1",
                "openSpaces": "yes",
                "toilets": "2",
                "livingAreas": "1",
                "heating": {
                    "exists": "yes",
                    "type": "other"
                },
                "hotWaterService":{
                    "exists": "yes",
                    "type": "gas"
                },
                "broadband": "yes",
                "builtInRobes": "no",
                "dishwasher": "yes",
                "ductedCooling": "no",
                "ductedHeating": "no",
                "evaporativeCooling": "yes",
                "floorboards": "no",
                "gym": "yes",
                "hydronicHeating": "yes",
                "payTV": "yes",
                "reverseCycleAirCon": "yes",
                "rumpusRoom": "yes",
                "splitSystemAirCon": "yes",
                "splitSystemHeating": "yes",
                "study": "yes",
                "workshop": "yes",
                "otherFeatures": "balcony, courtyard, shed"
            },
            "soldDetails": {
                "soldPrice": {
                    "display": "yes",
                    "value": "500000"
                }, 
                "soldDate": "2012-12-06"
            },
            "landDetails": {
                "area": {
                    "unit": "square",
                    "size": "80"
                },
                "frontage": {
                    "unit": "meter",
                    "size": "20"
                },
                "depth": {
                    "unit": "meter",
                    "side": "rear",
                    "size": "40"
                },
                "crossOver": "left"
            },
            "buildingDetails": {
                "area": { 
                    "unit": "square",
                    "size": "40"
                },
                "newlyBuilt": "yes",
                "energyRating": "4.5"
            },
            "vendorDetails": {
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "nesto@something.com"
            },
            "externalLink": "http://www.realestate.com.au/",
            "videoLink": "http://www.realestate.com.au/",
            
            "ecoFriendly": {
                "solarPanels": "yes",
                "solarHotWater": "no",
                "waterTank": "yes",
                "greyWaterSystem": "yes"
            },
            
            "idealFor": {
                "firstHomeBuyer": "yes",
                "investors": "no",
                "downsizing": "no",
                "couples": "yes",
                "students": "yes",
                "lrgFamilies": "no",
                "retirees": "no"
            },
            
            "views": {
                "city": "yes",
                "water": "yes",
                "valley": "no",
                "mountain": "no",
                "ocean": "no",
                "sea": "yes"
            },
            
            "images": [
                {
                    "url": "img/temp/back_of_home_office_Bill.jpg",
                    "title": "Nikola Tesla",
                    "primary": "yes"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/imageA.jpg",
                    "title": "Neka druga",
                    "primary": "no"
                }
            ],
            "floorplans": [
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan1.gif",
                    "title": "Prvi sprat"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan2.gif",
                    "title": "Prizemlje"
                }
            ],
            "documents": [
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan1.gif",
                    "title": "Ugovor sa vlasnikom"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan2.gif",
                    "title": "MArketing invoice"
                }
            ]
            
        }, {
            "status": "current",
            "uniqueID": "ABCD1234",
            "authority": "exclusive",
            "underOffer": "no",
            "isHomeLandPackage": "no",
            "newConstruction": "yes",
            "listingAgent1": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent2": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent3": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent4": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "price": {
                "display": "yes",
                "value": "500000000"
            },
            "priceView": "Between $400,000 and $600,000",
            "address": {
                "site": "Kragujevac",
                "display": "yes",
                "subNumber": "2",
                "streetNumber": "39",
                "street": "Main Road",
                "suburb": { 
                    "display": "yes",
                    "name": "RICHMOND"
                },
                "state": "vic",
                "postcode": "3121",
                "country": "AUS"
            },
            "municipality": "Yarra",
            "category": "House",
            "headline": "SHOW STOPPER!!!",
            "description": "Don\'t pass up an opportunity like this! First to inspect will buy! Close to local amenities and schools. Features lavishly appointed bathrooms, modern kitchen, rustic outhouse.Don\'t pass up an opportunity like this! First to inspect will buy! Close to local amenities and schools. Features lavishly appointed bathrooms, modern kitchen, rustic outhouse.",
            "features": {
                "bedrooms": "4",
                "bathrooms": "2",
                "ensuite": "2",
                "garages": "3",
                "carports": "2",
                "remoteGarage": "yes",
                "secureParking": "yes",
                "airConditioning": "1",
                "alarmSystem": "1",
                "vacuumSystem": "no",
                "intercom": "no",
                "poolInGround": "yes",
                "poolAboveGround": "no",
                "spaInside": "no",
                "spaOutside": "no",
                "tennisCourt": "yes",
                "balcony": "yes",
                "deck": "yes",
                "courtyard": "yes",
                "outdoorEnt": "yes",
                "shed": "yes",
                "fullyFenced": "yes",
                "openFirePlace": "1",
                "openSpaces": "yes",
                "toilets": "2",
                "livingAreas": "1",
                "heating": {
                    "exists": "yes",
                    "type": "other"
                },
                "hotWaterService":{
                    "exists": "yes",
                    "type": "gas"
                },
                "broadband": "yes",
                "builtInRobes": "no",
                "dishwasher": "yes",
                "ductedCooling": "no",
                "ductedHeating": "no",
                "evaporativeCooling": "yes",
                "floorboards": "no",
                "gym": "yes",
                "hydronicHeating": "yes",
                "payTV": "yes",
                "reverseCycleAirCon": "yes",
                "rumpusRoom": "yes",
                "splitSystemAirCon": "yes",
                "splitSystemHeating": "yes",
                "study": "yes",
                "workshop": "yes",
                "otherFeatures": "balcony, courtyard, shed"
            },
            "soldDetails": {
                "soldPrice": {
                    "display": "yes",
                    "value": "500000"
                }, 
                "soldDate": "2012-12-06"
            },
            "landDetails": {
                "area": {
                    "unit": "square",
                    "size": "80"
                },
                "frontage": {
                    "unit": "meter",
                    "size": "20"
                },
                "depth": {
                    "unit": "meter",
                    "side": "rear",
                    "size": "40"
                },
                "crossOver": "left"
            },
            "buildingDetails": {
                "area": { 
                    "unit": "square",
                    "size": "40"
                },
                "newlyBuilt": "yes",
                "energyRating": "4.5"
            },
            "vendorDetails": {
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "nesto@something.com"
            },
            "externalLink": "http://www.realestate.com.au/",
            "videoLink": "http://www.realestate.com.au/",
            
            "ecoFriendly": {
                "solarPanels": "yes",
                "solarHotWater": "no",
                "waterTank": "yes",
                "greyWaterSystem": "yes"
            },
            
            "idealFor": {
                "firstHomeBuyer": "yes",
                "investors": "no",
                "downsizing": "no",
                "couples": "yes",
                "students": "yes",
                "lrgFamilies": "no",
                "retirees": "no"
            },
            
            "views": {
                "city": "yes",
                "water": "yes",
                "valley": "no",
                "mountain": "no",
                "ocean": "no",
                "sea": "yes"
            },
            
            "images": [
                {
                    "url": "img/temp/IMG_2257.JPG",
                    "title": "Nikola Tesla",
                    "primary": "yes"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/imageA.jpg",
                    "title": "Neka druga",
                    "primary": "no"
                }
            ],
            "floorplans": [
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan1.gif",
                    "title": "Prvi sprat"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan2.gif",
                    "title": "Prizemlje"
                }
            ],
            "documents": [
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan1.gif",
                    "title": "Ugovor sa vlasnikom"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan2.gif",
                    "title": "MArketing invoice"
                }
            ]
            
        },{
            "status": "current",
            "uniqueID": "ABCD1234",
            "authority": "exclusive",
            "underOffer": "no",
            "isHomeLandPackage": "no",
            "newConstruction": "yes",
            "listingAgent1": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent2": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent3": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent4": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "price": {
                "display": "yes",
                "value": "500000000"
            },
            "priceView": "Between $400,000 and $600,000",
            "address": {
                "site": "Kragujevac",
                "display": "yes",
                "subNumber": "2",
                "streetNumber": "39",
                "street": "Main Road",
                "suburb": { 
                    "display": "yes",
                    "name": "RICHMOND"
                },
                "state": "vic",
                "postcode": "3121",
                "country": "AUS"
            },
            "municipality": "Yarra",
            "category": "House",
            "headline": "SHOW STOPPER!!!",
            "description": "Don\'t pass up an opportunity like this! First to inspect will buy! Close to local amenities and schools. Features lavishly appointed bathrooms, modern kitchen, rustic outhouse.Don\'t pass up an opportunity like this! First to inspect will buy! Close to local amenities and schools. Features lavishly appointed bathrooms, modern kitchen, rustic outhouse.",
            "features": {
                "bedrooms": "4",
                "bathrooms": "2",
                "ensuite": "2",
                "garages": "3",
                "carports": "2",
                "remoteGarage": "yes",
                "secureParking": "yes",
                "airConditioning": "1",
                "alarmSystem": "1",
                "vacuumSystem": "no",
                "intercom": "no",
                "poolInGround": "yes",
                "poolAboveGround": "no",
                "spaInside": "no",
                "spaOutside": "no",
                "tennisCourt": "yes",
                "balcony": "yes",
                "deck": "yes",
                "courtyard": "yes",
                "outdoorEnt": "yes",
                "shed": "yes",
                "fullyFenced": "yes",
                "openFirePlace": "1",
                "openSpaces": "yes",
                "toilets": "2",
                "livingAreas": "1",
                "heating": {
                    "exists": "yes",
                    "type": "other"
                },
                "hotWaterService":{
                    "exists": "yes",
                    "type": "gas"
                },
                "broadband": "yes",
                "builtInRobes": "no",
                "dishwasher": "yes",
                "ductedCooling": "no",
                "ductedHeating": "no",
                "evaporativeCooling": "yes",
                "floorboards": "no",
                "gym": "yes",
                "hydronicHeating": "yes",
                "payTV": "yes",
                "reverseCycleAirCon": "yes",
                "rumpusRoom": "yes",
                "splitSystemAirCon": "yes",
                "splitSystemHeating": "yes",
                "study": "yes",
                "workshop": "yes",
                "otherFeatures": "balcony, courtyard, shed"
            },
            "soldDetails": {
                "soldPrice": {
                    "display": "yes",
                    "value": "500000"
                }, 
                "soldDate": "2012-12-06"
            },
            "landDetails": {
                "area": {
                    "unit": "square",
                    "size": "80"
                },
                "frontage": {
                    "unit": "meter",
                    "size": "20"
                },
                "depth": {
                    "unit": "meter",
                    "side": "rear",
                    "size": "40"
                },
                "crossOver": "left"
            },
            "buildingDetails": {
                "area": { 
                    "unit": "square",
                    "size": "40"
                },
                "newlyBuilt": "yes",
                "energyRating": "4.5"
            },
            "vendorDetails": {
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "nesto@something.com"
            },
            "externalLink": "http://www.realestate.com.au/",
            "videoLink": "http://www.realestate.com.au/",
            
            "ecoFriendly": {
                "solarPanels": "yes",
                "solarHotWater": "no",
                "waterTank": "yes",
                "greyWaterSystem": "yes"
            },
            
            "idealFor": {
                "firstHomeBuyer": "yes",
                "investors": "no",
                "downsizing": "no",
                "couples": "yes",
                "students": "yes",
                "lrgFamilies": "no",
                "retirees": "no"
            },
            
            "views": {
                "city": "yes",
                "water": "yes",
                "valley": "no",
                "mountain": "no",
                "ocean": "no",
                "sea": "yes"
            },
            
            "images": [
                {
                    "url": "img/temp/IMG_2261.JPG",
                    "title": "Nikola Tesla",
                    "primary": "yes"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/imageA.jpg",
                    "title": "Neka druga",
                    "primary": "no"
                }
            ],
            "floorplans": [
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan1.gif",
                    "title": "Prvi sprat"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan2.gif",
                    "title": "Prizemlje"
                }
            ],
            "documents": [
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan1.gif",
                    "title": "Ugovor sa vlasnikom"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan2.gif",
                    "title": "MArketing invoice"
                }
            ]
            
        },{
            "status": "current",
            "uniqueID": "ABCD1234",
            "authority": "exclusive",
            "underOffer": "no",
            "isHomeLandPackage": "no",
            "newConstruction": "yes",
            "listingAgent1": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent2": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent3": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent4": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "price": {
                "display": "yes",
                "value": "500000000"
            },
            "priceView": "Between $400,000 and $600,000",
            "address": {
                "site": "Kragujevac",
                "display": "yes",
                "subNumber": "2",
                "streetNumber": "39",
                "street": "Main Road",
                "suburb": { 
                    "display": "yes",
                    "name": "RICHMOND"
                },
                "state": "vic",
                "postcode": "3121",
                "country": "AUS"
            },
            "municipality": "Yarra",
            "category": "House",
            "headline": "SHOW STOPPER!!!",
            "description": "Don\'t pass up an opportunity like this! First to inspect will buy! Close to local amenities and schools. Features lavishly appointed bathrooms, modern kitchen, rustic outhouse.Don\'t pass up an opportunity like this! First to inspect will buy! Close to local amenities and schools. Features lavishly appointed bathrooms, modern kitchen, rustic outhouse.",
            "features": {
                "bedrooms": "4",
                "bathrooms": "2",
                "ensuite": "2",
                "garages": "3",
                "carports": "2",
                "remoteGarage": "yes",
                "secureParking": "yes",
                "airConditioning": "1",
                "alarmSystem": "1",
                "vacuumSystem": "no",
                "intercom": "no",
                "poolInGround": "yes",
                "poolAboveGround": "no",
                "spaInside": "no",
                "spaOutside": "no",
                "tennisCourt": "yes",
                "balcony": "yes",
                "deck": "yes",
                "courtyard": "yes",
                "outdoorEnt": "yes",
                "shed": "yes",
                "fullyFenced": "yes",
                "openFirePlace": "1",
                "openSpaces": "yes",
                "toilets": "2",
                "livingAreas": "1",
                "heating": {
                    "exists": "yes",
                    "type": "other"
                },
                "hotWaterService":{
                    "exists": "yes",
                    "type": "gas"
                },
                "broadband": "yes",
                "builtInRobes": "no",
                "dishwasher": "yes",
                "ductedCooling": "no",
                "ductedHeating": "no",
                "evaporativeCooling": "yes",
                "floorboards": "no",
                "gym": "yes",
                "hydronicHeating": "yes",
                "payTV": "yes",
                "reverseCycleAirCon": "yes",
                "rumpusRoom": "yes",
                "splitSystemAirCon": "yes",
                "splitSystemHeating": "yes",
                "study": "yes",
                "workshop": "yes",
                "otherFeatures": "balcony, courtyard, shed"
            },
            "soldDetails": {
                "soldPrice": {
                    "display": "yes",
                    "value": "500000"
                }, 
                "soldDate": "2012-12-06"
            },
            "landDetails": {
                "area": {
                    "unit": "square",
                    "size": "80"
                },
                "frontage": {
                    "unit": "meter",
                    "size": "20"
                },
                "depth": {
                    "unit": "meter",
                    "side": "rear",
                    "size": "40"
                },
                "crossOver": "left"
            },
            "buildingDetails": {
                "area": { 
                    "unit": "square",
                    "size": "40"
                },
                "newlyBuilt": "yes",
                "energyRating": "4.5"
            },
            "vendorDetails": {
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "nesto@something.com"
            },
            "externalLink": "http://www.realestate.com.au/",
            "videoLink": "http://www.realestate.com.au/",
            
            "ecoFriendly": {
                "solarPanels": "yes",
                "solarHotWater": "no",
                "waterTank": "yes",
                "greyWaterSystem": "yes"
            },
            
            "idealFor": {
                "firstHomeBuyer": "yes",
                "investors": "no",
                "downsizing": "no",
                "couples": "yes",
                "students": "yes",
                "lrgFamilies": "no",
                "retirees": "no"
            },
            
            "views": {
                "city": "yes",
                "water": "yes",
                "valley": "no",
                "mountain": "no",
                "ocean": "no",
                "sea": "yes"
            },
            
            "images": [
                {
                    "url": "img/temp/IMG_2275.JPG",
                    "title": "Nikola Tesla",
                    "primary": "yes"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/imageA.jpg",
                    "title": "Neka druga",
                    "primary": "no"
                }
            ],
            "floorplans": [
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan1.gif",
                    "title": "Prvi sprat"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan2.gif",
                    "title": "Prizemlje"
                }
            ],
            "documents": [
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan1.gif",
                    "title": "Ugovor sa vlasnikom"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan2.gif",
                    "title": "MArketing invoice"
                }
            ]
            
        },{
            "status": "current",
            "uniqueID": "ABCD1234",
            "authority": "exclusive",
            "underOffer": "no",
            "isHomeLandPackage": "no",
            "newConstruction": "yes",
            "listingAgent1": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent2": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent3": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent4": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "price": {
                "display": "yes",
                "value": "500000000"
            },
            "priceView": "Between $400,000 and $600,000",
            "address": {
                "site": "Kragujevac",
                "display": "yes",
                "subNumber": "2",
                "streetNumber": "39",
                "street": "Main Road",
                "suburb": { 
                    "display": "yes",
                    "name": "RICHMOND"
                },
                "state": "vic",
                "postcode": "3121",
                "country": "AUS"
            },
            "municipality": "Yarra",
            "category": "House",
            "headline": "SHOW STOPPER!!!",
            "description": "Don\'t pass up an opportunity like this! First to inspect will buy! Close to local amenities and schools. Features lavishly appointed bathrooms, modern kitchen, rustic outhouse.Don\'t pass up an opportunity like this! First to inspect will buy! Close to local amenities and schools. Features lavishly appointed bathrooms, modern kitchen, rustic outhouse.",
            "features": {
                "bedrooms": "4",
                "bathrooms": "2",
                "ensuite": "2",
                "garages": "3",
                "carports": "2",
                "remoteGarage": "yes",
                "secureParking": "yes",
                "airConditioning": "1",
                "alarmSystem": "1",
                "vacuumSystem": "no",
                "intercom": "no",
                "poolInGround": "yes",
                "poolAboveGround": "no",
                "spaInside": "no",
                "spaOutside": "no",
                "tennisCourt": "yes",
                "balcony": "yes",
                "deck": "yes",
                "courtyard": "yes",
                "outdoorEnt": "yes",
                "shed": "yes",
                "fullyFenced": "yes",
                "openFirePlace": "1",
                "openSpaces": "yes",
                "toilets": "2",
                "livingAreas": "1",
                "heating": {
                    "exists": "yes",
                    "type": "other"
                },
                "hotWaterService":{
                    "exists": "yes",
                    "type": "gas"
                },
                "broadband": "yes",
                "builtInRobes": "no",
                "dishwasher": "yes",
                "ductedCooling": "no",
                "ductedHeating": "no",
                "evaporativeCooling": "yes",
                "floorboards": "no",
                "gym": "yes",
                "hydronicHeating": "yes",
                "payTV": "yes",
                "reverseCycleAirCon": "yes",
                "rumpusRoom": "yes",
                "splitSystemAirCon": "yes",
                "splitSystemHeating": "yes",
                "study": "yes",
                "workshop": "yes",
                "otherFeatures": "balcony, courtyard, shed"
            },
            "soldDetails": {
                "soldPrice": {
                    "display": "yes",
                    "value": "500000"
                }, 
                "soldDate": "2012-12-06"
            },
            "landDetails": {
                "area": {
                    "unit": "square",
                    "size": "80"
                },
                "frontage": {
                    "unit": "meter",
                    "size": "20"
                },
                "depth": {
                    "unit": "meter",
                    "side": "rear",
                    "size": "40"
                },
                "crossOver": "left"
            },
            "buildingDetails": {
                "area": { 
                    "unit": "square",
                    "size": "40"
                },
                "newlyBuilt": "yes",
                "energyRating": "4.5"
            },
            "vendorDetails": {
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "nesto@something.com"
            },
            "externalLink": "http://www.realestate.com.au/",
            "videoLink": "http://www.realestate.com.au/",
            
            "ecoFriendly": {
                "solarPanels": "yes",
                "solarHotWater": "no",
                "waterTank": "yes",
                "greyWaterSystem": "yes"
            },
            
            "idealFor": {
                "firstHomeBuyer": "yes",
                "investors": "no",
                "downsizing": "no",
                "couples": "yes",
                "students": "yes",
                "lrgFamilies": "no",
                "retirees": "no"
            },
            
            "views": {
                "city": "yes",
                "water": "yes",
                "valley": "no",
                "mountain": "no",
                "ocean": "no",
                "sea": "yes"
            },
            
            "images": [
                {
                    "url": "img/temp/back_of_home_office_Bill.jpg",
                    "title": "Nikola Tesla",
                    "primary": "yes"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/imageA.jpg",
                    "title": "Neka druga",
                    "primary": "no"
                }
            ],
            "floorplans": [
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan1.gif",
                    "title": "Prvi sprat"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan2.gif",
                    "title": "Prizemlje"
                }
            ],
            "documents": [
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan1.gif",
                    "title": "Ugovor sa vlasnikom"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan2.gif",
                    "title": "MArketing invoice"
                }
            ]
            
        }, {
            "status": "current",
            "uniqueID": "ABCD1234",
            "authority": "exclusive",
            "underOffer": "no",
            "isHomeLandPackage": "no",
            "newConstruction": "yes",
            "listingAgent1": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent2": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent3": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent4": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "price": {
                "display": "yes",
                "value": "500000000"
            },
            "priceView": "Between $400,000 and $600,000",
            "address": {
                "site": "Kragujevac",
                "display": "yes",
                "subNumber": "2",
                "streetNumber": "39",
                "street": "Main Road",
                "suburb": { 
                    "display": "yes",
                    "name": "RICHMOND"
                },
                "state": "vic",
                "postcode": "3121",
                "country": "AUS"
            },
            "municipality": "Yarra",
            "category": "House",
            "headline": "SHOW STOPPER!!!",
            "description": "Don\'t pass up an opportunity like this! First to inspect will buy! Close to local amenities and schools. Features lavishly appointed bathrooms, modern kitchen, rustic outhouse.Don\'t pass up an opportunity like this! First to inspect will buy! Close to local amenities and schools. Features lavishly appointed bathrooms, modern kitchen, rustic outhouse.",
            "features": {
                "bedrooms": "4",
                "bathrooms": "2",
                "ensuite": "2",
                "garages": "3",
                "carports": "2",
                "remoteGarage": "yes",
                "secureParking": "yes",
                "airConditioning": "1",
                "alarmSystem": "1",
                "vacuumSystem": "no",
                "intercom": "no",
                "poolInGround": "yes",
                "poolAboveGround": "no",
                "spaInside": "no",
                "spaOutside": "no",
                "tennisCourt": "yes",
                "balcony": "yes",
                "deck": "yes",
                "courtyard": "yes",
                "outdoorEnt": "yes",
                "shed": "yes",
                "fullyFenced": "yes",
                "openFirePlace": "1",
                "openSpaces": "yes",
                "toilets": "2",
                "livingAreas": "1",
                "heating": {
                    "exists": "yes",
                    "type": "other"
                },
                "hotWaterService":{
                    "exists": "yes",
                    "type": "gas"
                },
                "broadband": "yes",
                "builtInRobes": "no",
                "dishwasher": "yes",
                "ductedCooling": "no",
                "ductedHeating": "no",
                "evaporativeCooling": "yes",
                "floorboards": "no",
                "gym": "yes",
                "hydronicHeating": "yes",
                "payTV": "yes",
                "reverseCycleAirCon": "yes",
                "rumpusRoom": "yes",
                "splitSystemAirCon": "yes",
                "splitSystemHeating": "yes",
                "study": "yes",
                "workshop": "yes",
                "otherFeatures": "balcony, courtyard, shed"
            },
            "soldDetails": {
                "soldPrice": {
                    "display": "yes",
                    "value": "500000"
                }, 
                "soldDate": "2012-12-06"
            },
            "landDetails": {
                "area": {
                    "unit": "square",
                    "size": "80"
                },
                "frontage": {
                    "unit": "meter",
                    "size": "20"
                },
                "depth": {
                    "unit": "meter",
                    "side": "rear",
                    "size": "40"
                },
                "crossOver": "left"
            },
            "buildingDetails": {
                "area": { 
                    "unit": "square",
                    "size": "40"
                },
                "newlyBuilt": "yes",
                "energyRating": "4.5"
            },
            "vendorDetails": {
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "nesto@something.com"
            },
            "externalLink": "http://www.realestate.com.au/",
            "videoLink": "http://www.realestate.com.au/",
            
            "ecoFriendly": {
                "solarPanels": "yes",
                "solarHotWater": "no",
                "waterTank": "yes",
                "greyWaterSystem": "yes"
            },
            
            "idealFor": {
                "firstHomeBuyer": "yes",
                "investors": "no",
                "downsizing": "no",
                "couples": "yes",
                "students": "yes",
                "lrgFamilies": "no",
                "retirees": "no"
            },
            
            "views": {
                "city": "yes",
                "water": "yes",
                "valley": "no",
                "mountain": "no",
                "ocean": "no",
                "sea": "yes"
            },
            
            "images": [
                {
                    "url": "img/temp/IMG_2257.JPG",
                    "title": "Nikola Tesla",
                    "primary": "yes"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/imageA.jpg",
                    "title": "Neka druga",
                    "primary": "no"
                }
            ],
            "floorplans": [
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan1.gif",
                    "title": "Prvi sprat"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan2.gif",
                    "title": "Prizemlje"
                }
            ],
            "documents": [
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan1.gif",
                    "title": "Ugovor sa vlasnikom"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan2.gif",
                    "title": "MArketing invoice"
                }
            ]
            
        },{
            "status": "current",
            "uniqueID": "ABCD1234",
            "authority": "exclusive",
            "underOffer": "no",
            "isHomeLandPackage": "no",
            "newConstruction": "yes",
            "listingAgent1": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent2": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent3": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent4": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "price": {
                "display": "yes",
                "value": "500000000"
            },
            "priceView": "Between $400,000 and $600,000",
            "address": {
                "site": "Kragujevac",
                "display": "yes",
                "subNumber": "2",
                "streetNumber": "39",
                "street": "Main Road",
                "suburb": { 
                    "display": "yes",
                    "name": "RICHMOND"
                },
                "state": "vic",
                "postcode": "3121",
                "country": "AUS"
            },
            "municipality": "Yarra",
            "category": "House",
            "headline": "SHOW STOPPER!!!",
            "description": "Don\'t pass up an opportunity like this! First to inspect will buy! Close to local amenities and schools. Features lavishly appointed bathrooms, modern kitchen, rustic outhouse.Don\'t pass up an opportunity like this! First to inspect will buy! Close to local amenities and schools. Features lavishly appointed bathrooms, modern kitchen, rustic outhouse.",
            "features": {
                "bedrooms": "4",
                "bathrooms": "2",
                "ensuite": "2",
                "garages": "3",
                "carports": "2",
                "remoteGarage": "yes",
                "secureParking": "yes",
                "airConditioning": "1",
                "alarmSystem": "1",
                "vacuumSystem": "no",
                "intercom": "no",
                "poolInGround": "yes",
                "poolAboveGround": "no",
                "spaInside": "no",
                "spaOutside": "no",
                "tennisCourt": "yes",
                "balcony": "yes",
                "deck": "yes",
                "courtyard": "yes",
                "outdoorEnt": "yes",
                "shed": "yes",
                "fullyFenced": "yes",
                "openFirePlace": "1",
                "openSpaces": "yes",
                "toilets": "2",
                "livingAreas": "1",
                "heating": {
                    "exists": "yes",
                    "type": "other"
                },
                "hotWaterService":{
                    "exists": "yes",
                    "type": "gas"
                },
                "broadband": "yes",
                "builtInRobes": "no",
                "dishwasher": "yes",
                "ductedCooling": "no",
                "ductedHeating": "no",
                "evaporativeCooling": "yes",
                "floorboards": "no",
                "gym": "yes",
                "hydronicHeating": "yes",
                "payTV": "yes",
                "reverseCycleAirCon": "yes",
                "rumpusRoom": "yes",
                "splitSystemAirCon": "yes",
                "splitSystemHeating": "yes",
                "study": "yes",
                "workshop": "yes",
                "otherFeatures": "balcony, courtyard, shed"
            },
            "soldDetails": {
                "soldPrice": {
                    "display": "yes",
                    "value": "500000"
                }, 
                "soldDate": "2012-12-06"
            },
            "landDetails": {
                "area": {
                    "unit": "square",
                    "size": "80"
                },
                "frontage": {
                    "unit": "meter",
                    "size": "20"
                },
                "depth": {
                    "unit": "meter",
                    "side": "rear",
                    "size": "40"
                },
                "crossOver": "left"
            },
            "buildingDetails": {
                "area": { 
                    "unit": "square",
                    "size": "40"
                },
                "newlyBuilt": "yes",
                "energyRating": "4.5"
            },
            "vendorDetails": {
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "nesto@something.com"
            },
            "externalLink": "http://www.realestate.com.au/",
            "videoLink": "http://www.realestate.com.au/",
            
            "ecoFriendly": {
                "solarPanels": "yes",
                "solarHotWater": "no",
                "waterTank": "yes",
                "greyWaterSystem": "yes"
            },
            
            "idealFor": {
                "firstHomeBuyer": "yes",
                "investors": "no",
                "downsizing": "no",
                "couples": "yes",
                "students": "yes",
                "lrgFamilies": "no",
                "retirees": "no"
            },
            
            "views": {
                "city": "yes",
                "water": "yes",
                "valley": "no",
                "mountain": "no",
                "ocean": "no",
                "sea": "yes"
            },
            
            "images": [
                {
                    "url": "img/temp/IMG_2261.JPG",
                    "title": "Nikola Tesla",
                    "primary": "yes"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/imageA.jpg",
                    "title": "Neka druga",
                    "primary": "no"
                }
            ],
            "floorplans": [
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan1.gif",
                    "title": "Prvi sprat"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan2.gif",
                    "title": "Prizemlje"
                }
            ],
            "documents": [
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan1.gif",
                    "title": "Ugovor sa vlasnikom"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan2.gif",
                    "title": "MArketing invoice"
                }
            ]
            
        },{
            "status": "current",
            "uniqueID": "ABCD1234",
            "authority": "exclusive",
            "underOffer": "no",
            "isHomeLandPackage": "no",
            "newConstruction": "yes",
            "listingAgent1": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent2": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent3": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "listingAgent4": {
                "agentID": "XNWXNW",
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "jdoe@somedomain.com.au",
                "twitterURL": "https://www.twitter.com/JohnDoe",
                "facebookURL": "https://www.facebook.com/JohnDoe",
                "linkedInURL": "https://www.linkedin.com/JohnDoe"
            },
            "price": {
                "display": "yes",
                "value": "500000000"
            },
            "priceView": "Between $400,000 and $600,000",
            "address": {
                "site": "Kragujevac",
                "display": "yes",
                "subNumber": "2",
                "streetNumber": "39",
                "street": "Main Road",
                "suburb": { 
                    "display": "yes",
                    "name": "RICHMOND"
                },
                "state": "vic",
                "postcode": "3121",
                "country": "AUS"
            },
            "municipality": "Yarra",
            "category": "House",
            "headline": "SHOW STOPPER!!!",
            "description": "Don\'t pass up an opportunity like this! First to inspect will buy! Close to local amenities and schools. Features lavishly appointed bathrooms, modern kitchen, rustic outhouse.Don\'t pass up an opportunity like this! First to inspect will buy! Close to local amenities and schools. Features lavishly appointed bathrooms, modern kitchen, rustic outhouse.",
            "features": {
                "bedrooms": "4",
                "bathrooms": "2",
                "ensuite": "2",
                "garages": "3",
                "carports": "2",
                "remoteGarage": "yes",
                "secureParking": "yes",
                "airConditioning": "1",
                "alarmSystem": "1",
                "vacuumSystem": "no",
                "intercom": "no",
                "poolInGround": "yes",
                "poolAboveGround": "no",
                "spaInside": "no",
                "spaOutside": "no",
                "tennisCourt": "yes",
                "balcony": "yes",
                "deck": "yes",
                "courtyard": "yes",
                "outdoorEnt": "yes",
                "shed": "yes",
                "fullyFenced": "yes",
                "openFirePlace": "1",
                "openSpaces": "yes",
                "toilets": "2",
                "livingAreas": "1",
                "heating": {
                    "exists": "yes",
                    "type": "other"
                },
                "hotWaterService":{
                    "exists": "yes",
                    "type": "gas"
                },
                "broadband": "yes",
                "builtInRobes": "no",
                "dishwasher": "yes",
                "ductedCooling": "no",
                "ductedHeating": "no",
                "evaporativeCooling": "yes",
                "floorboards": "no",
                "gym": "yes",
                "hydronicHeating": "yes",
                "payTV": "yes",
                "reverseCycleAirCon": "yes",
                "rumpusRoom": "yes",
                "splitSystemAirCon": "yes",
                "splitSystemHeating": "yes",
                "study": "yes",
                "workshop": "yes",
                "otherFeatures": "balcony, courtyard, shed"
            },
            "soldDetails": {
                "soldPrice": {
                    "display": "yes",
                    "value": "500000"
                }, 
                "soldDate": "2012-12-06"
            },
            "landDetails": {
                "area": {
                    "unit": "square",
                    "size": "80"
                },
                "frontage": {
                    "unit": "meter",
                    "size": "20"
                },
                "depth": {
                    "unit": "meter",
                    "side": "rear",
                    "size": "40"
                },
                "crossOver": "left"
            },
            "buildingDetails": {
                "area": { 
                    "unit": "square",
                    "size": "40"
                },
                "newlyBuilt": "yes",
                "energyRating": "4.5"
            },
            "vendorDetails": {
                "name": "Mr. John Doe",
                "telephone": "05 1234 5678",
                "email": "nesto@something.com"
            },
            "externalLink": "http://www.realestate.com.au/",
            "videoLink": "http://www.realestate.com.au/",
            
            "ecoFriendly": {
                "solarPanels": "yes",
                "solarHotWater": "no",
                "waterTank": "yes",
                "greyWaterSystem": "yes"
            },
            
            "idealFor": {
                "firstHomeBuyer": "yes",
                "investors": "no",
                "downsizing": "no",
                "couples": "yes",
                "students": "yes",
                "lrgFamilies": "no",
                "retirees": "no"
            },
            
            "views": {
                "city": "yes",
                "water": "yes",
                "valley": "no",
                "mountain": "no",
                "ocean": "no",
                "sea": "yes"
            },
            
            "images": [
                {
                    "url": "img/temp/IMG_2275.JPG",
                    "title": "Nikola Tesla",
                    "primary": "yes"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/imageA.jpg",
                    "title": "Neka druga",
                    "primary": "no"
                }
            ],
            "floorplans": [
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan1.gif",
                    "title": "Prvi sprat"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan2.gif",
                    "title": "Prizemlje"
                }
            ],
            "documents": [
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan1.gif",
                    "title": "Ugovor sa vlasnikom"
                },
                {
                    "url": "http://www.realestate.com.au/tmp/floorplan2.gif",
                    "title": "MArketing invoice"
                }
            ]
            
        }]
        ';
        
        
        return $listing;
    }
    
    /**
     * @description Let's do some real update of given listing
     * @param 
     * @return true on success, false otherwise
     * @author alef@alefos.com (Alef)
     */
    private function doUpdate() {
        
    }
    
    /**
     * @description Let's do some real soft delete listing
     * @param 
     * @return true on success, false otherwise
     * @author alef@alefos.com (Alef)
     */
    private function doDelete() {
        
    }
    
    /**
     * @description Connect to MongoDB server and select database
     * @param 
     * @return database pointer
     * @author alef@alefos.com (Alef)
     */
    private function mDb() {
        // Avoid db connection creation if there is one already created
        if (empty($this->mDb)) {
            $m = new MongoClient( Alefos::config()->mongoDbUri . Alefos::config()->mongoDbName );
            // select a database
            $dbName = Alefos::config()->mongoDbName;
            $db = $m->$dbName;
            return $db;
        } else {
            return $this->mDb;
        }
    }
}
