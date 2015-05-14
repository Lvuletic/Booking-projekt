
{{ content() }}
{% for item in languages %}
{{ item.getFullname() }}
<a class="btn btn-default" href="editLanguage/{{ item.getName() }}">Edit</a>
<a class="btn btn-default" href="deleteLanguage/{{ item.getCode() }}">Delete</a>
{{ form("Admin/saveLangImage/"~item.getCode(), "class": "form", "enctype": "multipart/form-data", "role": "form") }}
<div class="form-group">
      {{ forms.get("formImage").label("imageA", ["class": "col-md-2"]) }}
      {{ forms.get("formImage").render("imageA", ["class": "col-md-2"]) }}

    </div>

    {{ submit_button("value": "Submit", "class": "btn btn-default") }}

{{ endform() }}
<br>
{% endfor %}

{{ form("Admin/createLanguage/", "class": "form", "role": "form") }}

<br>

<div class="row">

    <div class="form-group">
    {{ form.label("fullname") }}
    {{ form.render("fullname", ["class": "form-control", "placeholder": "Full name of the language"]) }}
    </div>

    <div class="form-group">
    {{ form.label("name") }}
    {{ form.render("name", ["class": "form-control", "placeholder": "Language abbrevation"]) }}
    </div>

    <div class="form-group">
    {{ submit_button("value": "Add new language", "class": "btn btn-default") }}
    </div>

    </div>
</div>

{{ endform() }}