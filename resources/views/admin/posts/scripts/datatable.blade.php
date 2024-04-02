<script>
    function searchColumsDataTable(datatable) {
        datatable.api().columns([1, 2, 3, 4, 5, 6, 7]).every(function () {
            var column = this;
            var input = document.createElement("input");
            if(column.selector.cols == 7){
                input.setAttribute('type', 'date');
            }else if(column.selector.cols == 3){
                input = document.createElement("select");
                createSelectColumnUniqueDatatableAll(input, @json($status));
            }
            input.setAttribute('placeholder', 'Nhập từ khóa');
            input.setAttribute('class', 'form-control');

            $(input).appendTo($(column.footer()).empty())
            .on('change', function () {
                column.search($(this).val(), false, false, true).draw();
            });
        });
    }
</script>

<script>
    $(document).ready(function() {
        select2LoadData($('#cateRoute').val(), '.select2-bs5-ajax[name="category_id[]"]');
    });
</script>

