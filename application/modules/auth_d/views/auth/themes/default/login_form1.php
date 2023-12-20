<body style="background:#F7F7F7;"  ng-app="ticket"  ng-controller="ticketCtrl">
  <style>
    .error_block {
      background: #ce5454 none repeat scroll 0 0;
      border-radius: 0 0 5px 5px;
      color: #fff;
      display: block;
      padding: 3px 10px;
      width: 100%;
      margin-top: -21px;
      margin-bottom: 15px;
      text-shadow:none;
    }
    .alert_block{
      background: #ce5454 none repeat scroll 0 0;
      border-radius: 5px;
      color: #fff;
      display: block;
      padding: 10px;
      width: 100%;
      margin-top: -21px;
      margin-bottom: 15px;
      text-shadow:none;
    }
  </style>
<div class="" >
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>
    <a class="hiddenanchor" id="toforgot"></a>

    <div id="wrapper">
      <div class="alert_block" ng-show="register_error">{{register_error_msg}}</div>
      <div id="login" class="animate form" ng-init="login_form_submitted=false">
        <section class="login_content">
          <form name="login_form" ng-submit="login_form.$valid && login()">
            <h1>Login Form</h1>
            <div>
              <input type="text" ng-model="login_data.email" class="form-control" placeholder="Email" ng-required=true name="email"/>
              <span class="error_block" ng-show="login_form_submitted && login_form.email.$error.required">This field is required</span>
            </div>
            <div>
              <input type="password" ng-required=true ng-model="login_data.password" class="form-control" placeholder="Password" name="password" />
              <span class="error_block" ng-show="login_form_submitted && login_form.password.$error.required">This field is required</span>
            </div>
            <div>
              <button class="btn btn-default submit" type="submit" ng-click="login_form_submitted=true">Log In</button>
            </div>
            <div class="clearfix"></div>
            <div class="separator">

              <p class="change_link">New to site?
                <a href="#toregister" class="to_register"> Create Account </a>
              </p>
              <p class="change_link">
                <a href="#toforgot" class="to_forgot"> Lost your password? </a>
              </p>
              <div class="clearfix"></div>
              <br />
              <div>
                <h1><i class="fa fa-ticket" style="font-size: 26px;"></i> Ticket Bazzar</h1>

                <p>©2016 All Rights Reserved</p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>

      <div id="register" class="animate form"  ng-init="register_form_submitted=false">
        <section class="login_content">
          <form name="register_form" ng-submit="register_form.$valid && register(3)">
            <h1>Create Account</h1>
            <div>
              <input type="text" class="form-control" placeholder="First name" ng-model="register_data.first_name" name="firstname" required="" />
              <span class="error_block" ng-show="register_form_submitted && register_form.firstname.$error.required">This field is required</span>
            </div>
            <div>
              <input type="text" class="form-control" placeholder="Last name" ng-model="register_data.last_name" required="" name="lastname" />
              <span class="error_block" ng-show="register_form_submitted && register_form.firstname.$error.required">This field is required</span>
            </div>
            <div>
              <input type="email" class="form-control" placeholder="Email" name="email" ng-model="register_data.email" required="" />
              <span class="error_block" ng-show="!register_form.email.$error.email && register_form.email.$error.required && register_form.email.$dirty">This field is required</span>
              <span class="error_block" ng-show="!register_form.email.$error.required &&  register_form.email.$error.email && register_form.email.$dirty">Invalid Email</span>
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" name="password" ng-model="register_data.password" ng-minlength="8" ng-maxlength="20" ng-pattern="/(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z])/" required="" />
              <span class="error_block" ng-show="register_form.password.$error.required && register_form.password.$dirty">This field is required</span>
              <span class="error_block" ng-show="!register_form.password.$error.required && (register_form.password.$error.minlength || register_form.password.$error.maxlength) && register_form.password.$dirty">Passwords must be between 8 and 20 characters.</span>
              <span class="error_block" ng-show="!register_form.password.$error.required && !register_form.password.$error.minlength && !register_form.password.$error.maxlength && register_form.password.$error.pattern && register_form.password.$dirty">Must contain one lower &amp; uppercase letter, and one non-alpha character (a number or a symbol.)</span>
            </div>
            <div>
              <button class="btn btn-default submit" type="submit" ng-click="register_form_submitted=true">Submit</button>
            </div>
            <div class="clearfix"></div>
            <div class="separator">

              <p class="change_link">Already a member ?
                <a href="#tologin" class="to_register"> Log in </a>
              </p>
              <div class="clearfix"></div>
              <br />
              <div>
                <h1><i class="fa fa-ticket" style="font-size: 26px;"></i> Ticket Bazzar</h1>

                <p>©2016 All Rights Reserved</p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>

      <div id="forgot" class="animate form" style="display:none">
        <section class="login_content">
          <form>
            <h1>Forgot Password</h1>
            <div>
              <input type="email" class="form-control" placeholder="Email" required="" />
            </div>
            <div>
              <a class="btn btn-default submit" href="index.html">Submit</a>
            </div>
            <div class="clearfix"></div>
            <div class="separator">
              <p class="change_link">Already a member ?
                <a href="#tologin" class="to_register"> Log in </a>
              </p>
              <div class="clearfix"></div>
              <br />
              <div>
                <h1><i class="fa fa-ticket" style="font-size: 26px;"></i> Ticket Bazzar</h1>

                <p>©2016 All Rights Reserved</p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>

    </div>
  </div>
