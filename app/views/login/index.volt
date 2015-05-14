{{ content() }}

{{ form(this.dispatcher.getParam("language")~"/login/login", "role": "form") }}

<div class="form-group">
{{ form.label("usermail") }}
{{ form.render("usermail", ["class": "form-control", "placeholder": "Username or email"]) }}
</div>

<div class="form-group">
{{ form.label("password") }}
{{ form.render("password", ["class": "form-control", "placeholder": "Password"]) }}
</div>

<div class="form-group">
{{ submit_button("value": "Login", "class": "btn btn-default") }}
</div>
{{ end_form() }}
