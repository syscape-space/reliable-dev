<?php
/*
* To implement in admingroups permissions
* to remove CRUD from Validation remove route name
* CRUD Role permission (create,read,update,delete)
* [it v 1.6.38]
*/
return [
	"balancewithdrawals"=>["create","read","update","delete"],
	"balancerecharges"=>["create","read","update","delete"],
	"systemmessages"=>["create","read","update","delete"],
	"orderarbitratorinvoices"=>["create","read","update","delete"],
	"orderarbitrators"=>["create","read","update","delete"],
	"orderofferinvoices"=>["read","update","delete"],
	"orderoffers"=>["create","read","update","delete"],
	"userjobs"=>["create","read","update","delete"],
	"ordertypes"=>["create","read","update","delete"],
	"orders"=>["create","read","update","delete"],
	"contactus"=>["create","read","update","delete"],
	"packagerequests"=>["create","read","update","delete"],
	"vendorpackages"=>["create","read","update","delete"],
	"users"=>["create","read","update","delete"],
	"tickets"=>["create","read","update","delete"],
	"ticketdepartments"=>["create","read","update","delete"],
	"departments"=>["create","read","update","delete"],
	"faqs"=>["create","read","update","delete"],
	"subscriptionfees"=>["read","update","delete"],
	"usercommercials"=>["create","read","update","delete"],
	"userqualifications"=>["create","read","update","delete"],
	"userexperiences"=>["create","read","update","delete"],
	"userlicenses"=>["create","read","update","delete"],
	"occupations"=>["create","read","update","delete"],
	"specialties"=>["create","read","update","delete"],
	"pages"=>["create","read","update","delete"],
	"socials"=>["create","read","update","delete"],
	"cities"=>["create","read","update","delete"],
	"countries"=>["create","read","update","delete"],
	"admins"=>["create","read","update","delete"],
	"admingroups"=>["create","read","update","delete"],
];