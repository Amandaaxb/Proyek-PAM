<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="../../demo1/dist/apps/ecommerce/catalog/products.html">
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Detail</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Kode Pulsa</label>
                                            <input type="text" name="kode_pulsa" id="kode_pulsa" class="form-control mb-2" placeholder="Kode Pulsa" value="{{$datapulsa->kode_pulsa}}" />
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Nama Pulsa</label>
                                            <input type="text" name="nama_pulsa" class="form-control mb-2" placeholder="Nama Pulsa" value="{{$datapulsa->nama_pulsa}}" />
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Jenis Pulsaa</label>
                                            <select class="form-select mb-2" id="jenis_pulsa" name="jenis_pulsa">
                                                <option value="">-- Jenis --</option>
                                                <option value="Telkomsel" {{$datapulsa->jenis_pulsa=="Telkomsel" ? 'selected' : ''}}>Telkomsel</option>
                                                <option value="XL"  {{$datapulsa->jenis_pulsa=="XL" ? 'selected' : ''}}>XL</option>
                                                <option value="Indosat"  {{$datapulsa->jenis_pulsa=="Indosat" ? 'selected' : ''}}>Indosat</option>
                                                <option value="Im3"  {{$datapulsa->jenis_pulsa=="Im3" ? 'selected' : ''}}>Im3</option>
                                            </select>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Harga Pulsa</label>
                                            <input type="text" name="harga_pulsa" class="form-control mb-2" placeholder="Keterangan" value="{{$datapulsa->harga_pulsa}}" />
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Stock</label>
                                            <input type="text" name="stok" class="form-control mb-2" placeholder="Keterangan" value="{{$datapulsa->stok}}" />
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="form-label" for="customFile">Gambar Produk</label>
                                            <input type="file" class="form-control" id="customFile" name="gambar"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" onclick="load_list(1);" class="btn btn-light me-5">Kembali</button>
                        @if ($datapulsa->id)
                        <button type="submit" id="kt_ecommerce_add_product_submit"  onclick="handle_upload('#kt_ecommerce_add_product_submit','#kt_ecommerce_add_product_form','{{route('datapulsa.update',$datapulsa->id)}}','PATCH');" class="btn btn-primary">
                            <span class="indicator-label">Save Changes</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                        @else
                            <button type="submit" id="kt_ecommerce_add_product_submit"  onclick="handle_upload('#kt_ecommerce_add_product_submit','#kt_ecommerce_add_product_form','{{route('datapulsa.store')}}','POST');" class="btn btn-primary">
                                <span class="indicator-label">Save Changes</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $("#kt_datepicker_1").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
    $("#kt_datepicker_2").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
</script>
