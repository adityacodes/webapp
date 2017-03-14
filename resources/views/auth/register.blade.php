@extends('layouts.auth')

@section('stylesheets')

<style type="text/css">
    /* Hidding the radiobuttons & checkboxes */
    input[type="radio"], input[type="checkbox"] {
        display: none;
    }
    /* Styling the "radio" status */
    input[type="radio"] + label .radio-button{width: 28px; height: 28px; border: 2px solid #e1e8f8; border-radius: 100%;}
    input[type="radio"] + label .active{display: none;}
    input[type="radio"] + label .active{width: 24px; height: 24px; line-height: 24px; font-size: 14px; border-radius: 100%;text-align: center;}
    input[type="radio"] + label:hover .active{display: block; color: #efefef;}
    input[type="radio"]:checked + label .active{display: block; color: #fff; background: #44a1ef;}

</style>


@endsection

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
        <form method="POST" action="{{url('register')}}" accept-charset="UTF-8" name="registrationForm" novalidate="" class="loginform">
            {{Form::token()}}
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="icon icon-user"></i></span>
                <input class="form-control" placeholder="Name" ng-model="name" ng-pattern="/^[a-zA-Z0-9_&#039;.- ]*$/" required="true" ng-class="{&quot;has-error&quot;: registrationForm.name.$touched &amp;&amp; registrationForm.name.$invalid}" ng-minlength="4" name="name" type="text">
                <div class="validation-error" ng-messages="registrationForm.name.$error" >
                    <p ng-message="required">This Field Is Required</p>
                    <p ng-message="minlength">The Text Is Too Short</p>
                    <p ng-message="pattern">Invalid Input</p>
                </div>
            </div>



            <div class="input-group">

                <span class="input-group-addon" id="basic-addon1"><i class="icon icon-user"></i></span>



                <input class="form-control" placeholder="Username" ng-model="username" required="true" ng-class="{&quot;has-error&quot;: registrationForm.username.$touched &amp;&amp; registrationForm.username.$invalid}" ng-minlength="4" name="username" type="text">

                <div class="validation-error" ng-messages="registrationForm.username.$error" >

                    <p ng-message="required">This Field Is Required</p>

                    <p ng-message="minlength">The Text Is Too Short</p>

                    <p ng-message="pattern">Invalid Input</p>

                </div>
            </div>

            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="icon icon-email-resend"></i></span>
                <input class="form-control" placeholder="Email" ng-model="email" required="true" 
                        ng-class="{&quot;has-error&quot;: registrationForm.email.$touched &amp;&amp; registrationForm.email.$invalid}" name="email" type="email">
                <div class="validation-error" ng-messages="registrationForm.email.$error" >
                    <p ng-message="required">This Field Is Required</p>
                    <p ng-message="email">Please Enter Valid Email</p>
                </div>
            </div>

            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="icon icon-lock"></i></span>

                <input class="form-control instruction-call" placeholder="Password" ng-model="registration.password" required="true" ng-class="{&quot;has-error&quot;: registrationForm.password.$touched &amp;&amp; registrationForm.password.$invalid}" ng-minlength="5" name="password" type="password" value="">

                <div class="validation-error" ng-messages="registrationForm.password.$error" >
                    <p ng-message="required">This Field Is Required</p>
                    <p ng-message="minlength">The Password Is Too Short</p>
                </div>
            </div>



            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="icon icon-lock"></i></span>
                <input class="form-control instruction-call" placeholder="Password Confirmation" ng-model="registration.password_confirmation" required="true" ng-class="{&quot;has-error&quot;: registrationForm.password_confirmation.$touched &amp;&amp; registrationForm.password_confirmation.$invalid}" ng-minlength="5" compare-to="registration.password" name="password_confirmation" type="password" value="">
                <div class="validation-error" ng-messages="registrationForm.password_confirmation.$error" >
                    <p ng-message="required">This Field Is Required</p>
                    <p ng-message="minlength">The Text Is Too Short</p>
                    <p ng-message="compareTo">Password And Confirm Password Does Not Match</p>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-6">
                    <input id="free" checked="checked" name="is_student" type="radio" value="0">

                    <label for="free"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span> I Am A Student</label> 
                </div>

                <div class="col-md-6">

                    <input id="paid" name="is_student" type="radio" value="1">

                    <label for="paid"> 

                        <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span> I Am A Cyber Security Expert </label>
                    </div>
                </div>
                <div class="text-center buttons">
                    <button type="submit"  class="btn button btn-success btn-lg" 
                    ng-disabled='!registrationForm.$valid'>Register Now</button>
                </div>
            </form>
            <a href="{{url('login')}}"><p class="text-center">I Am Having Account </a></p>
        </div>


        @endsection 
        @section('scripts')

        <script >

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
</script>;
@endsection