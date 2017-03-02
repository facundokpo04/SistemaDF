angular.module('app.services', ['ngResource'])


.factory('fireBaseData', function($firebase) {
    var ref = new Firebase("https://cart-9cee0.firebaseio.com/"),
        refCart = new Firebase("https://cart-9cee0.firebaseio.com/cart"),
        refUser = new Firebase("https://cart-9cee0.firebaseio.com/users"),
        refCategory = new Firebase("https://cart-9cee0.firebaseio.com/category"),
        refOrder = new Firebase("https://cart-9cee0.firebaseio.com/orders"),
        refFeatured = new Firebase("https://cart-9cee0.firebaseio.com/featured"),
        refMenu = new Firebase("https://cart-9cee0.firebaseio.com/menu");
    return {
        ref: function() {
            return ref;
        },
        refCart: function() {
            return refCart;
        },
        refUser: function() {
            return refUser;
        },
        refCategory: function() {
            return refCategory;
        },
        refOrder: function() {
            return refOrder;
        },
        refFeatured: function() {
            return refFeatured;
        },
        refMenu: function() {
            return refMenu;
        }
    }
})


.factory('sharedUtils', ['$ionicLoading', '$ionicPopup', function($ionicLoading, $ionicPopup) {


    var functionObj = {};

    functionObj.showLoading = function() {
        $ionicLoading.show({
            content: '<i class=" ion-loading-c"></i> ', // The text to display in the loading indicator
            animation: 'fade-in', // The animation to use
            showBackdrop: true, // Will a dark overlay or backdrop cover the entire view
            maxWidth: 200, // The maximum width of the loading indicator. Text will be wrapped if longer than maxWidth
            showDelay: 0 // The delay in showing the indicator
        });
    };
    functionObj.hideLoading = function() {
        $ionicLoading.hide();
    };


    functionObj.showAlert = function(title, message) {
        var alertPopup = $ionicPopup.alert({
            title: title,
            template: message
        });
    };

    return functionObj;

}])




.factory('sharedCartService', ['$ionicPopup',function($ionicPopup){
	
	var cartObj = {};
	cartObj.cart=[];
        cartObj.cartComponent=[];
	cartObj.total_amount=0;
	cartObj.total_qty=0;
	
	cartObj.cart.add=function(item){
            
		if(cartObj.cart.find(item.producto.prod_id)!=-1 ){
			var alertPopup = $ionicPopup.alert({
                title: 'El Producto ya fue agregado',
                template: 'Incremente la cantidad en el pedido'
            });
			//cartObj.cart[cartObj.cart.find(id)].cart_item_qty+=1;
			//cartObj.total_qty+= 1;	
			//cartObj.total_amount+= parseInt(cartObj.cart[cartObj.cart.find(id)].cart_item_price);
		}
		else{
		    cartObj.cart.push( item);
			cartObj.total_qty+=1;	
			cartObj.total_amount+=parseInt(item.price);	
		}
	};
	
	cartObj.cart.find=function(id){	
            
         
		var result=-1;
		for( var i = 0, len = cartObj.cart.length; i < len; i++ ) {
			if( cartObj.cart[i].producto.prod_id === id ) {
				result = i;
				break;
			}
		}
		return result;
                //revisar hacerlo con each
	};
	
	cartObj.cart.drop=function(id){
	 var temp=cartObj.cart[cartObj.cart.find(id)];
	 cartObj.total_qty-= parseInt(temp.qty);
	 cartObj.total_amount-=( parseInt(temp.qty) * parseInt(temp.price) );
	 cartObj.cart.splice(cartObj.cart.find(id), 1);

	};
	
	cartObj.cart.increment=function(id){
		 cartObj.cart[cartObj.cart.find(id)].qty+=1;
		 cartObj.total_qty+= 1;
		 cartObj.total_amount+=( parseInt( cartObj.cart[cartObj.cart.find(id)].price) );	
	};
	
	cartObj.cart.decrement=function(id){
		
		 cartObj.total_qty-= 1;
		 cartObj.total_amount-= parseInt( cartObj.cart[cartObj.cart.find(id)].price) ;
		 

		 if(cartObj.cart[cartObj.cart.find(id)].qty == 1){  // if the cart item was only 1 in qty
			cartObj.cart.splice( cartObj.cart.find(id) , 1);  //edited
		 }else{
			cartObj.cart[cartObj.cart.find(id)].qty-=1;
		 }
	
	};
	
        cartObj.getQty=function(){
		
		return  cartObj.total_qty;
		 
	
	};
        
	return cartObj;
}])

.factory('cate', function($resource) {
  // Might use a resource here that returns a JSON array

  // Some fake testing data
  return  $resource(API.base_url+"categoria/listar/5/0", {}, //aquí podemos pasar variables que queramos pasar a la consulta
        //a la función get le decimos el método, y, si es un array lo que devuelve
        //ponemos isArray en true
        { get: { method: "GET", isArray: true }});

//  return {
//    all: function() {
//      return cates.query();
//    },
//    get: function(cateId) {
//      for (var i = 0; i < cates.length; i++) {
//        if (cates[i].id === parseInt(cateId)) {
//          return cates[i];
//        }
//      }
//      return null;
//    }
//  };
})

.factory('auth', ['$location', '$state', function($location, $state) {
    var auth = {
        setToken: function(token) {
            localStorage[API.token_name] = token;
        },
        getToken: function() {
            return localStorage[API.token_name];
        },
        getUserData: function() {
            try {
                var token = localStorage[API.token_name];
                if (token === '') return;

                var base64Url = token.split('.')[1];
                var base64 = base64Url.replace('-', '+').replace('_', '/');

                return JSON.parse(window.atob(base64)).data;
            } catch (err) {
                $location.path('/');
            }
        },
        logout: function() {
            localStorage[API.token_name] = '';
            $state.go('login');
        },
        hasToken: function() {
            return (localStorage[API.token_name] !== '');
        },
        redirectIfNotExists: function() {
            if (!auth.hasToken()) {
                 $state.go('login');
            }
        }
    };

    return auth;


}])


.factory("Request", function()
{
      var request = function request(config)
      {
          config.headers["Content-Type"] = "application/x-www-form-urlencoded";
          
          
          return config;
      }
 
      return {
          request: request
      }
})

.factory('BlankFactory', [function() {

}])
.service('restApi', ['$http','auth', function($http,auth) {
        
        
    this.call = function(config) {
        var headers = {};
//        headers[API.token_name] = auth.getToken();
        headers['Content-Type'] = 'application/x-www-form-urlencoded';
        

        
        var http_config = {
            method: config.method,
            url: API.base_url + config.url,
            data: typeof(config.data) === 'undefined' ? null : config.data,
            headers: headers
        };

        $http(http_config).then(function successCallback(response) {
            
            config.response(response.data);
        }, function errorCallback(response) {
            

            switch (response.status) {
                case 401: // No autorizado
                    auth.logout();
                    break;
                case 422: // Validación
                    config.validationError(response.data);
                    break;
                default:
                    config.error(response);
                    console.log(response.statusText);
                    break;
            }
        });
    };
}])

.service('BlankService', [function() {

}]);