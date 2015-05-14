{{ content() }}

{{ form(this.dispatcher.getParam("language")~"/user/save", "role": "form") }}
<div class="form-group">
{{ form.label("phone") }}
{{ form.render("phone", ["class": "form-control", "placeholder": "Phone number"]) }}
</div>

<div class="form-group">
{{ form.label("email") }}
{{ form.render("email", ["class": "form-control", "placeholder": "Email"]) }}
</div>

<div class="form-group">
{{ form.label("oldPassword") }}
{{ form.render("oldPassword", ["class": "form-control", "placeholder": "Old password"]) }}
</div>

<div class="form-group">
{{ form.label("newPassword") }}
{{ form.render("newPassword", ["class": "form-control", "placeholder": "New password"]) }}
</div>
<div class="form-group">
{{ submit_button("value": "Save changes", "class": "btn btn-default") }}
</div>
{{ end_form() }}


