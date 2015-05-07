{{ content() }}

{{ form("user/register", "role": "form") }}
<div class="form-group">
{{ form.label("username") }}
{{ form.render("username", ["class": "form-control", "placeholder": "Username"]) }}
</div>

<div class="form-group">
{{ form.label("phone") }}
{{ form.render("phone", ["class": "form-control", "placeholder": "Phone number"]) }}
</div>

<div class="form-group">
{{ form.label("email") }}
{{ form.render("email", ["class": "form-control", "placeholder": "Email"]) }}
</div>

<div class="form-group">
{{ form.label("password") }}
{{ form.render("password", ["class": "form-control", "placeholder": "Password"]) }}
</div>

<div class="form-group">
{{ submit_button("value": "Register", "class": "btn btn-default") }}
</div>

{{ end_form() }}




