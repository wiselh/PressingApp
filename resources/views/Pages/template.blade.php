@extends('Pages.main')

@section('page_style')
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>

        <script type="text/javascript">
                $(document).ready(function() {
                    $("#add").click(function() {
                        $('#mytable tbody > :last').clone(true).insertAfter('#mytable tbody>tr:last');
                        $('#mytable tbody >tr').last().find('input:text').val('');
                        return false;
                    });

                });
        </script>

@endsection

@section('content')


<form id="personas" name="personas" method="post" action="/tst">
    {{csrf_field()}}
    <a href="#" id="add">ADD+</a>
    <table id="mytable" width="300" border="1" cellspacing="0" cellpadding="2">
        <tbody>
        <tr class="person">
            <td><input type="text" name="categorie[]" required></td>
            <td><input type="text" name="couleur[]" required></td>
            <td><input type="text" name="type[]" required></td>
            <td><input type="text" name="prix[]" required></td>
        </tr>
        </tbody>
        <input type="submit" id="clickAll" value="submit">

    </table>
</form>

@endsection

@section('page_script')

@endsection


