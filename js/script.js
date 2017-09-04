/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/// [reference path="angular.min.js" /]

var app = angular .module("Demo", ["ngRoute"]); 
        app.config(function ($routeProvider) {
            $routeProvider 
            .when("/",
            { templateUrl: "html/homepage.html",
              controller: "homeController" })
         
           .when("/register",
               { templateUrl: "register/register.view.html", 
                controller: "registercontroller" })
           .when("/login",
            { templateUrl: "login/login.view.html",
                 controller:"loginCtrl" })
            .when("/dashboard",
           {templateUrl:"actionindex.php",
                controller:"userController"
           })
       .when("/search",
            { templateUrl: "searchblood/search.html",
               controller: "searchblood.controller" })
       .when("/bloodtips",
            { templateUrl: "bloodtips/bloodtips.html",
               controller: "bloodtips.controller" })
             });
       app.controller("homeController", function ($scope)
        {  
            
     });
     
  
    app.controller('registercontroller',function($scope,$http,$location){	
    $scope.regsubmit=function(){		
    $http.post("regrationdatasave.php", {
		'username':$scope.username,
                'gender':$scope.gender,
                'bloodgroup':$scope.bloodgroup,
                'number':$scope.num,
                'weight':$scope.weight,
                'age':$scope.age,
                'city':$scope.city,
                'area':$scope.area,
                'email':$scope.email,
                'password':$scope.password})
    
    .success(function(data){
                document.getElementById("message").textContent = "You have registered successfully ";
                alert("You have registered successfully login with your email and password");
                $location.path('/login');
        
    });
        }
         }); 
   
    app.controller('loginCtrl',function($scope,$location,$window){
    $scope.submit =function(){
      
            
        
        
        
        $window.location.reload();
           
           
           
           
           
        if($scope.username == 'jaggu@gmail.com' && $scope.password == '21343'){
          
            
            $location.path('/dashboard');
          
            
        }
    };
     });
       
app.controller("userController", function($scope,$http){
    $scope.users = [];
    $scope.tempUserData = {};
    // function to get records from the database
    $scope.getRecords = function(){
        $http.get('action.php', {
            params:{
                'type':'view'
            }
        }).success(function(response){
            if(response.status == 'OK'){
                $scope.users = response.records;
            }
        });
    };
    
    // function to insert or update user data to the database
    $scope.saveUser = function(type){
        var data = $.param({
            'data':$scope.tempUserData,
            'type':type
        });
        var config = {
            headers : {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
        };
        $http.post("action.php", data, config).success(function(response){
            if(response.status == 'OK'){
                if(type == 'edit'){
                         $scope.users[$scope.index].id = $scope.tempUserData.id;
                         $scope.users[$scope.index].name = $scope.tempUserData.name;
                         $scope.users[$scope.index].gender = $scope.tempUserData.gender;
                         $scope.users[$scope.index].blood = $scope.tempUserData.blood;
                         $scope.users[$scope.index].phone = $scope.tempUserData.phone;
                         $scope.users[$scope.index].weight = $scope.tempUserData.weight;
                         $scope.users[$scope.index].age = $scope.tempUserData.age;
                         $scope.users[$scope.index].city = $scope.tempUserData.city;
                         $scope.users[$scope.index].area = $scope.tempUserData.area;
                         $scope.users[$scope.index].email = $scope.tempUserData.email;
                         $scope.users[$scope.index].password = $scope.tempUserData.password;
                         $scope.users[$scope.index].created = $scope.tempUserData.created;
                     }else{
                         $scope.users.push({
                             id:response.data.id,
                             name:response.data.name,
                             gender:response.data.gender,
                             blood:response.data.blood,
                             phone:response.data.phone,
                             weight:response.data.weight,
                             age:response.data.age,
                             city:response.data.city,
                             area:response.data.area,
                             email:response.data.email,
                             password:response.data.password,
                             created:response.data.created
                         });
                         
                     }
                $scope.userForm.$setPristine();
                $scope.tempUserData = {};
                $('.formData').slideUp();
                $scope.messageSuccess(response.msg);
            }else{
                $scope.messageError(response.msg);
            }
        });
    };
    
    // function to add user data
    $scope.addUser = function(){
        $scope.saveUser('add');
    };
    
    // function to edit user data
    $scope.editUser = function(user){
        $scope.tempUserData = {
                 id:user.id,
                 name:user.name,
                 gender:user.gender,
                 blood:user.blood,
                 phone:user.phone,
                 weight:user.weight,
                 age:user.age,
                 city:user.city,
                 area:user.area,
                 email:user.email,
                 password:user.password,
                 created:user.created
             };
        $scope.index = $scope.users.indexOf(user);
        $('.formData').slideDown();
    };
    
    // function to update user data
    $scope.updateUser = function(){
        $scope.saveUser('edit');
    };
    
    // function to delete user data from the database
    $scope.deleteUser = function(user){
        var conf = confirm('Are you sure to delete the user?');
        if(conf === true){
            var data = $.param({
                'id': user.id,
                'type':'delete'    
            });
            var config = {
                headers : {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }    
            };
            $http.post("action.php",data,config).success(function(response){
                if(response.status == 'OK'){
                    var index = $scope.users.indexOf(user);
                    $scope.users.splice(index,1);
                    $scope.messageSuccess(response.msg);
                }else{
                    $scope.messageError(response.msg);
                }
            });
        }
    };
    
    // function to display success message
    $scope.messageSuccess = function(msg){
        $('.alert-success > p').html(msg);
        $('.alert-success').show();
        $('.alert-success').delay(5000).slideUp(function(){
            $('.alert-success > p').html('');
        });
    };
    
    // function to display error message
    $scope.messageError = function(msg){
        $('.alert-danger > p').html(msg);
        $('.alert-danger').show();
        $('.alert-danger').delay(5000).slideUp(function(){
            $('.alert-danger > p').html('');
        });
    };
});
