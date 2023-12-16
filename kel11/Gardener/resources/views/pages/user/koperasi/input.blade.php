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
                                            <label class="required form-label">Kode Barang</label>
                                            <input type="text" name="kode_barang" id="kode_barang" class="form-control mb-2" placeholder="Kode Barang" value="{{$koperasi->kode_barang}}" />
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Nama Barang</label>
                                            <input type="text" name="nama_barang" class="form-control mb-2" placeholder="Nama Barang" value="{{$koperasi->nama_barang}}" />
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Jenis Barang</label>
                                            <select class="form-select mb-2" id="jenis_barang" name="jenis_barang">
                                                <option value="">-- Jenis --</option>
                                                <option value="Makanan" {{$koperasi->jenis_barang=="Makanan" ? 'selected' : ''}}>Makanan</option>
                                                <option value="Minuman"  {{$koperasi->jenis_barang=="Minuman" ? 'selected' : ''}}>Minuman</option>
                                                <option value="Jus"  {{$koperasi->jenis_barang=="Jus" ? 'selected' : ''}}>Jus</option>
                                                <option value="Permen"  {{$koperasi->jenis_barang=="Permen" ? 'selected' : ''}}>Permen</option>
                                            </select>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Harga Barang</label>
                                            <input type="text" name="harga_barang" class="form-control mb-2" placeholder="Keterangan" value="{{$koperasi->harga_barang}}" />
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Stock</label>
                                            <input type="text" name="stok" class="form-control mb-2" placeholder="Keterangan" value="{{$koperasi->stok}}" />
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
                        @if ($koperasi->id)
                        <button type="submit" id="kt_ecommerce_add_product_submit"  onclick="handle_upload('#kt_ecommerce_add_product_submit','#kt_ecommerce_add_product_form','{{route('koperasi.update',$koperasi->id)}}','PATCH');" class="btn btn-primary">
                            <span class="indicator-label">Save Changes</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                        @else
                            <button type="submit" id="kt_ecommerce_add_product_submit"  onclick="handle_upload('#kt_ecommerce_add_product_submit','#kt_ecommerce_add_product_form','{{route('koperasi.store')}}','POST');" class="btn btn-primary">
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
