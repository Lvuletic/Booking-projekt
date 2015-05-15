{{ content() }}
   {{ form("admin/changeLanguage/"~langName, "class": "form-inline", "role": "form") }}
   {{ langFullName }}
{% for row in messages %}
<div class="row">

    <div class="col-md-10">

    <div class="form-group">
    {{ forms.get("form"~row.name).label("text"~row.langWord.getCode()) }}
    {{ forms.get("form"~row.name).render("text"~row.langWord.getCode(), ["class": "form-control", "value" : row.langWord.getValue(), "placeholder": "Text"]) }}
    </div>


    </div>
</div>

{% endfor %}
  <div class="form-group">
  {{ submit_button("value": "Save changes", "class": "btn btn-default") }}
  </div>
{{ endform() }}