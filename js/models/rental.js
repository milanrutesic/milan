// Copyright 2012 AlefOS. All Rights Reserved.

/**
 * @fileoverview This model gives us a list off all kinds of listings we have in database: Sales and Rentals and all others.
 * At the first access to the app we are loading entire list of all listings and then we are filtering
 * types we need: on the Sales Listings page, we are taking only listings for sale and on Rental Listings
 * page we are taking only rental listings from store.
 * 
 * @author alef@alefos.com (Alef)
 */

Ext.define('ALEFOS.model.Residential', {
	extend: 'Ext.data.Model',
    fields: [
        {name: 'status', 			type: 'string'},
		{name: 'uniqueID', 		type: 'string'},
		{name: 'authority', 		type: 'string'},
		{name: 'underOffer', 		type: 'string', 	defaultValue: 'no'}, // = yes|no
		{name: 'isHomeLandPackage',type: 'string', 	defaultValue: 'no'}, // = yes|no
		{name: 'newConstruction', 	type: 'string'}, // yes|no
		//Listing agents - up to 4
		{name: 'listingAgent1AgentID', 	mapping: 'listingAgent1.agentId', 		type: 'string'},
		{name: 'listingAgent1Name', 		mapping: 'listingAgent1.name', 			type: 'string'},
		{name: 'listingAgent1Telephone', 	mapping: 'listingAgent1.telephone', 	type: 'string'},
		{name: 'listingAgent1Email', 		mapping: 'listingAgent1.email', 		type: 'string'},
		{name: 'listingAgent1TwitterUrl', 	mapping: 'listingAgent1.twitterUrl', 	type: 'string'},
		{name: 'listingAgent1FacebookUrl', mapping: 'listingAgent1.facebookUrl', 	type: 'string'},
		{name: 'listingAgent1LinkedInUrl', mapping: 'listingAgent1.linkedInUrl', 	type: 'string'},
		
		{name: 'listingAgent2AgentID', 	mapping: 'listingAgent2.agentId', 		type: 'string'},
		{name: 'listingAgent2Name', 		mapping: 'listingAgent2.name', 			type: 'string'},
		{name: 'listingAgent2Telephone', 	mapping: 'listingAgent2.telephone', 	type: 'string'},
		{name: 'listingAgent2Email', 		mapping: 'listingAgent2.email', 		type: 'string'},
		{name: 'listingAgent2TwitterUrl', 	mapping: 'listingAgent2.twitterUrl', 	type: 'string'},
		{name: 'listingAgent2FacebookUrl', mapping: 'listingAgent2.facebookUrl', 	type: 'string'},
		{name: 'listingAgent2LinkedInUrl', mapping: 'listingAgent2.linkedInUrl', 	type: 'string'},
		
		{name: 'listingAgent3AgentID', 	mapping: 'listingAgent3.agentId', 		type: 'string'},
		{name: 'listingAgent3Name', 		mapping: 'listingAgent3.name', 			type: 'string'},
		{name: 'listingAgent3Telephone', 	mapping: 'listingAgent3.telephone', 	type: 'string'},
		{name: 'listingAgent3Email', 		mapping: 'listingAgent3.email', 		type: 'string'},
		{name: 'listingAgent3TwitterUrl', 	mapping: 'listingAgent3.twitterUrl', 	type: 'string'},
		{name: 'listingAgent3FacebookUrl', mapping: 'listingAgent3.facebookUrl', 	type: 'string'},
		{name: 'listingAgent3LinkedInUrl', mapping: 'listingAgent3.linkedInUrl', 	type: 'string'},
		
		{name: 'listingAgent4AgentID', 	mapping: 'listingAgent4.agentId', 		type: 'string'},
		{name: 'listingAgent4Name', 		mapping: 'listingAgent4.name', 			type: 'string'},
		{name: 'listingAgent4Telephone', 	mapping: 'listingAgent4.telephone', 	type: 'string'},
		{name: 'listingAgent4Email', 		mapping: 'listingAgent4.email', 		type: 'string'},
		{name: 'listingAgent4TwitterUrl', 	mapping: 'listingAgent4.twitterUrl', 	type: 'string'},
		{name: 'listingAgent4FacebookUrl', mapping: 'listingAgent4.facebookUrl', 	type: 'string'},
		{name: 'listingAgent4LinkedInUrl', mapping: 'listingAgent4.linkedInUrl', 	type: 'string'},
									 
		{name: 'priceDisplay', mapping: 'price.display', type: 'string'}, // yes|no
		{name: 'priceValue', mapping: 'price.value', type: 'string'}, // number [800000] or range [600000 - 900000]. All prices are in the local currency of the property         
		{name: 'priceView', type: 'string'}, // Published description of price. Eg: Suit $220,000+ buyers

		{name: 'addressSite', mapping: 'address.site', type: 'string'},
		{name: 'addressDisplay', mapping: 'address.display', type: 'string'},
		{name: 'addressSubNumber', mapping: 'address.subNumber', type: 'string'},
		{name: 'addressStreetNumber', mapping: 'address.streetNumber', type: 'string'},
		{name: 'addressStreet', mapping: 'address.street', type: 'string'},
		{name: 'addressSuburbDisplay', mapping: 'address.suburb.display', type: 'string'}, // yes|no
		{name: 'addressSuburbName', mapping: 'address.suburb.name', type: 'string'},
		{name: 'addressState', mapping: 'address.state', type: 'string'},
		{name: 'addressPostcode', mapping: 'address.postcode', type: 'string'},
		{name: 'addressCountry', mapping: 'address.country', type: 'string'},
		{name: 'municipality', type: 'string'},
		{name: 'category', type: 'string'},
		{name: 'headline', type: 'string'},
		{name: 'description', type: 'string'}, 
		{name: 'featuresBedrooms', mapping: 'features.bedrooms', type: 'string'},
		{name: 'featuresBathrooms', mapping: 'features.bathrooms', type: 'string'},
		{name: 'featuresEnsuite', mapping: 'features.ensuite', type: 'string'},
		{name: 'featuresGarages', mapping: 'features.garages', type: 'string'},
		{name: 'featuresCarports', mapping: 'features.carports', type: 'string'},
		{name: 'featuresRemoteGarage', mapping: 'features.remoteGarage', type: 'string'},
		{name: 'featuresSecureParking', mapping: 'features.secureParking', type: 'string'},
		{name: 'featuresAirConditioning', mapping: 'features.airConditioning', type: 'string'},
		{name: 'featuresAlarmSystem', mapping: 'features.alarmSystem', type: 'string'},
		{name: 'featuresVacuumSystem', mapping: 'features.vacuumSystem', type: 'string'},
		{name: 'featuresIntercom', mapping: 'features.intercom', type: 'string'},
		{name: 'featuresPoolInGround', mapping: 'features.poolInGround', type: 'string'},
		{name: 'featuresPoolAboveGround', mapping: 'features.poolAboveGround', type: 'string'},
		{name: 'featuresSpaInside', mapping: 'features.spaInside', type: 'string'},
		{name: 'featuresSpaOutside', mapping: 'features.spaOutside', type: 'string'},
		{name: 'featuresTennisCourt', mapping: 'features.tennisCourt', type: 'string'},
		{name: 'featuresBalcony', mapping: 'features.balcony', type: 'string'},
		{name: 'featuresDeck', mapping: 'features.deck', type: 'string'},
		{name: 'featuresCourtyard', mapping: 'features.courtyard', type: 'string'},
		{name: 'featuresOutdoorEnt', mapping: 'features.outdoorEnt', type: 'string'},
		{name: 'featuresShed', mapping: 'features.shed', type: 'string'},
		{name: 'featuresFullyFenced', mapping: 'features.fullyFenced', type: 'string'},
		{name: 'featuresOpenFirePlace', mapping: 'features.openFirePlace', type: 'string'},
		{name: 'featuresOpenSpaces', mapping: 'features.openSpaces', type: 'string'},
		{name: 'featuresToilets', mapping: 'features.toilets', type: 'string'},
		{name: 'featuresLivingAreas', mapping: 'features.livingAreas', type: 'string'},
		{name: 'featuresHeating', mapping: 'features.heating.exists', type: 'string'}, //yes|no
		{name: 'featuresHeatingType', mapping: 'features.heating.type', type: 'string'}, //gas|electric|GDH|solid|other
		{name: 'featuresHotWaterService', mapping: 'features.hotWaterService.exists', type: 'string'}, //yes|no
		{name: 'featuresHotWaterServiceType', mapping: 'features.hotWaterService.type', type: 'string'}, //gas|electric|solar|other
		{name: 'featuresBroadband', mapping: 'features.broadband', type: 'string'},
		{name: 'featuresBuiltInRobes', mapping: 'features.builtInRobes', type: 'string'},
		{name: 'featuresDishwasher', mapping: 'features.dishwasher', type: 'string'},
		{name: 'featuresDuctedCooling', mapping: 'features.ductedCooling', type: 'string'},
		{name: 'featuresDuctedHeating', mapping: 'features.ductedHeating', type: 'string'},
		{name: 'featuresEvaporativeCooling', mapping: 'features.evaporativeCooling', type: 'string'},
		{name: 'featuresFloorboards', mapping: 'features.floorboards', type: 'string'},
		{name: 'featuresGym', mapping: 'features.gym', type: 'string'},
		{name: 'featuresHydronicHeating', mapping: 'features.hydronicHeating', type: 'string'},
		{name: 'featuresPayTV', mapping: 'features.payTV', type: 'string'},
		{name: 'featuresReverseCycleAirCon', mapping: 'features.reverseCycleAirCon', type: 'string'},
		{name: 'featuresRumpusRoom', mapping: 'features.rumpusRoom', type: 'string'},
		{name: 'featuresSplitSystemAirCon', mapping: 'features.splitSystemAirCon', type: 'string'},
		{name: 'featuresSplitSystemHeating', mapping: 'features.splitSystemHeating', type: 'string'},
		{name: 'featuresStudy', mapping: 'features.study', type: 'string'},
		{name: 'featuresWorkshop', mapping: 'features.workshop', type: 'string'},
		{name: 'featuresOtherFeatures', mapping: 'features.otherFeatures', type: 'string'},
		{name: 'soldDetailsPriceDisplay', mapping: 'soldDetails.soldPrice.display', type: 'string'},
		{name: 'soldDetailsPriceValue', mapping: 'soldDetails.soldPrice.value', type: 'string'},
		{name: 'soldDetailsSoldDate', mapping: 'soldDetails.soldDate', type: 'string'},
		{name: 'landDetailsAreaUnit', mapping: 'landDetails.area.unit', type: 'string'},//(square|squareMeter|acre|hectare)
		{name: 'landDetailsAreaSize', mapping: 'landDetails.area.size', type: 'string'},
		{name: 'landDetailsFrontageUnit', mapping: 'landDetails.frontage.unit', type: 'string'}, //meter FIXED TO METER
		{name: 'landDetailsFrontageSize', mapping: 'landDetails.frontage.size', type: 'string'},
		{name: 'landDetailsDepthUnit', mapping: 'landDetails.depth.unit', type: 'string'}, //meter FIXED TO METER
		{name: 'landDetailsDepthSide', mapping: 'landDetails.depth.side', type: 'string'}, //( rear | left | right )
		{name: 'landDetailsDepthSize', mapping: 'landDetails.depth.size', type: 'string'},
		{name: 'landDetailsCrossOver', mapping: 'landDetails.crossOver', type: 'string'}, //left | right | center
		{name: 'buildingDetailsAreaUnit', mapping: 'buildingDetails.area.unit', type: 'string'},//(square|squareMeter|acre|hectare)
		{name: 'buildingDetailsAreaSize', mapping: 'buildingDetails.area.size', type: 'string'},
		{name: 'buildingDetailsNewlyBuilt', mapping: 'buildingDetails.newlyBuilt', type: 'string'}, // yes|no
		{name: 'buildingDetailsEnergyRating', mapping: 'buildingDetails.energyRating', type: 'string'}, // A value of 0-10 in .5 increments is expected for Residential listings and 0-6 in .5 increments for Commercial and Business listings
		{name: 'vendorDetailsName', mapping: 'vendorDetails.name', type: 'string'},
		{name: 'vendorDetailsTelephone', mapping: 'vendorDetails.telephone', type: 'string'},
		{name: 'vendorDetailsEmail', mapping: 'vendorDetails.email', type: 'string'},
		{name: 'externalLink', type: 'string'},
		{name: 'videoLink', type: 'string'},
		{name: 'ecoFriendlySolarPanels', mapping: 'ecoFriendly.solarPanels', type: 'string'}, //yes|no
		{name: 'ecoFriendlySolarHotWater', mapping: 'ecoFriendly.solarHotWater', type: 'string'}, //yes|no
		{name: 'ecoFriendlyWaterTank', mapping: 'ecoFriendly.waterTank', type: 'string'}, //yes|no
		{name: 'ecoFriendlyGreyWaterSystem', mapping: 'ecoFriendly.greyWaterSystem', type: 'string'}, //yes|no
		{name: 'idealForFirstHomeBuyer', mapping: 'idealFor.firstHomeBuyer', type: 'string'}, //yes|no
		{name: 'idealForInvestors', mapping: 'idealFor.investors', type: 'string'}, //yes|no
		{name: 'idealForDownsizing', mapping: 'idealFor.downsizing', type: 'string'}, //yes|no
		{name: 'idealForCouples', mapping: 'idealFor.couples', type: 'string'}, //yes|no
		{name: 'idealForStudents', mapping: 'idealFor.students', type: 'string'}, //yes|no
		{name: 'idealForLrgFamilies', mapping: 'idealFor.lrgFamilies', type: 'string'}, //yes|no
		{name: 'idealForRetirees', mapping: 'idealFor.retirees', type: 'string'}, //yes|no
		{name: 'viewsCity', mapping: 'views.city', type: 'string'}, //yes|no
		{name: 'viewsWater', mapping: 'views.water', type: 'string'}, //yes|no
		{name: 'viewsValley', mapping: 'views.valley', type: 'string'}, //yes|no
		{name: 'viewsMountain', mapping: 'views.mountain', type: 'string'}, //yes|no
		{name: 'viewsOcean', mapping: 'views.ocean', type: 'string'}, //yes|no
		{name: 'viewsSea', mapping: 'views.sea', type: 'string'}, //yes|no
		{
			name: 'images', 
			convert: function(val, record){
				var images = new Array();
				Ext.each(val, function(name, index, image){
					images = Ext.Array.push(images, [{url: name.url, title: name.title, primary: name.primary}]);
				});
				return images;
			}
		},{
			name: 'floorplans', 
			convert: function(val, record){
				var objects = new Array();
				Ext.each(val, function(name, index, object){
					objects = Ext.Array.push(objects, [{url: name.url, title: name.title}]);
				});
				return objects;
			}
		},{
			name: 'documents', 
			convert: function(val, record){
				var objects = new Array();
				Ext.each(val, function(name, index, object){
					objects = Ext.Array.push(objects, [{url: name.url, title: name.title}]);
				});
				return objects;
			}
		}
	],
	validations: [
		{field: 'status', type: 'inclusion', list: ['current', 'withdrawn', 'sold', 'offmarket','leased']},
		{field: 'uniqueID', type: 'presence'},
		{field: 'authority', type: 'inclusion', list: ['auction', 'exclusive', 'multilist', 'conjunctional', 'open', 'sale', 'setsale']},
		{field: 'listingAgent1AgentID', type: 'presence'},
		{field: 'listingAgent1Name', type: 'presence'},
		{field: 'category', type: 'inclusion', list: ['House', 'Unit', 'Townhouse', 'Villa', 'Apartment', 'Flat', 'Studio', 'Warehouse', 'DuplexSemi-detached', 'Alpine', 'AcreageSemi-rural', 'Retirement', 'BlockOfUnits', 'Terrace', 'ServicedApartment', 'Other']},
		{field: 'landDetailsAreaUnit', type: 'inclusion', list: ['square', 'squareMeter', 'acre', 'hectare']},
		{field: 'landDetailsFrontageUnit', type: 'inclusion', list: ['meter']},
		{field: 'landDetailsDepthUnit', type: 'inclusion', list: ['meter']},
		{field: 'landDetailsDepthSide', type: 'inclusion', list: ['rear', 'left', 'right']},
		{field: 'landDetailsCrossOver', type: 'inclusion', list: ['left', 'right', 'center']},
		{field: 'buildingDetailsAreaUnit', type: 'inclusion', list: ['square', 'squareMeter', 'acre', 'hectare']},
		{field: 'underOffer', type: 'inclusion', list: ['yes', 'no']},
		{field: 'isHomeLandPackage', type: 'inclusion', list: ['yes', 'no']},
		{field: 'newConstruction', type: 'inclusion', list: ['yes', 'no']},
		{field: 'priceDisplay', type: 'inclusion', list: ['yes', 'no']},
		{field: 'addressSuburbDisplay', type: 'inclusion', list: ['yes', 'no']}
	]
});