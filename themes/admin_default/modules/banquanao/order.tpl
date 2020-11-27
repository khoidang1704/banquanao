<!-- BEGIN: main -->
<!-- BEGIN: err -->
<div class="alert alert-warning" role="alert">
  {ERR}
</div>
<!-- END: err -->
<form action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="{POST.id}">
    <div class="form-group row">
        <div class="col-md-4">
            <label><strong>Tên khách hàng</strong></label>
        </div>
        <div class="col-md-20">
        	<select name="name_customer" class="form-control">
         		<option value="0">-- Chọn khách hàng --</option>
          		<!-- BEGIN: name_customer -->
          		<option value="{NAME_CUSTOMER.key}" {NAME_CUSTOMER.selected}>{NAME_CUSTOMER.fullname}</option>
            	<!-- END: name_customer -->
       		</select>
       	</div>
    </div>
	<div class="form-group row">
        <div class="col-md-4">
            <label><strong>Số lượng sản phẩm</strong></label>
        </div>
        <div class="col-md-20">
            <input class="form-control" type="text" name="product" value="{POST.product}" />
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label><strong>Tổng tiền</strong></label>
        </div>
        <div class="col-md-20">
            <input class="form-control" type="text" name="total" value="{POST.total}" />
        </div>
    </div>
    <div class="text-center">
        <input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" />
    </div>
</form>
<!-- END: main -->
