<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<select class="js-example-basic-multiple" name="states[]" multiple="multiple">
    <option value="AL">Alabama</option>
      ...
    <option value="WY">Wyoming</option>
</select>

<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
