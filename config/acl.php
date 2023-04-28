<?php

return [
    //Description
    //Retruns array with three dimensions
    //Dimension #1 module name
    //Dimension #2 form name
    //Dimension #3 role / action
    "modules" => [
        // [
        //     "name" => "Main",
        //     "url" => null,
        //     "forms" => [
        //         [
        //             "name" => "Dashboard",
        //             "url" => "dashboard",
        //             "permission" => "dashboard-view",
        //             "actions" => [
        //                 [
        //                     "name" => "View",
        //                     "value" => "dashboard-view",
        //                 ],
        //             ],
        //         ],
        //     ],
        // ],
        //
        // [
        //     "name" => "Agency",
        //     "url" => null,
        //     "forms" => [
        //         [
        //             "name" => "Agencies",
        //             "url" => "agencies",
        //             "permission" => "agencies-add",
        //             "actions" => [
        //                 [
        //                     "name" => "Add",
        //                     "value" => "agencies-add",
        //                 ],
        //                 [
        //                     "name" => "Update",
        //                     "value" => "agencies-update",
        //                 ],
        //                 [
        //                     "name" => "Delete",
        //                     "value" => "agencies-delete",
        //                 ],
        //             ],
        //         ],
        //     ],
            
        // ],
        [
            "name" => "Airport",
            "url" => null,
            "icon" => "zmdi zmdi-local-airport",
            "forms" => [
                [
                    "name" => "Airport",
                    "url" => "setup/airport",
                    "permission" => "airport-add",
                    "actions" => [
                        [
                            "name" => "Add",
                            "value" => "airport-add",
                        ],
                        [
                            "name" => "Update",
                            "value" => "airport-update",
                        ],
                        [
                            "name" => "Delete",
                            "value" => "airport-delete",
                        ],
                        // TERMINALS
                        [
                            "name" => "Add",
                            "value" => "airport-terminals-add",
                        ],
                        [
                            "name" => "Update",
                            "value" => "airport-terminals-update",
                        ],
                        [
                            "name" => "Delete",
                            "value" => "airport-terminals-delete",
                        ],
                    ],
                ],
            ],
        ],
        [
            "name" => "Parking",
            "url" => null,
            "icon" => "la la-automobile",
            "forms" => [
                [
                    "name" => "Parking",
                    "url" => "parking",
                    "permission" => "parking-add",
                    "actions" => [
                        [
                            "name" => "Add",
                            "value" => "parking-add",
                        ],
                        [
                            "name" => "Update",
                            "value" => "parking-update",
                        ],
                        [
                            "name" => "Delete",
                            "value" => "parking-delete",
                        ],
                    ],
                ],
            ],
        ],
        [
            "name" => "Users",
            "url" => null,
            "icon" => "la la-users",
            "forms" => [
                [
                    "name" => "Users",
                    "url" => "users",
                    "permission" => "users-add",
                    "actions" => [
                        [
                            "name" => "Add",
                            "value" => "users-add",
                        ],
                        [
                            "name" => "Update",
                            "value" => "users-update",
                        ],
                        [
                            "name" => "Delete",
                            "value" => "users-delete",
                        ],
                    ],
                ],
                [
                    "name" => "User Parkings",
                    "url" => "user-parkings",
                    "permission" => "user-parkings-add",
                    "actions" => [
                        [
                            "name" => "Add",
                            "value" => "user-parkings-add",
                        ],
                        [
                            "name" => "Update",
                            "value" => "user-parkings-update",
                        ],
                        [
                            "name" => "Delete",
                            "value" => "user-parkings-delete",
                        ],
                    ],
                ],
            ],
        ],
        // [
        //     "name" => "Blog",
        //     "url" => null,
        //     "icon" => "icon dripicons-meter",
        //     "forms" => [
        //         [
        //             "name" => "Post",
        //             "url" => "blog-post",
        //             "permission" => "blog-post-add",
        //             "actions" => [
        //                 [
        //                     "name" => "Add",
        //                     "value" => "blog-post-add",
        //                 ],
        //                 [
        //                     "name" => "Update",
        //                     "value" => "blog-post-update",
        //                 ],
        //                 [
        //                     "name" => "Delete",
        //                     "value" => "blog-post-delete",
        //                 ],
        //             ],
        //         ],
        //     ],
        // ],
        // [
        //     "name" => "FAQs",
        //     "url" => null,
        //     "icon" => "icon dripicons-meter",
        //     "forms" => [
        //         [
        //             "name" => "FAQs",
        //             "url" => "faqs-view",
        //             "permission" => "faqs-add",
        //             "actions" => [
        //                 [
        //                     "name" => "Add",
        //                     "value" => "faqs-add",
        //                 ],
        //                 [
        //                     "name" => "Update",
        //                     "value" => "faqs-update",
        //                 ],
        //                 [
        //                     "name" => "Delete",
        //                     "value" => "faqs-delete",
        //                 ],
        //             ],
        //         ],
        //     ],
        // ],
        // [
        //     "name" => "Steps",
        //     "url" => null,
        //     "icon" => "icon dripicons-meter",
        //     "forms" => [
        //         [
        //             "name" => "Steps",
        //             "url" => "steps-view",
        //             "permission" => "steps-add",
        //             "actions" => [
        //                 [
        //                     "name" => "Add",
        //                     "value" => "steps-add",
        //                 ],
        //                 [
        //                     "name" => "Update",
        //                     "value" => "steps-update",
        //                 ],
        //                 [
        //                     "name" => "Delete",
        //                     "value" => "steps-delete",
        //                 ],
        //             ],
        //         ],
        //     ],
        // ],
        // [
        //     "name" => "Services",
        //     "url" => null,
        //     "icon" => "icon dripicons-meter",
        //     "forms" => [
        //         [
        //             "name" => "Services",
        //             "url" => "services-view",
        //             "permission" => "services-add",
        //             "actions" => [
        //                 [
        //                     "name" => "Add",
        //                     "value" => "services-add",
        //                 ],
        //                 [
        //                     "name" => "Update",
        //                     "value" => "services-update",
        //                 ],
        //                 [
        //                     "name" => "Delete",
        //                     "value" => "services-delete",
        //                 ],
        //             ],
        //         ],
        //     ],
        // ],
        [
            "name" => "Pages",
            "url" => null,
            "icon" => "la la-star-o",
            "forms" => [
                [
                    "name" => "Post",
                    "url" => "blog-post",
                    "permission" => "blog-post-add",
                    "actions" => [
                        [
                            "name" => "Add",
                            "value" => "blog-post-add",
                        ],
                        [
                            "name" => "Update",
                            "value" => "blog-post-update",
                        ],
                        [
                            "name" => "Delete",
                            "value" => "blog-post-delete",
                        ],
                    ],
                ],
                [
                    "name" => "FAQs",
                    "url" => "faqs-view",
                    "permission" => "faqs-add",
                    "actions" => [
                        [
                            "name" => "Add",
                            "value" => "faqs-add",
                        ],
                        [
                            "name" => "Update",
                            "value" => "faqs-update",
                        ],
                        [
                            "name" => "Delete",
                            "value" => "faqs-delete",
                        ],
                    ],
                ],
                [
                    "name" => "Steps",
                    "url" => "steps-view",
                    "permission" => "steps-add",
                    "actions" => [
                        [
                            "name" => "Add",
                            "value" => "steps-add",
                        ],
                        [
                            "name" => "Update",
                            "value" => "steps-update",
                        ],
                        [
                            "name" => "Delete",
                            "value" => "steps-delete",
                        ],
                    ],
                ],
                [
                    "name" => "Services",
                    "url" => "services-view",
                    "permission" => "services-add",
                    "actions" => [
                        [
                            "name" => "Add",
                            "value" => "services-add",
                        ],
                        [
                            "name" => "Update",
                            "value" => "services-update",
                        ],
                        [
                            "name" => "Delete",
                            "value" => "services-delete",
                        ],
                    ],
                ],
                [
                    "name" => "Pages",
                    "url" => "pages-view",
                    "permission" => "pages-add",
                    "actions" => [
                        [
                            "name" => "Add",
                            "value" => "pages-add",
                        ],
                        [
                            "name" => "Update",
                            "value" => "pages-update",
                        ],
                        [
                            "name" => "Delete",
                            "value" => "pages-delete",
                        ],
                    ],
                ],
            ],
        ],
        [
            "name" => "Control Panel",
            "url" => null,
            "icon" => "la la-cogs",
            "forms" => [
                [
                    "name" => "Social",
                    "url" => "social-setup",
                    "permission" => "social-setup-add",
                    "actions" => [
                        [
                            "name" => "Add",
                            "value" => "social-setup-add",
                        ],
                        [
                            "name" => "Update",
                            "value" => "social-setup-update",
                        ],
                        [
                            "name" => "Delete",
                            "value" => "social-setup-delete",
                        ],
                    ],
                ],
                [
                    "name" => "Blog Category",
                    "url" => "blog-category-setup",
                    "permission" => "blog-category-setup-add",
                    "actions" => [
                        [
                            "name" => "Add",
                            "value" => "blog-category-setup-add",
                        ],
                        [
                            "name" => "Update",
                            "value" => "blog-category-setup-update",
                        ],
                        [
                            "name" => "Delete",
                            "value" => "blog-category-setup-delete",
                        ],
                    ],
                ],
                [
                    "name" => "Parking Types",
                    "url" => "setup/parking-types",
                    "permission" => "setup-parking-types-add",
                    "actions" => [
                        [
                            "name" => "Add",
                            "value" => "setup-parking-types-add",
                        ],
                        [
                            "name" => "Update",
                            "value" => "setup-parking-types-update",
                        ],
                        [
                            "name" => "Delete",
                            "value" => "setup-parking-types-delete",
                        ],
                    ],
                ],
                [
                    "name" => "Titles",
                    "url" => "setup/title",
                    "permission" => "setup-title-add",
                    "actions" => [
                        [
                            "name" => "Add",
                            "value" => "setup-title-add",
                        ],
                        [
                            "name" => "Update",
                            "value" => "setup-title-update",
                        ],
                        [
                            "name" => "Delete",
                            "value" => "setup-title-delete",
                        ],
                    ],
                ],
                [
                    "name" => "Parking Services",
                    "url" => "setup/parking-services",
                    "permission" => "setup-parking-services-add",
                    "actions" => [
                        [
                            "name" => "Add",
                            "value" => "setup-parking-services-add",
                        ],
                        [
                            "name" => "Update",
                            "value" => "setup-parking-services-update",
                        ],
                        [
                            "name" => "Delete",
                            "value" => "setup-parking-services-delete",
                        ],
                    ],
                ],
                [
                    "name" => "Cancellation",
                    "url" => "setup/cancellation",
                    "permission" => "setup-cancellation-add",
                    "actions" => [
                        [
                            "name" => "Add",
                            "value" => "setup-cancellation-add",
                        ],
                        [
                            "name" => "Update",
                            "value" => "setup-cancellation-update",
                        ],
                        [
                            "name" => "Delete",
                            "value" => "setup-cancellation-delete",
                        ],
                    ],
                ],
                // [
                //     "name" => "Parking Tabs",
                //     "url" => "setup/parking-tabs",
                //     "permission" => "setup-parking-tabs-add",
                //     "actions" => [
                //         [
                //             "name" => "Add",
                //             "value" => "setup-parking-tabs-add",
                //         ],
                //         [
                //             "name" => "Update",
                //             "value" => "setup-parking-tabs-update",
                //         ],
                //         [
                //             "name" => "Delete",
                //             "value" => "setup-parking-tabs-delete",
                //         ],
                //     ],
                // ],
                /*[
                    "name" => "ACL",
                    "url" => "acl",
                    "permission" => "acl-view",
                    "actions" => [
                        [
                            "name" => "View",
                            "value" => "acl-view",
                        ],
                    ],
                ],
                [
                    "name" => "ACL Group",
                    "url" => "acl/group",
                    "permission" => "acl-group-view",
                    "actions" => [
                        [
                            "name" => "View",
                            "value" => "acl-group-view",
                        ],
                    ],
                ],*/
            ],
        ],
    ],
];
