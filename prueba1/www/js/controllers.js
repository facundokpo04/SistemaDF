angular.module('app.controllers', [])



//.config(function($httpProvider)
//{
//    $httpProvider.interceptors.push('Request');
//})
        .controller('IntroCtrl', function ($scope, $rootScope, $ionicHistory, sharedUtils, $state, $ionicSideMenuDelegate) {

        })

        .controller('loginCtrl', function ($scope, $rootScope, $ionicHistory, sharedUtils, $state, $ionicSideMenuDelegate) {
            $rootScope.extras = false;  // For hiding the side bar and nav icon

            // When the user logs out and reaches login page,
            // we clear all the history and cache to prevent back link
            $scope.$on('$ionicView.enter', function (ev) {
                if (ev.targetScope !== $scope) {
                    $ionicHistory.clearHistory();
                    $ionicHistory.clearCache();
                }
            });

            //Check if user already logged in
            firebase.auth().onAuthStateChanged(function (user) {
                if (user) {
                    $ionicHistory.nextViewOptions({
                        historyRoot: true
                    });
                    $ionicSideMenuDelegate.canDragContent(true);  // Sets up the sideMenu dragable
                    $rootScope.extras = true;
                    sharedUtils.hideLoading();
                    $state.go('menu2', {}, {location: "replace"});

                }
            });


            $scope.loginEmail = function (formName, cred) {


                if (formName.$valid) {  // Check if the form data is valid or not

                    sharedUtils.showLoading();

                    //Email
                    firebase.auth().signInWithEmailAndPassword(cred.email, cred.password).then(function (result) {

                        // You dont need to save the users session as firebase handles it
                        // You only need to :
                        // 1. clear the login page history from the history stack so that you cant come back
                        // 2. Set rootScope.extra;
                        // 3. Turn off the loading
                        // 4. Got to menu page

                        $ionicHistory.nextViewOptions({
                            historyRoot: true
                        });
                        $rootScope.extras = true;
                        sharedUtils.hideLoading();
                        $state.go('menu2', {}, {location: "replace"});

                    },
                            function (error) {
                                sharedUtils.hideLoading();
                                sharedUtils.showAlert("Please note", "Authentication Error");
                            }
                    );

                } else {
                    sharedUtils.showAlert("Please note", "Entered data is not valid");
                }



            };


            $scope.loginFb = function () {
                //Facebook Login
            };

            $scope.loginGmail = function () {
                //Gmail Login
            };


        })

        .controller('signupCtrl', function ($scope, $rootScope, sharedUtils, $ionicSideMenuDelegate,
                $state, fireBaseData, $ionicHistory) {
            $rootScope.extras = false; // For hiding the side bar and nav icon

            $scope.signupEmail = function (formName, cred) {

                if (formName.$valid) {  // Check if the form data is valid or not

                    sharedUtils.showLoading();

                    //Main Firebase Authentication part
                    firebase.auth().createUserWithEmailAndPassword(cred.email, cred.password).then(function (result) {

                        //Add name and default dp to the Autherisation table
                        result.updateProfile({
                            displayName: cred.name,
                            photoURL: "default_dp"
                        }).then(function () {}, function (error) {});

                        //Add phone number to the user table
                        fireBaseData.refUser().child(result.uid).set({
                            telephone: cred.phone
                        });

                        //Registered OK
                        $ionicHistory.nextViewOptions({
                            historyRoot: true
                        });
                        $ionicSideMenuDelegate.canDragContent(true);  // Sets up the sideMenu dragable
                        $rootScope.extras = true;
                        sharedUtils.hideLoading();
                        $state.go('menu2', {}, {location: "replace"});

                    }, function (error) {
                        sharedUtils.hideLoading();
                        sharedUtils.showAlert("Please note", "Sign up Error");
                    });

                } else {
                    sharedUtils.showAlert("Please note", "Entered data is not valid");
                }

            }

        })

        .controller('menu2Ctrl', function ($scope, $rootScope, $ionicSideMenuDelegate, fireBaseData, $state,
                $ionicHistory, $firebaseArray, sharedCartService, sharedUtils, restApi) {



            $scope.url = '';
            $scope.urlpro = '';
            $scope.urlcat = '';
            $scope.categorias = [];


            loadPromos = function () {

                restApi.call({
                    method: 'get',
                    url: 'promo/listar',
                    response: function (r) {

                        $scope.promos = r.data;
                    },
                    error: function (r) {

                    },
                    validationError: function (r) {

                    }
                });
//    $scope.categorias=cate.get();  
            }
            loadCategorias = function () {
                sharedUtils.showLoading();
                restApi.call({
                    method: 'get',
                    url: 'categoria/listar/5/0',
                    response: function (r) {

                        $scope.categorias = r.data;


                    },
                    error: function (r) {

                    },
                    validationError: function (r) {

                    }
                });


//    $scope.categorias=cate.get();  
                sharedUtils.hideLoading();
            }
            loadproUrl = function () {

                restApi.call({
                    method: 'get',
                    url: 'promo/url',
                    response: function (r) {

                        $scope.urlpro = decodeURIComponent(r);
                    },
                    error: function (r) {

                    },
                    validationError: function (r) {

                    }
                });
//    $scope.categorias=cate.get();  
            }
            loadUrl = function () {

                restApi.call({
                    method: 'get',
                    url: 'producto/url',
                    response: function (r) {

                        $scope.url = decodeURIComponent(r);
                    },
                    error: function (r) {

                    },
                    validationError: function (r) {

                    }
                });
//    $scope.categorias=cate.get();  
            }
            loadcatUrl = function () {

                restApi.call({
                    method: 'get',
                    url: 'categoria/url',
                    response: function (r) {

                        $scope.urlcat = decodeURIComponent(r);
                    },
                    error: function (r) {

                    },
                    validationError: function (r) {

                    }
                });
//    $scope.categorias=cate.get();  
            }
            loadUrl();
            loadcatUrl();

            loadPromos();
            loadCategorias();

            $scope.loadProductos = function (itemcat) {
                restApi.call({
                    method: 'get',
                    url: 'producto/listarCat/' + itemcat.cat_id,
                    response: function (r) {


                        itemcat.productos = r.data;
                    },
                    error: function (r) {

                    },
                    validationError: function (r) {

                    }
                });


//    $scope.categorias=cate.get();  

            }

            //Check if user already logged in
            firebase.auth().onAuthStateChanged(function (user) {
                if (user) {
                    $scope.user_info = user; //Saves data to user_info
                } else {

                    $ionicSideMenuDelegate.toggleLeft(); //To close the side bar
                    $ionicSideMenuDelegate.canDragContent(false);  // To remove the sidemenu white space

                    $ionicHistory.nextViewOptions({
                        historyRoot: true
                    });
                    $rootScope.extras = false;
                    sharedUtils.hideLoading();
                    $state.go('tabsController.login', {}, {location: "replace"});

                }
            });

            // On Loggin in to menu page, the sideMenu drag state is set to true
            $ionicSideMenuDelegate.canDragContent(true);
            $rootScope.extras = true;

            // When user visits A-> B -> C -> A and clicks back, he will close the app instead of back linking
            $scope.$on('$ionicView.enter', function (ev) {
                if (ev.targetScope !== $scope) {
                    $ionicHistory.clearHistory();
                    $ionicHistory.clearCache();
                }
            });





            $scope.showProductInfo = function (id) {



            };

            $scope.addToCart = function (item) {

                $state.go("productodet", {"id": item.prod_id});

            };

        })
        .controller('categoriasCtrl', function ($scope, $rootScope, $ionicSideMenuDelegate, restApi, $state,
                $ionicHistory, sharedCartService, sharedUtils) {

            $scope.url = '';


            //Check if user already logged in
            firebase.auth().onAuthStateChanged(function (user) {
                if (user) {
                    $scope.user_info = user; //Saves data to user_info
                } else {

                    $ionicSideMenuDelegate.toggleLeft(); //To close the side bar
                    $ionicSideMenuDelegate.canDragContent(false);  // To remove the sidemenu white space

                    $ionicHistory.nextViewOptions({
                        historyRoot: true
                    });
                    $rootScope.extras = false;
                    sharedUtils.hideLoading();
                    $state.go('tabsController.login', {}, {location: "replace"});

                }
            });

            // On Loggin in to menu page, the sideMenu drag state is set to true
            $ionicSideMenuDelegate.canDragContent(true);
            $rootScope.extras = true;

            // When user visits A-> B -> C -> A and clicks back, he will close the app instead of back linking
            $scope.$on('$ionicView.enter', function (ev) {
                if (ev.targetScope !== $scope) {
                    $ionicHistory.clearHistory();
                    $ionicHistory.clearCache();
                }
            });



            loadUrl = function () {

                restApi.call({
                    method: 'get',
                    url: 'categoria/url',
                    response: function (r) {

                        $scope.url = decodeURIComponent(r);
                    },
                    error: function (r) {

                    },
                    validationError: function (r) {

                    }
                });
//    $scope.categorias=cate.get();  
            }

            loadPromos = function () {

                restApi.call({
                    method: 'get',
                    url: 'promo/listar',
                    response: function (r) {

                        $scope.promos = r.data;
                    },
                    error: function (r) {

                    },
                    validationError: function (r) {

                    }
                });
//    $scope.categorias=cate.get();  
            }

            loadUrl();
            loadPromos();

            $scope.loadCategorias = function () {
                sharedUtils.showLoading();
                restApi.call({
                    method: 'get',
                    url: 'categoria/listar/5/0',
                    response: function (r) {

                        $scope.categorias = r.data;
                    },
                    error: function (r) {

                    },
                    validationError: function (r) {

                    }
                });


//    $scope.categorias=cate.get();  
                sharedUtils.hideLoading();
            }

            $scope.showProductInfo = function (item) {

                $state.go("menucat", {"id": item.cat_id, "nombre": item.cat_nombre});

            };


        })
        .controller('menucatCtrl', function ($scope, $rootScope, $ionicSideMenuDelegate, restApi, $state,
                $ionicHistory, sharedCartService, sharedUtils, $stateParams, varService) {

            $scope.titulo = $stateParams.nombre;

            $scope.url = '';
            loadUrl = function () {

                restApi.call({
                    method: 'get',
                    url: 'producto/url',
                    response: function (r) {

                        $scope.url = decodeURIComponent(r);
                    },
                    error: function (r) {

                    },
                    validationError: function (r) {

                    }
                });
//    $scope.categorias=cate.get();  
            }

            loadUrl();

            //Check if user already logged in
            firebase.auth().onAuthStateChanged(function (user) {
                if (user) {
                    $scope.user_info = user; //Saves data to user_info
                } else {

                    $ionicSideMenuDelegate.toggleLeft(); //To close the side bar
                    $ionicSideMenuDelegate.canDragContent(false);  // To remove the sidemenu white space

                    $ionicHistory.nextViewOptions({
                        historyRoot: true
                    });
                    $rootScope.extras = false;
                    sharedUtils.hideLoading();
                    $state.go('tabsController.login', {}, {location: "replace"});

                }
            });

            // On Loggin in to menu page, the sideMenu drag state is set to true
            $ionicSideMenuDelegate.canDragContent(true);
            $rootScope.extras = true;

            // When user visits A-> B -> C -> A and clicks back, he will close the app instead of back linking
            $scope.$on('$ionicView.enter', function (ev) {
                if (ev.targetScope !== $scope) {
                    $ionicHistory.clearHistory();
                    $ionicHistory.clearCache();
                }
            });



            $scope.loadProductos = function () {
                sharedUtils.showLoading();



                restApi.call({
                    method: 'get',
                    url: 'producto/listarCat/' + $stateParams.id,
                    response: function (r) {

                        $scope.menu = r.data;
                    },
                    error: function (r) {

                    },
                    validationError: function (r) {

                    }
                });
//    $scope.categorias=cate.get();  
                sharedUtils.hideLoading();
            }

            $scope.showProductInfo = function (id) {



            };

            $scope.addToCart = function (item) {

          
                
//                varService.get({id: item.prod_id}).$promise
//                          .then(function (response) {                    
//                                 response;                
//                            })
//                   .catch(function (response) { console.log(response); });
                 

                $state.go("productodet", {"id": item.prod_id});

//                
//                if(true){
//                    
//                    
//                    
//                 
//                }
//                else{
//                    
//                      $state.go("productodet", {"id": item.prod_id});
//                }
//              


            };

        })

        .controller('productodetCtrl', function ($scope, $rootScope, $ionicSideMenuDelegate, restApi, $state,
                $ionicHistory, sharedCartService, $ionicPopup, sharedUtils, $stateParams) {

// $scope.titulo = $stateParams.nombre;
            var cart = sharedCartService.cart;
            var cartComponent = sharedCartService.cartComponent;
            var item = {};

            $scope.selectedVariedad = {};
            $scope.producto = {};

            $scope.urlpro = '';
            $scope.componentes = [];
            $scope.variedades = [];
            $scope.componentesSelected = [];
            $scope.isvar = false;
            $scope.iscomp = false;




            loadUrlpro = function () {

                restApi.call({
                    method: 'get',
                    url: 'producto/url',
                    response: function (r) {

                        $scope.urlpro = decodeURIComponent(r);
                    },
                    error: function (r) {

                    },
                    validationError: function (r) {

                    }
                });
//    $scope.categorias=cate.get();  
            }

            loadProducto = function () {
                restApi.call({
                    method: 'get',
                    url: 'producto/obtener/' + $stateParams.id,
                    response: function (r) {
                        $scope.producto = r;


                    },
                    error: function (r) {

                    },
                    validationError: function (r) {

                    }
                });

            }

            loadComponentes = function () {

                restApi.call({
                    method: 'get',
                    url: 'producto/listarComp/' + $stateParams.id,
                    response: function (r) {
                        $scope.componentes = r;
                        $scope.iscomp = ($scope.componentes.length > 0);

                    },
                    error: function (r) {

                    },
                    validationError: function (r) {

                    }
                });
//    $scope.categorias=cate.get();  
            }

            loadVariedades = function () {

                restApi.call({
                    method: 'get',
                    url: 'producto/listarVar/' + $stateParams.id,
                    response: function (r) {
                        $scope.variedades = r;
                        $scope.isvar = ($scope.variedades.length > 0);
                    },
                    error: function (r) {

                    },
                    validationError: function (r) {

                    }
                });
//    $scope.categorias=cate.get();  
            }

            getSelectedComponentes = function (componentes) {

                var salida = {};

                salida.items = []

                salida.totalcom = 0;
                angular.forEach(componentes, function (componente) {
                    if (componente.selected) {
                        itemcom = {};
                        itemcom.componente = componente;
                        itemcom.qty = 1;
                        salida.items.push(itemcom)
                        salida.totalcom += parseFloat(componente.com_precio);
                    }
                })
                return salida;
            }
            loadUrlpro();
            loadProducto();
            loadComponentes();
            loadVariedades();


            // estaria bueno que los que tenga precio los amrque como extras y los que no como opciones

            //Check if user already logged in
            firebase.auth().onAuthStateChanged(function (user) {
                if (user) {
                    $scope.user_info = user; //Saves data to user_info
                } else {

                    $ionicSideMenuDelegate.toggleLeft(); //To close the side bar
                    $ionicSideMenuDelegate.canDragContent(false);  // To remove the sidemenu white space

                    $ionicHistory.nextViewOptions({
                        historyRoot: true
                    });
                    $rootScope.extras = false;
                    sharedUtils.hideLoading();
                    $state.go('tabsController.login', {}, {location: "replace"});

                }
            });

            // On Loggin in to menu page, the sideMenu drag state is set to true
            $ionicSideMenuDelegate.canDragContent(true);
            $rootScope.extras = true;

            // When user visits A-> B -> C -> A and clicks back, he will close the app instead of back linking
            $scope.$on('$ionicView.enter', function (ev) {
                if (ev.targetScope !== $scope) {
                    $ionicHistory.clearHistory();
                    $ionicHistory.clearCache();
                }
            });



            $scope.loadDetalle = function () {
                sharedUtils.showLoading();
                $scope.variedades
//    $scope.categorias=cate.get();  
                sharedUtils.hideLoading();
            }

            $scope.showProductInfo = function (id) {



            };

            $scope.addToCart = function () {


                $scope.componentesSelected = getSelectedComponentes($scope.componentes);
                item.producto = $scope.producto;
                item.variedad = $scope.selectedVariedad;
                item.componentes = $scope.componentesSelected;

                var preciov = 0;

                if (item.variedad.var_precio)
                    preciov = (item.variedad.var_precio === "undefined") ? 0 : item.variedad.var_precio;

//     item.qty = 1;

                item.price = parseFloat(parseFloat(preciov) + parseFloat($scope.producto.prod_precioBase));// revisar como se va a palntear variada si como lista de precios o adicionar al precio base
                $scope.data = {};
                $scope.data.cantidad = 1;

                var cantPopup = $ionicPopup.show({
                    template: '<input type="number" pattern="[0-9]*" step="1" style="padding-left: 10px;" ng-model="data.cantidad" class="ng-pristine ng-untouched ng-valid ng-not-empty ng-valid-pattern"> ' +
                            '<a class="button button-light" style="margin-top: 5px; width: 45%" ng-click="data.cantidad = data.cantidad > 2 ? data.cantidad - 1 : 1"> ' +
                            '<i class="icon ion-minus"></i></a> ' +
                            '<a class="button button-light" style="margin-top: 5px; width: 45%; float: right" ng-click="data.cantidad  = data.cantidad + 1"> ' +
                            '<i class="icon ion-plus"></i></a> ' +
                            '<textarea style="padding-left: 10px; margin-top: 5px;" ng-model="data.comentario" placeholder="Add your comments" class="ng-pristine ng-untouched ng-valid ng-empty"></textarea></div>',
                    title: '',
                    subTitle: '',
                    scope: $scope,
                    buttons: [
                        {text: 'Cancelar'},
                        {
                            text: '<b>Confirmar</b>',
                            type: 'button-positive',
                            onTap: function (e) {

                                if ($scope.cantidad < 1) {
                                    e.preventDefault(); //don't allow the user to close unless he enters full details
                                } else {
                                    return $scope.data;
                                }
                            }
                        }
                    ]
                });



                cantPopup.then(function (res) {
                    item.qty = res.cantidad;
                    item.comentario = res.comentario;
                    cart.add(item);
                    cartComponent.addAll(item.componentes.items);

                    $rootScope.totalCart = sharedCartService.total_qty + sharedCartService.total_compqty;

                    $state.go('categorias');

                });


                $timeout(function () {
                    cantPopup.close(); //close the popup after 3 seconds for some reason
                }, 3000);



//     cart.add(item);
//     
//     $rootScope.totalCart = sharedCartService.getQty();
//     
//     $state.go('categorias');

            };

            $scope.SelectedVariedadChange = function (variedad) {

                $scope.selectedVariedad = variedad;

            };




        })


        .controller('offersCtrl', function ($scope, $rootScope) {

            //We initialise it on all the Main Controllers because, $rootScope.extra has default value false
            // So if you happen to refresh the Offer page, you will get $rootScope.extra = false
            //We need $ionicSideMenuDelegate.canDragContent(true) only on the menu, ie after login page
            $rootScope.extras = true;
        })

        .controller('indexCtrl', function ($scope, $rootScope, sharedUtils, $ionicHistory, $state, $ionicSideMenuDelegate, sharedCartService) {

            $rootScope.totalCart = sharedCartService.getQty();


            firebase.auth().onAuthStateChanged(function (user) {




                if (user) {
                    $scope.user_info = user; //Saves data to user_info

                    //Only when the user is logged in, the cart qty is shown
                    //Else it will show unwanted console error till we get the user object


                } else {

                    $ionicSideMenuDelegate.toggleLeft(); //To close the side bar
                    $ionicSideMenuDelegate.canDragContent(false);  // To remove the sidemenu white space

                    $ionicHistory.nextViewOptions({
                        historyRoot: true
                    });
                    $rootScope.extras = false;
                    sharedUtils.hideLoading();
                    $state.go('tabsController.login', {}, {location: "replace"});

                }
            });

            $scope.logout = function () {

                sharedUtils.showLoading();

                // Main Firebase logout
                firebase.auth().signOut().then(function () {


                    $ionicSideMenuDelegate.toggleLeft(); //To close the side bar
                    $ionicSideMenuDelegate.canDragContent(false);  // To remove the sidemenu white space

                    $ionicHistory.nextViewOptions({
                        historyRoot: true
                    });


                    $rootScope.extras = false;
                    sharedUtils.hideLoading();
                    $state.go('tabsController.login', {}, {location: "replace"});

                }, function (error) {
                    sharedUtils.showAlert("Error", "Logout Failed")
                });

            }

        })

        .controller('myCartCtrl', function ($scope, $rootScope, $state, sharedCartService, restApi) {


            $rootScope.extras = true;
            $scope.subtotal = 0;
            $scope.total = $scope.subtotal + 10;
            $scope.urlpro = '';
            $scope.urlcom = '';
            $scope.vacio = true;
            comentarios = '';


            loadUrlpro = function () {

                restApi.call({
                    method: 'get',
                    url: 'producto/url',
                    response: function (r) {

                        $scope.urlpro = decodeURIComponent(r);
                    },
                    error: function (r) {

                    },
                    validationError: function (r) {

                    }
                });
//    $scope.categorias=cate.get();  
            }
            loadUrlcom = function () {

                restApi.call({
                    method: 'get',
                    url: 'componente/url',
                    response: function (r) {

                        $scope.urlcom = decodeURIComponent(r);
                    },
                    error: function (r) {

                    },
                    validationError: function (r) {

                    }
                });
//    $scope.categorias=cate.get();  
            }
            calcularSubtotal = function () {

                var totalprod = sharedCartService.total_amount;
                var totalcom = sharedCartService.total_compAmount;
                $scope.subtotal = totalprod + totalcom;


            };
            loadUrlpro();
            loadUrlcom();
            calcularSubtotal();

            $scope.cart = sharedCartService.cart;
            $scope.cartComp = sharedCartService.cartComponent;
            /// Loads users cart
            $scope.vacio = !(sharedCartService.total_qty > 0);

            $scope.removeFromCart = function (p_id) {
                $scope.cart.drop(p_id);
                calcularSubtotal();
                $rootScope.totalCart = sharedCartService.total_qty + sharedCartService.total_compqty;


            };

            $scope.removeFromCartCom = function (c_id) {
                debugger;
                $scope.cartComp.dropCom(c_id);
                calcularSubtotal();
                $rootScope.totalCart = sharedCartService.total_qty + sharedCartService.total_compqty;
            };

            $scope.inc = function (p_id) {
                $scope.cart.increment(p_id);
                calcularSubtotal();
                $rootScope.totalCart = sharedCartService.total_qty + sharedCartService.total_compqty;
            };

            $scope.dec = function (p_id) {//avisa
                $scope.cart.decrement(p_id);
                calcularSubtotal();
                $rootScope.totalCart = sharedCartService.total_qty + sharedCartService.total_compqty;
            };


            $scope.incComp = function (c_id) {
                $scope.cartComp.incrementComp(c_id);
                calcularSubtotal();
                $rootScope.totalCart = sharedCartService.total_qty + sharedCartService.total_compqty;
            };

            $scope.decComp = function (c_id) {//avisa
                $scope.cartComp.decrementComp(c_id);
                calcularSubtotal();
                $rootScope.totalCart = sharedCartService.total_qty + sharedCartService.total_compqty;


            };


            $scope.checkout = function () {
                var data={};
                data.idCliente=1;
                sharedCartService.cargarComentarios();
                sharedCartService.generarPedido(data);
                
                
//                $state.go('checkout', {}, {location: "replace"});
            };



        })

        .controller('lastOrdersCtrl', function ($scope, $rootScope, fireBaseData, sharedUtils) {

            $rootScope.extras = true;
            sharedUtils.showLoading();

            //Check if user already logged in
            firebase.auth().onAuthStateChanged(function (user) {
                if (user) {
                    $scope.user_info = user;

                    fireBaseData.refOrder()
                            .orderByChild('user_id')
                            .startAt($scope.user_info.uid).endAt($scope.user_info.uid)
                            .once('value', function (snapshot) {
                                $scope.orders = snapshot.val();
                                $scope.$apply();
                            });
                    sharedUtils.hideLoading();
                }
            });





        })

        .controller('favouriteCtrl', function ($scope, $rootScope) {

            $rootScope.extras = true;
        })

        .controller('settingsCtrl', function ($scope, $rootScope, fireBaseData, $firebaseObject,
                $ionicPopup, $state, $window, $firebaseArray,
                sharedUtils) {
            //Bugs are most prevailing here
            $rootScope.extras = true;

            //Shows loading bar
            sharedUtils.showLoading();

            //Check if user already logged in
            firebase.auth().onAuthStateChanged(function (user) {
                if (user) {

                    //Accessing an array of objects using firebaseObject, does not give you the $id , so use firebase array to get $id
                    $scope.addresses = $firebaseArray(fireBaseData.refUser().child(user.uid).child("address"));

                    // firebaseObject is good for accessing single objects for eg:- telephone. Don't use it for array of objects
                    $scope.user_extras = $firebaseObject(fireBaseData.refUser().child(user.uid));

                    $scope.user_info = user; //Saves data to user_info
                    //NOTE: $scope.user_info is not writable ie you can't use it inside ng-model of <input>

                    //You have to create a local variable for storing emails
                    $scope.data_editable = {};
                    $scope.data_editable.email = $scope.user_info.email;  // For editing store it in local variable
                    $scope.data_editable.password = "";

                    $scope.$apply();

                    sharedUtils.hideLoading();

                }

            });

            $scope.addManipulation = function (edit_val) {  // Takes care of address add and edit ie Address Manipulator


                if (edit_val != null) {
                    $scope.data = edit_val; // For editing address
                    var title = "Edit Address";
                    var sub_title = "Edit your address";
                } else {
                    $scope.data = {};    // For adding new address
                    var title = "Add Address";
                    var sub_title = "Add your new address";
                }
                // An elaborate, custom popup
                var addressPopup = $ionicPopup.show({
                    template: '<input type="text"   placeholder="Nick Name"  ng-model="data.nickname"> <br/> ' +
                            '<input type="text"   placeholder="Address" ng-model="data.address"> <br/> ' +
                            '<input type="number" placeholder="Pincode" ng-model="data.pin"> <br/> ' +
                            '<input type="number" placeholder="Phone" ng-model="data.phone">',
                    title: title,
                    subTitle: sub_title,
                    scope: $scope,
                    buttons: [
                        {text: 'Close'},
                        {
                            text: '<b>Save</b>',
                            type: 'button-positive',
                            onTap: function (e) {
                                if (!$scope.data.nickname || !$scope.data.address || !$scope.data.pin || !$scope.data.phone) {
                                    e.preventDefault(); //don't allow the user to close unless he enters full details
                                } else {
                                    return $scope.data;
                                }
                            }
                        }
                    ]
                });

                addressPopup.then(function (res) {

                    if (edit_val != null) {
                        //Update  address
                        if (res != null) { // res ==null  => close 
                            fireBaseData.refUser().child($scope.user_info.uid).child("address").child(edit_val.$id).update({// set
                                nickname: res.nickname,
                                address: res.address,
                                pin: res.pin,
                                phone: res.phone
                            });
                        }
                    } else {
                        //Add new address
                        fireBaseData.refUser().child($scope.user_info.uid).child("address").push({// set
                            nickname: res.nickname,
                            address: res.address,
                            pin: res.pin,
                            phone: res.phone
                        });
                    }

                });

            };

            // A confirm dialog for deleting address
            $scope.deleteAddress = function (del_id) {
                var confirmPopup = $ionicPopup.confirm({
                    title: 'Delete Address',
                    template: 'Are you sure you want to delete this address',
                    buttons: [
                        {text: 'No', type: 'button-stable'},
                        {text: 'Yes', type: 'button-assertive', onTap: function () {
                                return del_id;
                            }}
                    ]
                });

                confirmPopup.then(function (res) {
                    if (res) {
                        fireBaseData.refUser().child($scope.user_info.uid).child("address").child(res).remove();
                    }
                });
            };

            $scope.save = function (extras, editable) {
                //1. Edit Telephone doesnt show popup 2. Using extras and editable  // Bugs
                if (extras.telephone != "" && extras.telephone != null) {
                    //Update  Telephone
                    fireBaseData.refUser().child($scope.user_info.uid).update({// set
                        telephone: extras.telephone
                    });
                }

                //Edit Password
                if (editable.password != "" && editable.password != null) {
                    //Update Password in UserAuthentication Table
                    firebase.auth().currentUser.updatePassword(editable.password).then(function (ok) {}, function (error) {});
                    sharedUtils.showAlert("Account", "Password Updated");
                }

                //Edit Email
                if (editable.email != "" && editable.email != null && editable.email != $scope.user_info.email) {

                    //Update Email/Username in UserAuthentication Table
                    firebase.auth().currentUser.updateEmail(editable.email).then(function (ok) {
                        $window.location.reload(true);
                        //sharedUtils.showAlert("Account","Email Updated");
                    }, function (error) {
                        sharedUtils.showAlert("ERROR", error);
                    });
                }

            };

            $scope.cancel = function () {
                // Simple Reload
                $window.location.reload(true);
                console.log("CANCEL");
            }

        })

        .controller('supportCtrl', function ($scope, $rootScope) {

            $rootScope.extras = true;

        })

        .controller('forgotPasswordCtrl', function ($scope, $rootScope) {
            $rootScope.extras = false;
        })

        .controller('checkoutCtrl', function ($scope, $rootScope, sharedUtils, $state, $firebaseArray,
                $ionicHistory, fireBaseData, $ionicPopup, sharedCartService) {

            $rootScope.extras = true;

            //Check if user already logged in
            firebase.auth().onAuthStateChanged(function (user) {
                if (user) {
                    $scope.addresses = $firebaseArray(fireBaseData.refUser().child(user.uid).child("address"));
                    $scope.user_info = user;
                }
            });

            $scope.payments = [
                {id: 'CREDIT', name: 'Tarjeta Debito'},
                {id: 'NETBANK', name: 'Pagar Ahora'},
                {id: 'COD', name: 'Efectivo '}
            ];

            $scope.pay = function (address, payment) {

                if (address == null || payment == null) {
                    //Check if the checkboxes are selected ?
                    sharedUtils.showAlert("Error", "Please choose from the Address and Payment Modes.")
                } else {
                    // Loop throw all the cart item
                    for (var i = 0; i < sharedCartService.cart_items.length; i++) {
                        //Add cart item to order table
                        fireBaseData.refOrder().push({

                            //Product data is hardcoded for simplicity
                            product_name: sharedCartService.cart_items[i].item_name,
                            product_price: sharedCartService.cart_items[i].item_price,
                            product_image: sharedCartService.cart_items[i].item_image,
                            product_id: sharedCartService.cart_items[i].$id,

                            //item data
                            item_qty: sharedCartService.cart_items[i].item_qty,

                            //Order data
                            user_id: $scope.user_info.uid,
                            user_name: $scope.user_info.displayName,
                            address_id: address,
                            payment_id: payment,
                            status: "Queued"
                        });

                    }

                    //Remove users cart
                    fireBaseData.refCart().child($scope.user_info.uid).remove();

                    sharedUtils.showAlert("Info", "Order Successfull");

                    // Go to past order page
                    $ionicHistory.nextViewOptions({
                        historyRoot: true
                    });
                    $state.go('lastOrders', {}, {location: "replace", reload: true});
                }
            }



            $scope.addManipulation = function (edit_val) {  // Takes care of address add and edit ie Address Manipulator


                if (edit_val != null) {
                    $scope.data = edit_val; // For editing address
                    var title = "Modificar Domicilio";
                    var sub_title = "Modifique su  Domicilio";
                } else {
                    $scope.data = {};    // For adding new address
                    var title = "Agregar Domicilio";
                    var sub_title = "Agregar un nuevo domicilio";
                }
                // An elaborate, custom popup
                var addressPopup = $ionicPopup.show({
                    template: '<input type="text"   placeholder="Nombre Domicilio"  ng-model="data.nickname"> <br/> ' +
                            '<input type="text"   placeholder="Direccion" ng-model="data.address"> <br/> ' +
                            '<input type="number" placeholder="Caracteristica" ng-model="data.pin"> <br/> ' +
                            '<input type="number" placeholder="Telefono Fijo" ng-model="data.phone">',
                    title: title,
                    subTitle: sub_title,
                    scope: $scope,
                    buttons: [
                        {text: 'Close'},
                        {
                            text: '<b>Save</b>',
                            type: 'button-positive',
                            onTap: function (e) {
                                if (!$scope.data.nickname || !$scope.data.address || !$scope.data.pin || !$scope.data.phone) {
                                    e.preventDefault(); //don't allow the user to close unless he enters full details
                                } else {
                                    return $scope.data;
                                }
                            }
                        }
                    ]
                });

                addressPopup.then(function (res) {

                    if (edit_val != null) {
                        //Update  address
                        fireBaseData.refUser().child($scope.user_info.uid).child("address").child(edit_val.$id).update({// set
                            nickname: res.nickname,
                            address: res.address,
                            pin: res.pin,
                            phone: res.phone
                        });
                    } else {
                        //Add new address
                        fireBaseData.refUser().child($scope.user_info.uid).child("address").push({// set
                            nickname: res.nickname,
                            address: res.address,
                            pin: res.pin,
                            phone: res.phone
                        });
                    }

                });

            };


        })

        .controller('checkoutCtrl2', function ($scope, $rootScope, sharedUtils, $state, $firebaseArray,
                $ionicHistory, fireBaseData, $ionicPopup, sharedCartService) {









        })

