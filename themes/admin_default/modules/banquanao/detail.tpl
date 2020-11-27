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
            <label><strong>Tên sản phẩm</strong></label>
        </div>
        <div class="col-md-20">
        	<select name="name_product" class="form-control">
         		<option value="0">-- Chọn sản phẩm --</option>
          		<!-- BEGIN: name_product -->
          		<option value="{NAME_PRODUCT.key}" {NAME_PRODUCT.selected}>{NAME_PRODUCT.title}</option>
            	<!-- END: name_product -->
       		</select>
       	</div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label><strong>Màu</strong></label>
        </div>
        <div class="col-md-20">
            <!-- BEGIN: color -->
            <input class="form-control" type=radio name="color" value="{COLOR.key}" {COLOR.checked}/> {COLOR.title}
            <!-- END: color -->
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label><strong>Kích thước</strong></label>
        </div>
        <div class="col-md-20">
            <!-- BEGIN: size -->
            <input class="form-control" type=radio name="size" value="{SIZE.key}" {SIZE.checked}/> {SIZE.title}
            <!-- END: size -->
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label><strong>Mô tả</strong></label>
        </div>
        <div class="col-md-20">
        	<textarea class="form-control" name="description" rows="4" value="{POST.description}"></textarea>
        </div>
    </div>
    <div class="text-center">
        <input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" />
    </div>
</form>
<!-- END: main -->
