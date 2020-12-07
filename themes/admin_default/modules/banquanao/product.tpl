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
            <input class="form-control" type="text" name="name" value="{POST.name}" />
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label><strong>Hãng</strong></label>
        </div>    
        <div class="col-md-20">
        	<select name="firm" class="form-control">
         		<option value="0">Chọn hãng</option>
          		<!-- BEGIN: firm -->
           		<option value="{FIRM.key}" {FIRM.checked}>{FIRM.title}</option>
            	<!-- END: firm -->
       		</select>
       	</div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label><strong>Giá</strong></label>
        </div>
        <div class="col-md-20">
            <input class="form-control" type="text" name="price" value="{POST.price}" />
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label><strong>Trạng thái</strong></label>
        </div>
        <div class="col-md-20">
            <!-- BEGIN: status -->
            <input class="form-control" type=radio name="status" value="{STATUS.key}" {STATUS.checked}/> {STATUS.title}
            <!-- END: status -->
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label><strong>Ảnh</strong></label>
        </div>
        <div class="col-md-20">
            <input class="form-control" type="file" name="uploadfile"/>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label><strong>Thông tin sản phẩm</strong></label>
        </div>
        <div class="col-md-20">
        	<textarea class="form-control" name="information" rows="4" value="{POST.information}"></textarea>
        </div>
    </div>
    <div class="text-center">
        <input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" />
    </div>
</form>
<!-- END: main -->
