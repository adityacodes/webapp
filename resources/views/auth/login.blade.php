

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is a online examination system">
    <meta name="keywords" content="Exam system|exam|exams">
    <link rel="icon" href="#/uploads/settings/I8GYi9XN7OrjAi2.png" type="image/x-icon">
    <title> Dashboard</title>
    <!-- Bootstrap Core CSS --> 
    <link href="{{asset('user/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('user/css/bootstrap-datepicker.min.css')}}">
    <link href="{{asset('user/css/sweetalert.css')}}" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Morris Charts CSS --> 
    <link href="{{asset('user/css/morris.css')}}" rel="stylesheet">
    <!-- Custom CSS --> 
    <link href="{{asset('user/css/sb-admin.css')}}" rel="stylesheet">
    <!-- Custom Fonts --> 
    <link href="{{asset('user/css/custom-fonts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('user/css/materialdesignicons.css')}}" rel="stylesheet" type="text/css">
    {{-- <link href="{{asset('font-awesome.min.css')}}" rel="stylesheet" type="text/css"> --}}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --> 
    
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// --> 
        <!--[if lt IE 9]> 
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> 
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> 
    <![endif]--> 
</head>


<body class="login-screen ng-scope" background="{{asset('img/lg-bg.jpg')}}" ng-app="academia" cz-shortcut-listen="true">

<div class="login-content">
    

    <div class="logo text-center"><img src="{{asset('img/gtp.png')}}" alt="" height="150" width="211"></div>

    <div class="menus">
        <ul>
            <li class="active">

                <i class="icon-education-cap"></i>
                Educate </li>
                <li>

                    <i class="icon-education-cap"></i>
                    Enlight

                </li>
                <li>

                    <i class="icon-education-cap"></i>
                    Enforce

                </li>

            </ul>
        </div>  



        

        <form method="POST" action="#/login" accept-charset="UTF-8" name="loginForm" novalidate="" class="loginform ng-valid-minlength ng-dirty ng-valid-parse ng-valid ng-valid-required">
            <input name="_token" type="hidden" value="{{csrf_token()}}">

            <div class="input-group">

                <span class="input-group-addon" id="basic-addon1">
                    <i class="icon icon-user"></i>
                </span>



                <input class="form-control ng-untouched ng-dirty ng-valid-parse ng-valid ng-valid-required" ng-model="email" required="true" id="email" placeholder="Username/Email" 
                ng-class="{&quot;has-error&quot;: loginForm.email.$touched &amp;&amp; loginForm.email.$invalid}" 
                name="email" type="text">

                <div class="validation-error ng-inactive" ng-messages="loginForm.email.$error">

                    <!-- ngMessage: required -->

                    <!-- ngMessage: email -->

                </div>



            </div>



            <div class="input-group">

                <span class="input-group-addon" id="basic-addon1"><i class="icon icon-lock"></i></span>

                <input class="form-control instruction-call ng-untouched ng-valid-minlength ng-dirty ng-valid-parse ng-valid ng-valid-required" placeholder="Password" ng-model="registration.password" required="true" id="password" ng-class="{&quot;has-error&quot;: loginForm.password.$touched &amp;&amp; loginForm.password.$invalid}" ng-minlength="5" name="password" type="password" value="">

                <div class="validation-error ng-inactive" ng-messages="loginForm.password.$error">

                    <!-- ngMessage: required -->

                    <!-- ngMessage: minlength -->

                </div>



            </div>

            <div class="text-center buttons">

                <button type="submit" id="submit_button" class="btn button btn-success btn-lg" ng-disabled="!loginForm.$valid">Login</button>

                <div class="social-logins">
                    <a href="#/auth/facebook" class="btn btn-lg btn-facebook btn-full"><i class="fa fa-facebook"></i> Login With Facebook</a>


                    <a href="#/auth/google" class="btn btn-lg btn-google-plus btn-full"><i class="fa fa-google-plus"></i>  Login With Google</a>
                    
                    <div class="alert alert-info margintop30">
                        <strong>Note: </strong>
                        Social Logins Are Only For Student Accounts
                    </div>
                </div>

            </div>

        </form>

        

        <div class="footer">

            <a href="javascript:void(0);" class="pull-left" data-toggle="modal" data-target="#myModal"><i class="icon icon-question"></i> Forgot Password</a>



            <a href="#/register" class="pull-right"><i class="icon icon-add-user"></i> Register</a>

        </div>

    </div>



    <!-- Modal -->

    <div id="myModal" class="modal fade" role="dialog">

        <div class="modal-dialog">

            <form method="POST" action="#/users/forgot-password" accept-charset="UTF-8" name="passwordForm" novalidate="" class="loginform ng-pristine ng-valid-email ng-valid ng-valid-required"><input name="_token" type="hidden" value="XO9WIFSin6bS3EUNc7PqjVX7Mt4BrF1mPvCbMDrh">

                <!-- Modal content-->

                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal">×</button>

                        <h4 class="modal-title">Forgot Password</h4>

                    </div>

                    <div class="modal-body">

                        <div class="input-group">

                            <span class="input-group-addon" id="basic-addon1"><i class="icon icon-email-resend"></i></span>



                            <input class="form-control ng-pristine ng-untouched ng-valid-email ng-valid ng-valid-required" ng-model="email" required="true" placeholder="Email" ng-class="{&quot;has-error&quot;: passwordForm.email.$touched &amp;&amp; passwordForm.email.$invalid}" name="email" type="email">

                            <div class="validation-error ng-inactive" ng-messages="passwordForm.email.$error">

                                <!-- ngMessage: required -->

                                <!-- ngMessage: email -->

                            </div>



                        </div>

                    </div>

                    <div class="modal-footer">

                        <div class="pull-right">

                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                            <button type="submit" class="btn btn-primary" ng-disabled="!passwordForm.$valid">Submit</button>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>


<!-- jQuery --> 
    <script async="" src="{{asset('user/js/analytics.js')}}"></script>
    <script src="{{asset('user/js/jquery-1.12.1.min.js')}}"></script> 

    <!-- Bootstrap Core JavaScript --> 
    <script src="{{asset('user/js/bootstrap.min.js')}}"></script> 
    <!--JS Control--> 
    <script src="{{asset('user/js/main.js')}}"></script> 
    <script src="{{asset('user/js/sweetalert-dev.js')}}"></script> 
    <link rel="stylesheet" href="{{asset('user/css/alertify.core.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/alertify.default.css')}}" id="toggleCSS">
    <script src="{{asset('user/js/alertify.js')}}"></script> 
    <script type="text/javascript" src="{{asset('user/js/Chart.js')}}"></script> 

    <script src="{{asset('user/js/angular.js')}}"></script>
    <script src="{{asset('user/js/angular-messages.js')}}"></script> 

    <script>

        app = angular.module('academia', ['ngMessages']);
        app.directive('stringToNumber', function() {
          return {
            require: 'ngModel',
            link: function(scope, element, attrs, ngModel) {
              ngModel.$parsers.push(function(value) {
                return '' + value;
              });
              ngModel.$formatters.push(function(value) {
                return parseFloat(value);
              });
            }
          };
        });
        app.directive('input', function ($parse) {
          return {
            restrict: 'E',
            multiElement: true,
            require: '?ngModel',
            link: function (scope, element, attrs) {
             e = element[0];
 
            if (attrs.ngModel && attrs.value) {
                $parse(attrs.ngModel).assign(scope, attrs.value);
              }
            }
          };
        });

        app.directive('textarea', function ($parse) {
          return {
            restrict: 'E',
            multiElement: true,
            require: '?ngModel',
            link: function (scope, element, attrs) {
                e = element[0];
             // console.log(element[0].value);
              if (attrs.ngModel && e.value) {
                $parse(attrs.ngModel).assign(scope, e.value);
              }
            }
          };
        });
        app.directive('select', function ($parse) {
          return {
            restrict: 'E',
            multiElement: true,
            require: '?ngModel',
            link: function (scope, element, attrs) {
                e = element[0];
                selectedValue = e.options[e.selectedIndex].value;
                // console.log(selectedValue);
              if (attrs.ngModel && selectedValue) {
                $parse(attrs.ngModel).assign(scope, selectedValue);
              }
            }
          };
        });

        /**
         * PASSWORD AND CONFIRM PASSWORD FIELDS VALIDATION DIRECTIVE
         * @return  {[type]} [description]
         */
                var compareTo = function() {
            return {
                require: "ngModel",
                scope: {
                    otherModelValue: "=compareTo"
                },
                link: function(scope, element, attributes, ngModel) {

                    ngModel.$validators.compareTo = function(modelValue) {
                        return modelValue == scope.otherModelValue;
                    };

                    scope.$watch("otherModelValue", function() {
                        ngModel.$validate();
                        });
                    }
                };
            };

        app.directive("compareTo", compareTo);

        /**
         * FILE VALIDATION DIRECTIVES BEFORE UPLOAD
         */

        var validImage = function($rootScope) {
            var validFormats = ['jpg', 'png', 'jpeg'];
         return {
                require: "ngModel",
                scope: {
                    otherModelValue: "=validImage"
                },
                link: function(scope, element, attributes, ngModel) {
                    $rootScope.isImageValid = 'true';
                    // console.log(element);
                    ngModel.$validators.validImage = function(modelValue) {

                       element.on('change', function () {
                        
                        // e = element[0];
                        // fileObject = $.parseJSON(e.files);
                        // console.log(e.files);
                         file_size = this.files[0].size;
                         console.log(file_size);
                         valid_size = true;
                        
                           var value = element.val(),
                               ext = value.substring(value.lastIndexOf('.') + 1).toLowerCase();   
                             console.log(validFormats.indexOf(ext) !== -1);
                             $rootScope.isImageValid = validFormats.indexOf(ext) !== -1;
                             $rootScope.$apply();
                             console.log( " $rootScope.isImageValid   "+$rootScope.isImageValid);
                            if(file_size > 2000000){
                                 
                                return false;
                            }
                            else{
                                 return validFormats.indexOf(ext) !== -1 ;
                            }
                        });
                    };

                  
                    }
                };
            };
        app.directive("validImage", validImage);
            </script>
</body>
</html>