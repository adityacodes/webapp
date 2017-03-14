@extends('layouts.auth')


@section('content')
    <div class="login-content">
        <div class="logo text-center"><img src="{{asset('img/gtp.png')}}" alt="" height="150" width="211">
        <div class="text-center"><h2>Global Tech Promoters</h2></div>
        </div>

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
        <form method="POST" action="{{url('login')}}" accept-charset="UTF-8" name="loginForm" novalidate="" class="loginform ng-valid-minlength ng-dirty ng-valid-parse ng-valid ng-valid-required">
                {{Form::token()}}

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
            <a href="{{url('register')}}" class="pull-right"><i class="icon icon-add-user"></i> Register</a>
        </div>

    </div>

    <!-- Modal -->

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <form method="POST" action="{{ url('password/reset') }}" accept-charset="UTF-8" name="passwordForm" novalidate="" class="loginform ng-pristine ng-valid-email ng-valid ng-valid-required">
            {{Form::token()}}

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



@endsection

@section('scripts') 

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
@endsection
