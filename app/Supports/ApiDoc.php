<?php

namespace App\Supports;
use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\Reservation;

class ApiDoc {

	public function get($key = NULL)
	{

		$return =  [

			'headers'=>[
				'Content-Type' =>'application/json',
				'Accept'       =>'application/json',
				'Accept-Language'	=>'En',
				'x-api-key'    => env('API_KEY'),
			],

			'methods'=>[
				#Login
				[
					'name'=>'Login',
          			'type'=>'all',
					'headers'=>[],
					'url'=>'/api/login',
					'method'=>'POST',
					'description'=>'Login',
					'parameters'=> $this->postParamaeters(new \App\Http\Requests\Api\Clients\Auth\LoginRequest()),
					'responses'=>[
						[
							'code'=>200,
							'data'=>['data'=>(new \App\Http\Resources\UserResource(factory(\App\Models\Api\User::class)->make()))->toArray(request())],
						],
						[
							'code'=>401,
							'data'=>'{"error":"Invalid email or password"}',
						],
						[
							'code'=>422,
							'data'=>'{"message":"The given data was invalid.","errors":{"password":["The password field is required."]}}',
						],
                        [
                            'code'=>417,
                            'data'=>'{"error":"Suspended"}',
                        ],
					]
				],
				
				#Change password
				[
					'name'=>'Change password',
          			'type'=>'all',
					'headers'=>["Authorization" => "Bearer {token}"],
					'url'=>'/api/change-password',
					'method'=>'POST',
					'description'=>'Change password',
					'parameters'=> $this->postParamaeters(new \App\Http\Requests\Api\ChangePasswordRequest()),
					'responses'=>[
						[
							'code'=>200,
							'data'=>'{"message":"The given data was invalid.","errors":{"password":["The password field is required."]}}',
						],
                        [
                            'code'=>417,
                            'data'=>'{"error":"Suspended"}',
                        ],
					]
				],

				#Check Email
				[
					'name'=>'Check Email',
          			'type'=>'all',
					'headers'=>[],
					'url'=>'/api/check/email',
					'method'=>'POST',
					'description'=>'Check email availablity',
					'parameters'=>[[
								'name'=>'email',
								'type'=>'post',
								'validation'=>'required'
								]
							],
					'responses'=>[
						[
							'code'=>200,
							'data'=>0,
						]
					]
				],
				#Check Phone
				[
					'name'=>'Check Phone',
          			'type'=>'all',
					'headers'=>[],
					'url'=>'/api/check/phone',
					'method'=>'POST',
					'description'=>'Check Phone availablity',
					'parameters'=>[[
								'name'=>'phone',
								'type'=>'post',
								'validation'=>'required'
								]
							],
					'responses'=>[
						[
							'code'=>200,
							'data'=>0,
						]
					]
				],
				/************************** ACCOUNT ACTIVATION ***************/

				#Check activation status
				[
					'name'=>'Check activation status',
          			'type'=>'all',
					'headers'=>["Authorization" => "Bearer {token}"],
					'url'=>'/api/activate/check',
					'method'=>'GET',
					'description'=>'Check if the client/company\'s account is activated',
					'parameters'=>[],
					'responses'=>[
						[
							'code'=>200,
							'data'=>1,
						]
					]
				],

				#Send activation email
				[
					'name'=>'Send Activation Email',
          			'type'=>'all',
					'headers'=>["Authorization" => "Bearer {token}"],
					'url'=>'/api/activate/email/send',
					'method'=>'POST',
					'description'=>'Send activation email',
					'parameters'=>[],
					'responses'=>[
						[
							'code'=>200,
							'data'=>[ 'message' => 'Sent Successfully' ],
						]
					]
				],

				#Activate phone number
				[
					'name'=>'Activate Phone',
          			'type'=>'all',
					'headers'=>["Authorization" => "Bearer {token}"],
					'url'=>'/api/activate/phone',
					'method'=>'POST',
					'description'=>'Activate phone number',
					'parameters'=>[
						[
							'name'=>'code',
							'type'=>'post',
							'validation'=>'required'
						]
					],
					'responses'=>[
						[
							'code'=>200,
							'data'=>[ 'message' => 'Activated successfully' ],
						],
						[
							'code'=>403,
							'data'=>[ 'message' => 'Invalid activation code' ],
						]
					]
				],
				#Send activation code
				[
					'name'=>'Send Activation Code',
          			'type'=>'all',
					'headers'=>["Authorization" => "Bearer {token}"],
					'url'=>'/api/activate/phone/send',
					'method'=>'POST',
					'description'=>'Send phone activation code SMS',
					'parameters'=>[
						[
							'name'=>'phone',
							'type'=>'post',
							'validation'=>'required'
						]
					],
					'responses'=>[
						[
							'code'=>200,
							'data'=>[ 'message' => 'Sent successfully' ],
						],

						[
							'code'=>403,
							'data'=>[ 'message' => 'Already confirmed' ],
						]
					]
				],

				#Check Activation Code Sent
				[
					'name'=>'Check Activation Code Sent',
          			'type'=>'all',
					'headers'=>["Authorization" => "Bearer {token}"],
					'url'=>'/api/activate/phone/sent',
					'method'=>'POST',
					'description'=>'Check if the user had already requested an activation code',
					'parameters'=>[],
					'responses'=>[
						[
							'code'=>200,
							'data'=>1,
						]
					]
				],

				/*****************************CLIENTS*********************************/

				#Client Registration
				[
					'name'=>'Client Registration',
          			'type'=>'client',
					'headers'=>[],
					'url'=>'/api/clients/register',
					'method'=>'POST',
					'description'=>'Client Registration',
					'parameters'=>$this->postParamaeters(new \App\Http\Requests\Api\Clients\Auth\RegisterRequest()),
					'responses'=>[
						[
							'code'=>200,
							'data'=>['data'=>(new \App\Http\Resources\UserResource(factory(\App\Models\Api\User::class)->make()))->toArray(request())],
						],
						[
							'code'=>422,
							'data'=>'{"message":"The given data was invalid.","errors":{"password":["The password field is required."]}}',
						],
                        [
                            'code'=>500,
                            'data'=>'{"error":"Errors occured please try again later"}',
                        ]
                    ],
                ],

				#Create comments
				[
					'name'=>'Create Comments',
          			'type'=>'client',
					'headers'=>["Authorization" => "Bearer {token}"],
					'url'=>'/api/clients/comments',
					'method'=>'POST',
					'description'=>'Create a comment',
					'parameters'=>$this->postParamaeters(new \App\Http\Requests\Api\Clients\CommentRequest()),
					'responses'=>[
						[
							'code'=>200,
							'data'=>'{"message": "Added successfully"}',
						],
						[
							'code'=>422,
							'data'=>'{"message":"The given data was invalid.","errors":{"password":["The password field is required."]}}',
						],
						[
							'code'=>500,
							'data'=>'{"error":"Errors occured please try again later"}',
						],
					]
				],
				#Update comments
				[
					'name'=>'Update Comments',
          			'type'=>'client',
					'headers'=>["Authorization" => "Bearer {token}"],
					'url'=>'/api/clients/comments/{id}',
					'method'=>'PUT',
					'description'=>'Update an existing comment',
					'parameters'=>array_merge($this->getParameters("id"), $this->postParamaeters(new \App\Http\Requests\Api\Clients\CommentRequest())),
					'responses'=>[
						[
							'code'=>200,
							'data'=>'{"message": "Updated successfully"}',
						],
						[
							'code'=>422,
							'data'=>'{"message":"The given data was invalid.","errors":{"password":["The password field is required."]}}',
						],
						[
							'code'=>500,
							'data'=>'{"error":"Errors occured please try again later"}',
						],
					]
				],
				#Delete comments
				[
					'name'=>'Delete Comments',
          			'type'=>'client',
					'headers'=>["Authorization" => "Bearer {token}"],
					'url'=>'/api/clients/comments/{id}',
					'method'=>'DELETE',
					'description'=>'Delete an exiting comment',
					'parameters'=>$this -> getParameters("id"),
					'responses'=>[
						[
							'code'=>200,
							'data'=>'{"message":"Deleted successfully"}',
						],
						[
							'code'=>500,
							'data'=>'{"error":"Errors occured please try again later"}',
						],
					]
				],


				// #Create ratings
				// [
				// 	'name'=>'Create Ratings',
    //       'type'=>'client',
				// 	'headers'=>["Authorization" => "Bearer {token}"],
				// 	'url'=>'/api/clients/ratings',
				// 	'method'=>'POST',
				// 	'description'=>'Rate a specific company',
				// 	'parameters'=>$this->postParamaeters(new \App\Http\Requests\Api\Clients\RatingRequest()),
				// 	'responses'=>[
				// 		[
				// 			'code'=>200,
				// 			'data'=>'{"message": "Added successfully"}',
				// 		],
				// 		[
				// 			'code'=>422,
				// 			'data'=>'{"message":"The given data was invalid.","errors":{"password":["The password field is required."]}}',
				// 		],
    //         [
    //             'code'=>500,
    //             'data'=>'{"error":"Errors occured please try again later"}',
    //         ],
				// 	]
				// ],
				// #Update ratings
				// [
				// 	'name'=>'Update Ratings',
    //       'type'=>'client',
				// 	'headers'=>["Authorization" => "Bearer {token}"],
				// 	'url'=>'/api/clients/ratings/{id}',
				// 	'method'=>'PUT',
				// 	'description'=>'Update an existing rating for a specific company',
				// 	'parameters'=> array_merge($this->getParameters("id"), $this->postParamaeters(new \App\Http\Requests\Api\Clients\RatingRequest())),
				// 	'responses'=>[
				// 		[
				// 			'code'=>200,
				// 			'data'=>'{"message": "Updated successfully"}',
				// 		],
				// 		[
				// 			'code'=>422,
				// 			'data'=>'{"message":"The given data was invalid.","errors":{"password":["The password field is required."]}}',
				// 		],
    //         [
    //             'code'=>500,
    //             'data'=>'{"error":"Errors occured please try again later"}',
    //         ],
				// 	]
				// ],
				// #Delete ratings
				// [
				// 	'name'=>'Delete Ratings',
    //       'type'=>'client',
				// 	'headers'=>["Authorization" => "Bearer {token}"],
				// 	'url'=>'/api/clients/ratings/{id}',
				// 	'method'=>'DELETE',
				// 	'description'=>'Delete an exiting rating for a specific company',
				// 	'parameters'=>$this -> getParameters("id"),
				// 	'responses'=>[
				// 		[
				// 			'code'=>200,
				// 			'data'=>'{"message":"Deleted successfully"}',
				// 		],
    //         [
    //             'code'=>500,
    //             'data'=>'{"error":"Errors occured please try again later"}',
    //         ],
				// 	]
				// ],



		/************************************ Companies ********************************************/
				#Company Registration
				[
					'name'=>'Company Registration',
          			'type'=>'company',
					'headers'=>[],
					'url'=>'/api/companies/register',
					'method'=>'POST',
					'description'=>'Company Registration',
					'parameters'=>$this->postParamaeters(new \App\Http\Requests\Api\Companies\Auth\RegisterRequest()),
					'responses'=>[
						[
							'code'=>200,
							'data'=>['data'=>(new \App\Http\Resources\UserResource(factory(\App\Models\Api\User::class)->make(['description' => 'description'])))->toArray(request())],
						],
						[
							'code'=>422,
							'data'=>'{"message":"The given data was invalid.","errors":{"password":["The password field is required."]}}',
						],
                        [
                            'code'=>500,
                            'data'=>'{"error":"Errors occured please try again later"}',
                        ],
					]
				],

				#Company Subscription
	      [
	          'name'=>'Company Subscription',
	          'type'=>'company',
	          'headers'=>["Authorization" => "Bearer {token}"],
	          'url'=>'/api/companies/subscribe',
	          'method'=>'POST',
	          'description'=>'Subscribe to a plan',
	          'parameters'=>$this->postParamaeters(new \App\Http\Requests\Api\Companies\SubscriptionRequest()),
	          'responses'=>[
	              [
	                  'code'=>200,
	                  'data'=>'{"message": "Added successfully"}',
	              ],
	              [
	                  'code'=>422,
	                  'data'=>'{"message":"The given data was invalid.","errors":{"password":["The password field is required."]}}',
	              ],
	              [
	                  'code'=>500,
	                  'data'=>'{"error":"Errors occured please try again later"}',
	              ],
	          ]
	      ],


	      #Update Meta Data
	      [
	          'name'=>'Update MetaData',
	          'type'=>'company',
	          'headers'=>["Authorization" => "Bearer {token}"],
	          'url'=>'/api/companies/company-meta-data',
	          'method'=>'PUT',
	          'description'=>'Update the metadata for an existing project',
	          'parameters'=> $this->postParamaeters(new \App\Http\Requests\Api\Companies\CompanyMetaDataRequest()),
	          'responses'=>[
	              [
	                  'code'=>200,
	                  'data'=>'{"message": "Updated successfully"}',
	              ],
	              [
	                  'code'=>422,
	                  'data'=>'{"message":"The given data was invalid.","errors":{"password":["The password field is required."]}}',
	              ],
	              [
	                  'code'=>500,
	                  'data'=>'{"error":"Errors occured please try again later"}',
	              ],
	          ]
	      ],


	      #Create Projects
	      [
	          'name'=>'Create Projects',
	          'type'=>'company',
	          'headers'=>["Authorization" => "Bearer {token}"],
	          'url'=>'/api/companies/projects',
	          'method'=>'POST',
	          'description'=>'Create a project',
	          'parameters'=>$this->postParamaeters(new \App\Http\Requests\Api\Companies\ProjectRequest()),
	          'responses'=>[
	              [
	                  'code'=>200,
	                  'data'=>'{"message": "Added successfully"}',
	              ],
	              [
	                  'code'=>422,
	                  'data'=>'{"message":"The given data was invalid.","errors":{"password":["The password field is required."]}}',
	              ],
	              [
	                  'code'=>500,
	                  'data'=>'{"error":"Errors occured please try again later"}',
	              ],
	          ]
	      ],
	      #Update Projects
	      [
	          'name'=>'Update Projects',
	          'type'=>'company',
	          'headers'=>["Authorization" => "Bearer {token}"],
	          'url'=>'/api/companies/projects/{id}',
	          'method'=>'PUT',
	          'description'=>'Update an existing project',
	          'parameters'=> array_merge($this->getParameters("id"), $this->postParamaeters(new \App\Http\Requests\Api\Companies\ProjectRequest())),
	          'responses'=>[
	              [
	                  'code'=>200,
	                  'data'=>'{"message": "Updated successfully"}',
	              ],
	              [
	                  'code'=>422,
	                  'data'=>'{"message":"The given data was invalid.","errors":{"password":["The password field is required."]}}',
	              ],
	              [
	                  'code'=>500,
	                  'data'=>'{"error":"Errors occured please try again later"}',
	              ],
	          ]
	      ],

	      #Delete Projects
	      [
	          'name'=>'Delete Projects',
	          'type'=>'company',
	          'headers'=>["Authorization" => "Bearer {token}"],
	          'url'=>'/api/companies/projects/{id}',
	          'method'=>'DELETE',
	          'description'=>'Delete an existing project',
	          'parameters'=> $this -> getParameters("id"),
	          'responses'=>[
	              [
									'code'=>200,
									'data'=>'{"message":"Deleted successfully"}',
								],
	              [
                  'code'=>500,
                  'data'=>'{"error":"Errors occured please try again later"}',
	              ],
	          ]
	      ],

				#Update workdays
				[
					'name'=>'Update Work Days',
          			'type'=>'company',
					'headers'=>["Authorization" => "Bearer {token}"],
					'url'=>'/api/companies/workdays',
					'method'=>'PUT',
					'description'=>'Update a workday for a specific company',
					'parameters'=>[
						["name" => "days", "type" => "POST", "validation" => "required , array"],
						["name" => "days.*.day", "type" => "POST", "validation" => "required , in(saturday, sunday, monday, tuesday, wednesday, thursday, friday)"],
						["name" => "days.*.from", "type" => "POST", "validation" => "required , string"],
						["name" => "days.*.to", "type" => "POST", "validation" => "required , string"],
						["name" => "days.*.shift", "type" => "POST", "validation" => "required , in(night, morning)"]

					],
					'responses'=>[
						[
							'code'=>200,
							'data'=>'{"message": "Updated successfully"}',
						],
						[
							'code'=>422,
							'data'=>'{"message":"The given data was invalid.","errors":{"password":["The password field is required."]}}',
						],
            [
                'code'=>500,
                'data'=>'{"error":"Errors occured please try again later"}',
            ],
					]
				],
				// #Delete workdays
				// [
				// 	'name'=>'Delete Work Days',
    //       'type'=>'company',
				// 	'headers'=>["Authorization" => "Bearer {token}"],
				// 	'url'=>'/api/companies/workdays/{id}',
				// 	'method'=>'DELETE',
				// 	'description'=>'Delete a workday for a specific company',
				// 	'parameters'=>$this -> getParameters("id"),
				// 	'responses'=>[
				// 		[
				// 			'code'=>200,
				// 			'data'=>'{"message":"Deleted successfully"}',
				// 		],
    //         [
    //             'code'=>500,
    //             'data'=>'{"error":"Errors occured please try again later"}',
    //         ],
				// 	]
				// ],

				#Get Ads
				[
					'name'=>'Get Ads',
          			'type'=>'company',
					'headers'=>["Authorization" => "Bearer {token}"],
					'url'=>'/api/companies/ads',
					'method'=>'GET',
					'description'=>'Get all the ads for this company',
					'parameters'=>[],
					'responses'=>[
						[
							'code'=>200,
							'data'=>['data'=>(\App\Http\Resources\AdResource::collection(factory(\App\Models\Ad::class, 3)->make()))],
						],
						[
							'code'=>422,
							'data'=>'{"message":"The given data was invalid.","errors":{"password":["The password field is required."]}}',
						],
                        [
                            'code'=>500,
                            'data'=>'{"error":"Errors occured please try again later"}',
                        ],
					]
				],
				#Create Ads
				[
					'name'=>'Create Ads',
          			'type'=>'company',
					'headers'=>["Authorization" => "Bearer {token}"],
					'url'=>'/api/companies/ads',
					'method'=>'POST',
					'description'=>'Create Ad',
					'parameters'=>$this->postParamaeters(new \App\Http\Requests\Api\Companies\AdRequest()),
					'responses'=>[
						[
							'code'=>200,
							'data'=>['data'=>(new \App\Http\Resources\AdResource(factory(\App\Models\Ad::class)->make()))->toArray(request())],
						],
						[
							'code'=>422,
							'data'=>'{"message":"The given data was invalid.","errors":{"password":["The password field is required."]}}',
						],
                        [
                            'code'=>500,
                            'data'=>'{"error":"Errors occured please try again later"}',
                        ],
					]
				],
				#Update Ads
				[
					'name'=>'Update Ads',
          			'type'=>'company',
					'headers'=>["Authorization" => "Bearer {token}"],
					'url'=>'/api/companies/ads/{id}',
					'method'=>'PUT',
					'description'=>'Update Ad',
					'parameters'=>array_merge($this->getParameters("id"), $this->postParamaeters(new \App\Http\Requests\Api\Companies\AdRequest())),
					'responses'=>[
						[
							'code'=>200,
							'data'=>['data'=>(new \App\Http\Resources\AdResource(factory(\App\Models\Ad::class)->make()))->toArray(request())],
						],
						[
							'code'=>422,
							'data'=>'{"message":"The given data was invalid.","errors":{"password":["The password field is required."]}}',
						],
                        [
                            'code'=>500,
                            'data'=>'{"error":"Errors occured please try again later"}',
                        ],
					]
				],
				#Delete Ads
				[
					'name'=>'Delete Ads',
          			'type'=>'company',
					'headers'=>["Authorization" => "Bearer {token}"],
					'url'=>'/api/companies/ads/{id}',
					'method'=>'DELETE',
					'description'=>'Delete Ad',
					'parameters'=>$this -> getParameters("id"),
					'responses'=>[
						[
							'code'=>200,
							'data'=>'{"message":"Deleted successfully"}',
						],
                        [
                            'code'=>500,
                            'data'=>'{"error":"Errors occured please try again later"}',
                        ],
					]
				],


				/************************************** Companies search ******************************/
				[
					'name'=>'Companies Search',
          			'type'=>'all',
					'headers'=>[],
					'url'=>'/api/search',
					'method'=>'GET',
					'description'=>'Search for companies',
					'parameters'=>array_merge(
						$this -> getParameters("country?", "city?", "specialization?", "category?"),
						[
							[
								"name" => "sort",
								"type" => "GET",
								"validation" => "optional|in:rating,-rating,time,-time"
							]
						]
					),
					'responses'=>[
						[
							'code'=>200,
							'data'=>['data'=>(\App\Http\Resources\CompanyResource::collection(\App\Models\Api\User::where("role", \App\Models\Api\User::COMPANY_ROLE) -> paginate(10)))->toArray(request())],
						]
					]
				],

				/************************************** Company Details ******************************/

				[
					'name'=>'Company Details',
          			'type'=>'all',
					'headers'=>["Authorization" => "Bearer {token}"],
					'url'=>'/api/company/{id}',
					'method'=>'GET',
					'description'=>'Get the details for a specific company',
					'parameters'=>$this -> getParameters("id"),
					'responses'=>[
						[
							'code'=>200,
							'data'=>['data'=>(new \App\Http\Resources\CompanyDetailsResource(\App\Models\Api\User::where("role", \App\Models\Api\User::COMPANY_ROLE) -> first()))->toArray(request())],
						]
					]
				],

				[
					'name'=>'Company Data',
          			'type'=>'all',
					'headers'=>["Authorization" => "Bearer {token}"],
					'url'=>'/api/company/{id}/data',
					'method'=>'GET',
					'description'=>'Get the full data for a specific company',
					'parameters'=>$this -> getParameters("id"),
					'responses'=>[
						[
							'code'=>200,
							'data'=>['data'=>(new \App\Http\Resources\CompanyDataResource(\App\Models\Api\User::where("role", \App\Models\Api\User::COMPANY_ROLE) -> first()))->toArray(request())],
						]
					]
				],



				[
					'name'=>'Company Projects',
          			'type'=>'all',
					'headers'=>["Authorization" => "Bearer {token}"],
					'url'=>'/api/company/{id}/projects',
					'method'=>'GET',
					'description'=>'Get the projects for a specific company',
					'parameters'=>$this -> getParameters("id"),
					'responses'=>[
						[
							'code'=>200,
							'data'=>['data'=>(\App\Http\Resources\ProjectResource::collection(factory(\App\Models\Project::class, 15)->make()))->toArray(request())],
						]
					]
				],

				[
					'name'=>'Company Comments',
          			'type'=>'all',
					'headers'=>["Authorization" => "Bearer {token}"],
					'url'=>'/api/company/{id}/comments',
					'method'=>'GET',
					'description'=>'Get the comments for a specific company',
					'parameters'=>$this -> getParameters("id"),
					'responses'=>[
						[
							'code'=>200,
							'data'=>[
								'data'=>(\App\Http\Resources\CommentResource::collection(factory(\App\Models\Comment::class, 15)->make()))->toArray(request()),
								'commentable' => false
							],
						]
					]
				],


				/************************************** Utilties ******************************/

				#Get Contacts
				[
					'name'=>'Get Contacts',
          			'type'=>'all',
					'headers'=>[],
					'url'=>'/api/utilities/contacts',
					'method'=>'GET',
					'description'=>'Get all contacts',
					'parameters'=>[],
					'responses'=>[
						[
							'code'=>200,
							'data'=>['data'=>(new \App\Http\Resources\ContactResource(factory(\App\Models\Contacts::class)->make()))->toArray(request())],
						]
					]
				],

				#Get Plans
				[
					'name'=>'Get Plans',
          			'type'=>'all',
					'headers'=>[],
					'url'=>'/api/utilities/plans',
					'method'=>'GET',
					'description'=>'Get available plans',
					'parameters'=>[],
					'responses'=>[
						[
							'code'=>200,
							'data'=>['data'=>(\App\Http\Resources\PlanResource::collection(\App\Models\Plan::all()))->toArray(request())],
						]
					]
				],

				#Get Settings
				[
					'name'=>'Get Settings',
          			'type'=>'all',
					'headers'=>[],
					'url'=>'/api/utilities/settings',
					'method'=>'GET',
					'description'=>'Get the website\'s settings',
					'parameters'=>[],
					'responses'=>[
						[
							'code'=>200,
							'data'=>['data'=>(new \App\Http\Resources\SettingResource(\App\Models\Setting::first()))->toArray(request())],
						]
					]
				],


				#Get Countries
				[
					'name'=>'Get Countries',
          			'type'=>'all',
					'headers'=>[],
					'url'=>'/api/utilities/countries',
					'method'=>'GET',
					'description'=>'Get Countries',
					'parameters'=>[],
					'responses'=>[
						[
							'code'=>200,
							'data'=>['data'=>(\App\Http\Resources\CountryResource::collection(\App\Models\Country::all()))->toArray(request())],
						]
					]
				],
				#Get Cities
				[
					'name'=>'Get Cities',
          			'type'=>'all',
					'headers'=>[],
					'url'=>'/api/utilities/cities',
					'method'=>'GET',
					'description'=>'Get Cities',
					'parameters'=>[],
					'responses'=>[
						[
							'code'=>200,
							'data'=>['data'=>(\App\Http\Resources\CityResource::collection(\App\Models\City::all()))->toArray(request())],
						]
					]
				],
				#Get Categories
				[
					'name'=>'Get Categories',
          			'type'=>'all',
					'headers'=>[],
					'url'=>'/api/utilities/categories',
					'method'=>'GET',
					'description'=>'Get Categories',
					'parameters'=>[],
					'responses'=>[
						[
							'code'=>200,
							'data'=>['data'=>(\App\Http\Resources\CategoryResource::collection(\App\Models\Category::all()))->toArray(request())],
						]
					]
				],
				#Get Specializations
				[
					'name'=>'Get Specializations',
          			'type'=>'all',
					'headers'=>[],
					'url'=>'/api/utilities/specializations',
					'method'=>'GET',
					'description'=>'Get Specializations',
					'parameters'=>[],
					'responses'=>[
						[
							'code'=>200,
							'data'=>['data'=>(\App\Http\Resources\SpecializationResource::collection(\App\Models\Specialization::all()))->toArray(request())],
						]
					]
				],
				#Get Durations
				[
					'name'=>'Get Durations',
          			'type'=>'all',
					'headers'=>[],
					'url'=>'/api/utilities/durations',
					'method'=>'GET',
					'description'=>'Get Durations',
					'parameters'=>[],
					'responses'=>[
						[
							'code'=>200,
							'data'=>['data'=>\App\Models\Ad::$durations],
						]
					]
				],
				#Get Ads
				[
					'name'=>'Get Ads',
					'type'=>'all',
					'headers'=>[],
					'url'=>'/api/utilities/ads',
					'method'=>'GET',
					'description'=>'Get Ads',
					'parameters'=>[],
					'responses'=>[
						[
							'code'=>200,
							'data'=>['data'=>(\App\Http\Resources\AdResource::collection(\App\Models\Ad::paginate()))->toArray(request())],
							]
							]
						],
				#Get About us page
				[
					'name'=>'Get About us page',
					'type'=>'all',
					'headers'=>[],
					'url'=>'/api/utilities/page/'.Pages::ABOUT_US,
					'method'=>'GET',
					'description'=>'Get About us page',
					'parameters'=>[],
					'responses'=>[
						[
							'code'=>200,
							'data'=>['data'=>(new \App\Http\Resources\PageResource(factory(\App\Models\Pages::class)->make()))->toArray(request())],
							]
							]
				],
				#Get Privacy page
				[
					'name'=>'Get Privacy page',
					'type'=>'all',
					'headers'=>[],
					'url'=>'/api/utilities/page/'.Pages::PRIVACY,
					'method'=>'GET',
					'description'=>'Get Privacy page',
					'parameters'=>[],
					'responses'=>[
						[
							'code'=>200,
							'data'=>['data'=>(new \App\Http\Resources\PageResource(factory(\App\Models\Pages::class)->make()))->toArray(request())],
							]
							]
						],
										
					#Get Company types
					[
						'name'=>'Get Company Types',
						'type'=>'all',
						'headers'=>[],
						'url'=>'/api/types',
						'method'=>'GET',
						'description'=>'Get Company Types',
						'parameters'=>[],
						'responses'=>[
							[
								'code'=>200,
								'data'=>['data'=>\App\Models\Api\User::getCompanytype()],
							]
						]
					],
					#Client Create Reservation
					[
						'name'=>'Client Create Reservation',
	          			'type'=>'client',
						'headers'=>["Authorization" => "Bearer {token}"],
						'url'=>'/api/clients/reservation',
						'method'=>'POST',
						'description'=>'Create a reservation',
						'parameters'=>$this->postParamaeters(new \App\Http\Requests\Api\Clients\ReservationRequest()),
						'responses'=>[
							[
								'code'=>200,
								'data'=>'{"message": "Added successfully"}',
							],
							[
								'code'=>500,
								'data'=>'{"error":"Errors occured please try again later"}',
							],
						]
					],

					#Company Approve Reservation
					[
						'name'=>'Company Approve Reservation',
	          			'type'=>'company',
						'headers'=>["Authorization" => "Bearer {token}"],
						'url'=>'/api/companies/reservation/{id}',
						'method'=>'PUT',
						'description'=>'Approve a reservation',
						'parameters'=>$this->postParamaeters(new \App\Http\Requests\Api\Companies\ReservationRequest()),
						'responses'=>[
							[
								'code'=>200,
								'data'=>'{"message": "Added successfully"}',
							],
							[
								'code'=>500,
								'data'=>'{"error":"Errors occured please try again later"}',
							],
						]
					],
					#Get  Reservation
					[
						'name'=>'Get Reservation ',
						'type'=>'all',
						'headers'=>["Authorization" => "Bearer {token}"],
						'url'=>'/api/companies/reservation/{id}',
						'method'=>'GET',
						'description'=>'Company Reservation approve status',
						'parameters'=>[],
						'responses'=>[
							[
								'code'=>200,
								'data'=>['data'=>(new \App\Http\Resources\ReservationResource(factory(\App\Models\Reservation::class)->make()))->toArray(request())]
							]
						]
					],
					
					#Get Company Reservation approve status
					[
						'name'=>'Get Company Reservation approve status',
						'type'=>'all',
						'headers'=>["Authorization" => "Bearer {token}"],
						'url'=>'/api/companies/get-reservation/approved',
						'method'=>'GET',
						'description'=>'Company Reservation approve status',
						'parameters'=>[],
						'responses'=>[
							[
								'code'=>200,
								'data'=>['data'=>(\App\Http\Resources\ReservationResource::collection(\App\Models\Reservation::where('status',Reservation::STATUS_APPROVED)->paginate()))->toArray(request())],
							]
						]
					],
					#Get Company Reservation pendding status
					[
						'name'=>'Get Company Reservation pendding status',
						'type'=>'all',
						'headers'=>["Authorization" => "Bearer {token}"],
						'url'=>'/api/companies/get-reservation/pendding',
						'method'=>'GET',
						'description'=>'Company Reservation pendding status',
						'parameters'=>[],
						'responses'=>[
							[
								'code'=>200,
								'data'=>['data'=>(\App\Http\Resources\ReservationResource::collection(\App\Models\Reservation::where('status',Reservation::STATUS_PENDING)->paginate()))->toArray(request())],
							]
						]
					],
					#Get Company all Reservations
					[
						'name'=>'Get Company Reservations',
						'type'=>'all',
						'headers'=>["Authorization" => "Bearer {token}"],
						'url'=>'/api/companies/get-reservation',
						'method'=>'GET',
						'description'=>'Get Company Reservation',
						'parameters'=>[],
						'responses'=>[
							[
								'code'=>200,
								'data'=>['data'=>(\App\Http\Resources\ReservationResource::collection(\App\Models\Reservation::paginate()))->toArray(request())],
							]
						]
					],
					#Get clients Reservation approve status
					[
						'name'=>'Get clients Reservation approve status',
						'type'=>'all',
						'headers'=>["Authorization" => "Bearer {token}"],
						'url'=>'/api/clients/get-reservation/approved',
						'method'=>'GET',
						'description'=>'Clients Reservation approve status',
						'parameters'=>[],
						'responses'=>[
							[
								'code'=>200,
								'data'=>['data'=>(\App\Http\Resources\ReservationResource::collection(\App\Models\Reservation::where('status',Reservation::STATUS_APPROVED)->paginate()))->toArray(request())],
							]
						]
					],
					#Get clients Reservation pendding status
					[
						'name'=>'Get clients Reservation pendding status',
						'type'=>'all',
						'headers'=>["Authorization" => "Bearer {token}"],
						'url'=>'/api/clients/get-reservation/pendding',
						'method'=>'GET',
						'description'=>'Clients Reservation pendding status',
						'parameters'=>[],
						'responses'=>[
							[
								'code'=>200,
								'data'=>['data'=>(\App\Http\Resources\ReservationResource::collection(\App\Models\Reservation::where('status',Reservation::STATUS_PENDING)->paginate()))->toArray(request())],
							]
						]
					],
					#Get clients all Reservations
					[
						'name'=>'Get Clients Reservations',
						'type'=>'all',
						'headers'=>["Authorization" => "Bearer {token}"],
						'url'=>'/api/clients/get-reservation',
						'method'=>'GET',
						'description'=>'Get clients Types',
						'parameters'=>[],
						'responses'=>[
							[
								'code'=>200,
								'data'=>['data'=>(\App\Http\Resources\ReservationResource::collection(\App\Models\Reservation::paginate()))->toArray(request())],
							]
						]
					],
			]
		];
		if($key)
			return $return[$key];
		return $return;
	}


	private function postParamaeters(Request $request)
	{
		$return = [];
		if( method_exists($request ,'requestAttributes') )
		{
			foreach( $request->requestAttributes() as $input )
			{
				$data['name'] = $input;
				$data['type'] = 'POST';
				if( method_exists($request ,'rules') && array_key_exists($input, $request->rules()) ){
					$rule = $request->rules()[$input];
					if (is_array($request->rules()[$input])) {
						$rule = implode('|', $rule);
					}
					$data['validation'] = str_replace(['|','nullable'], [' , ','optional'], $rule);
					if( str_contains( $rule , 'confirmed' ) ){
						$new_parameter['name'] = $input.'_confirmation';
						$new_parameter['type'] = 'POST';
						$new_parameter['validation'] = 'required , same as '.$input;
					}
				}else{
					$data['validation'] = 'optional';
				}
				$return[] = $data;
				if(isset($new_parameter)){
					$return[] = $new_parameter;
					unset($new_parameter);
				}
			}
		}
		return $return;
	}

	private function getParameters(...$parameters)
	{
		$return = [];
		foreach ($parameters as $value) {
			$data['name'] = $value;
			$data['type'] = 'GET';
			if(!ends_with($value,'?')){
				$data['validation'] = 'required';
			}else{
				$data['name'] = rtrim($data['name'], '?');
        $data['validation'] = 'optional';
	    }
			$return[] = $data;
		}
		return $return;
	}

	private function links()
    {
        return [
            "links"=>[
                "first" => url('/')."/api/workshop/normal-requests/500?page=1",
                "last"  => url('/')."/api/workshop/normal-requests/500?page=9",
                "prev" => null,
                "next" => url('/')."/api/workshop/normal-requests/500?page=2"
            ],
            "meta"=> [
                "current_page"=> 1,
                "from"=> 1,
                "last_page"=> 9,
                "path"=> url('/')."/api/workshop/normal-requests/500",
                "per_page"=> 10,
                "to"=> 10,
                "total"=> 100
            ]
        ];
    }

}