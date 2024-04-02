
<x-input type="hidden" id="cateRoute" name="route_search_select_category"
    :value="route('admin.search.select.category')" />
<script>
    $(document).ready(function() {
        select2LoadData($('#cateRoute').val(), '.select2-bs5-ajax[name="categories_id[]"]');
    });
</script>
