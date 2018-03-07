<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <title>Document</title>
</head>
<body>
{{--<table>--}}
    {{--<tbody>--}}
    {{--<tr>--}}
        {{--<td>--}}
            {{--<input type="text"  name="quantity_box[]" class="form-control a" />--}}
            {{--<input type="text"  name="unit_price[]" class="form-control b" /> display in--}}
            {{--<input type="text" name="price[] "  class="form-control price" autofocus="" />--}}
        {{--</td>--}}
    {{--</tr>--}}

    {{--<tr>  <td>--}}
            {{--<input type="text " name="quantity_box[]" class=" form-control a">--}}
            {{--<input type="text "  name="unit_price[] " class="form-control b"> display in--}}
            {{--<input type="text " name="price[] "  class="form-control price" autofocus="">--}}
        {{--</td></tr>--}}
    {{--</tbody>--}}
{{--</table>--}}

<label> Toal:   <input type="text" id="total" class="form-control " autofocus=""></label>

<div class="row col-md-12" id="myvet">
    <div class="form-group col-md-2 col-lg-2 col-sm-12">
        <label class="col-lg-12 col-form-label" for="vetement_price">Prix de Piece <span class="text-danger">*</span></label>
        <div class="col-lg-12">
            <input class="a" name="quantity_box[]"  type="text">

            <input type="text" name="price[] "  class="form-control price" autofocus="" />

        </div>
    </div>
    <div class="form-group col-md-2 col-lg-2 col-sm-12">
        <label class="col-lg-12 col-form-label" for="vetement_quantity">Quantity <span class="text-danger">*</span></label>
        <div class="col-lg-12">
            <input class="b"   name="unit_price[]" value="1" placeholder="Entrer la quantity"  type="text">

        </div>

    </div>
</div>
<script type="text/javascript">
    $('.a,.b').keyup(function(){
        var textValue1 =$(this).closest('#myvet').find('.a').val();
        var textValue2 = $(this).closest('#myvet').find('.b').val();

        $(this).parent().find('.price').val(textValue1 * textValue2);
        var sum = 0;
        $(".price").each(function() {
            sum += +$(this).val();
        });

        $("#total").val(sum);
    });
</script>
</body>
</html>


